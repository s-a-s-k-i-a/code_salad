	    // Bei Klick auf das div mit der Klasse "tt_terminart"
	    $(document).on('click', '.tt_terminart', function() {

	    	$('#loading-indicator').show();
	    	
	    	var tid = $(this).attr('data-terminid');
	    	var bid = $(this).attr('data-branchid');
	    	var termin = $(this).attr('data-terminbezeichnung');

	            $.ajax({
	                type: 'POST',
	                url: 'get_terminkalender.php',
	                data: {
	                    action: 'get_terminkalender_html',
	                    tid: tid,
	                    branchid: bid,
	                    terminname: termin
	                },
	                success: function(response) {
	                	console.log(response);
	                	var data = JSON.parse(response);

						// Zugriff auf die einzelnen Daten
						var erfolg = data.status;
	  
						if(erfolg === 'erfolg'){
							console.log('Terminvorlage gewählt!');
							$('.stepform.termintyp').hide();

							if($('.stepform.terminkalender').html().trim() !== "") {
							    // Das Element leeren
							    $('.stepform.terminkalender').empty();
							}
							$('.stepform.terminkalender').hmtl(data.data);

							$('.stepform.terminkalender').show();
							
							if($('.users_inner_selection').length){
								if($('#mein_termin').length){
									$('#mein_termin').remove();
								}
								$('.users_inner_selection').append('<p id="mein_termin">'+termin+'</p>');
							}
							if($('.heading_frage').length){
								$('.heading_frage').text('Bitte wählen Sie Ihr Wunschdatum im Kalender aus!');
							}							
						}
						$('#loading-indicator').hide();
	                },
	                error: function(jqXHR, textStatus, errorThrown) {
	                    console.error('Fehler bei der Verarbeitung der Auswahl: ' + textStatus);
	                    // Ladeindikator ausblenden
	                    $('#loading-indicator').hide();
	                    alert('Bitte Browserkonsole prüfen. Ein Fehler ist aufgetreten.');
	                }
	            });



	    });
