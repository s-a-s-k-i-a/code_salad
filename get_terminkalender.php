<?php

function get_terminkalender_html(){
    global $display_terminkalender;
    if ( session_status() === PHP_SESSION_NONE ) {
      session_start();
    }

    $cal = '';
    $cal_result = array();

    if ( isset($_POST['tid'], $_POST['branchid'], $_POST['terminname'] ) ) {
     
        $tId = $_POST['tid'];
        $bId = $_POST['branchid'];
        $t_name = $_POST['terminname'];
        // error_log(print_r($t_id.' '.$b_id.' '.$t_name, true));
        $_SESSION['termintyp_selected'] = '';
        // Klick-Ursprung: .tt_terminart
        // Zeige Kalender an und blende Terminvorlagen aus.
        // Speichere die ID der gewählten Terminvorlage in der Session
        // Setze die Sessionvariable 'termintyp_selected'
        $_SESSION['termintyp_selected'] = array('id' => $t_id, 'name' => $t_name, 'branchid' => $b_id); // Hier wird der Wert direkt zugewiesen, ohne 
    

        $rId = isset($_SESSION['berater_selected']['id']) ? $_SESSION['berater_selected']['id'] : '';

        $templates = get_templates($bId);

        $template = get_template($templates, $tId);

        $minDate = new DateTime();
        $minDate->modify('+1 day');
        if ($minDate->format('w') == 0) {
            $minDate->modify('+1 day');
        }

        $maxDate = new DateTime();
        $maxDate->modify('+6 months');

        $dateStart = $_SESSION['date'] ?? $minDate;
        $s_date = filter_input(INPUT_GET, 'date');
        $s_date = $s_date !== null ? trim($s_date) : '';
        if (!empty($s_date)) {
            $date = DateTime::createFromFormat('Y-m-d', $s_date);
            if ($date) {
                $dateStart = $date;
            }
        }

        if (isset($_POST['next']) && $_POST['next']) {
            $weekday = $dateStart->format('N');
            $dateStart->modify('-' . ($weekday - 1) . ' day');
            $dateStart->modify('+7 days');
        }

        if (isset($_POST['prev']) && $_POST['prev']) {
            $weekday = $dateStart->format('N');
            $dateStart->modify('-' . ($weekday - 1) . ' day');
            $dateStart->modify('-7 days');
        }


        if ($dateStart < $minDate) {
            $dateStart = clone $minDate;
        }

        if ($dateStart > $maxDate) {
            $dateStart = clone $maxDate;
        }

        $_SESSION['date'] = $dateStart;

        $dateEnd = clone $dateStart;
        $dateEnd->modify('+' . (6 - $dateStart->format('w')) . ' days');

        $minStart = 9 * 60;
        $minEnd = 18 * 60;

        if (!empty($tId)) {
            $slots = get_free_busy($bId, $tId, $rId, $dateStart, $dateEnd, $minStart, $minEnd);
        }

        $interval = DateInterval::createFromDateString('1 day');
        date_add($dateEnd,date_interval_create_from_date_string('1 day'));
        $monday = date_create(date_format($dateStart,'Y-m-d'));
        $weekday = date_format($monday,'N');
        if( $weekday>1 ) date_sub($monday,date_interval_create_from_date_string(($weekday-1) . ' day'));

        if( !empty($tId)) {
        $cal = '<p>';
        
        if( $dateStart > $minDate) {
            $cal .= '<input type="submit" class="button" name="prev" value="Vorherige Woche &lt;&lt;"/>';
        }
        
        $cal .= '<span>&nbsp;&nbsp;Termine in der KW ' . date_format($dateStart,'W / Y') . '&nbsp;&nbsp;</span>';

        if( $dateStart < $maxDate) {
           $cal .= '<input type="submit" class="button" name="next" value="&gt;&gt; N&auml;chste Woche"/>';
        }
        $cal .= '</p>';       

        $period = new DatePeriod($monday, $interval, $dateEnd);
        $heightPerMin = 1.0 / 15.0;
        $ty = ($minEnd - $minStart) * $heightPerMin;
        $cal .= '<div class="calendar" id="t1">';
        foreach($period as $dt) {
           $cal .= '<div class="cal_headerwrap"><p class="calendarheader">' . format_date_with_weekday($dt) . '</p><div>';
           $lastMin = $minStart;
           foreach($slots as $slot) {
              $date = date_create($slot->{'date'});
              if( date_format($date,'yMd')==date_format($dt,'yMd') ) {
                 $free = $slot->{'free'}=='true'; 
                 $s = time_to_min($slot->{'startTime'});
                 $e = time_to_min($slot->{'endTime'});
                 if( $s > $lastMin ) {
                   $h = ($s - $lastMin) * $heightPerMin;
                   $cal .= '<p class="calendarempty" style="height: ' . $h . 'em;"/>';
                 }
                 $lastMin = $e;
                 $h = ($e - $s) * $heightPerMin;
                 if( $ty>=0 ) {
                   if( $free ) {
                       $cal .= '<a class="plain" href="book.php?app=' . date_format($date,'Y-m-d') . '/' . min_to_time($s) . '">';
                       $cal .= '<p class="calendar' . ($free ? 'entry' : 'block') . '" style="height: ' . $h . 'em;">';
                       $cal .= min_to_time($s) . ' - ' . min_to_time($e);
                       $cal .= '</p></a>';
                   } else {
                       $cal .= '<p class="calendar' . ($free ? 'entry' : 'block') . '" style="height: ' . $h . 'em;">BELEGT</p>';
                   }
                 }
              }
           }
           $cal .= '</div></div>';
        }
        $cal .= '</div>';
        }
        $cal_result = array(
            'status' => 'erfolg',
            'data' => $cal
        );
    } else {
        $cal = '<p>Bitte wählen Sie sowohl die gewünschte Filiale als auch die Terminoption aus.</p>';
        $cal_result = array(
            'status' => 'error',
            'data' => $cal
        );
    }

    echo json_encode($cal_result);
}
// Überprüfen, ob eine Ajax-Aktion über POST angefordert wurde und ob die angeforderte Funktion existiert.
if ( isset( $_POST['action'] ) && function_exists( $_POST['action'] ) ) {
    $allowed = array( 'get_terminkalender_html' );
    if ( in_array( $_POST['action'], $allowed ) ) {
         
            call_user_func( $_POST['action'] );
        
    }
}
