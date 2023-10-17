<?php

class DIPI_FilterableGrid extends DIPI_Builder_Module
{
    private static $vendor_prefix = 'dipi';
    public $slug = 'dipi_filterable_grid';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://divi-pixel.com/modules/filterable-grid',
        'author' => 'Divi Pixel',
        'author_uri' => 'https://divi-pixel.com',
    );


    public function init()
    {

        $posts_html = '';

        $query_posts_args = [
            'post_type'      => $select_post_type,
            'post_status'    => $post_status,
            'posts_per_page' => - 1,
        ];
        switch ($post_orderby) {
            case 'date_asc':
                $query_posts_args['orderby'] = 'date';
                $query_posts_args['order'] = 'ASC';
                break;
            case 'title_asc':
                $query_posts_args['orderby'] = 'title';
                $query_posts_args['order'] = 'ASC';
                break;
            case 'title_desc':
                $query_posts_args['orderby'] = 'title';
                $query_posts_args['order'] = 'DESC';
                break;
            case 'rand':
                $query_posts_args['orderby'] = 'rand';
                break;
            case 'menu_asc':
                $query_posts_args['orderby'] = 'menu_order';
                $query_posts_args['order'] = 'ASC';
                break;
            case 'menu_desc':
                $query_posts_args['orderby'] = 'menu_order';
                $query_posts_args['order'] = 'DESC';
                break;
            case '':
            default:
                $query_posts_args['orderby'] = 'date';
                $query_posts_args['order'] = 'DESC';
                break;
        }
        foreach($dipi_include_terms as $index=>$dipi_include_term){
            $items = [
                '<div class="grid-sizer"></div>',
                '<div class="gutter-sizer"></div>',
            ];
            $query_images_args = [];
            $orderby = 'date';
            $tax_query = [];
            if ($show_all_filter == 'on' && $index == 0 ) {
                $tax_query = [
                    [
                        'taxonomy' => $select_custom_tax,
                        'field'    => 'id',
                        'terms'    => explode(",", $include_term_ids),
                    ]
                ];
            } else {
                $tax_query = [
                    [
                    'taxonomy' => $select_custom_tax,
                    'field'    => 'slug',
                    'terms'    => $dipi_include_term->slug,
                    ]
                ];
            }
            $query_posts_args['tax_query'] = $tax_query;

            $query_posts = new WP_Query( $query_posts_args );
            $query_posts_count = $query_posts->post_count;
            $pages = (int)(($query_posts_count  - 1) / $posts_per_page) + 1;
            $pagination_html = '';
            $pagination_pages = '';
            if (($pagination_type === 'numbered_pagination') &&  ((int)$pages > 1)) {
                $prev_pagination_html = "<span class='dipi-pagination-btn' data-page='prev'>$prev_btn_text</span>";
                $next_pagination_html = "<span class='dipi-pagination-btn' data-page='next'>$next_btn_text</span>";
                $pagination_html .= $prev_pagination_html;
                for ($pageIndex = 1; $pageIndex <= $pages ; $pageIndex++) {
                    $one_pagination_html = sprintf(
                        '<span class="dipi-pagination-btn dipi-pagination-btn-%1$s %2$s" data-page="%1$s">
                            %1$s
                        </span>',
                        $pageIndex,
                        $pageIndex == 1 ? 'active' : ($pageIndex == 2 ?  'active-next' : '')
                    );
                    $pagination_html.= $one_pagination_html;
                }
                $pagination_html .= $next_pagination_html;
            }
            if ($pagination_type === 'load_more' && ((int)$pages > 1)) {
                $pagination_html =sprintf(
                    '<span class="dipi-loadmore-btn" data-page="1">
                        %1$s
                    </span>
                    ',
                    $load_more_text
                );
            }
            if ($pagination_type === 'infinite_scroll' && ((int)$pages > 1)) {
                $pagination_html =sprintf(
                    '<span class="dipi-loadmore-btn watch_end_of_grid" data-page="1">
                        %1$s
                    </span>
                    ',
                    $load_more_text
                );
            }
            $post_ids = array();
            foreach ( $query_posts->posts as $post ) {
                $post_ids[] = $post->ID;
            }

            //$post_ids = explode(",", $args["images"]);
            if ('rand' === $post_orderby) {
                // echo "every day I'm shuffling";
                shuffle($post_ids);
            } else {
                // echo "no shuffle today";
            }

            $overlay_output = '';

            $overlay_icon_classes[] = 'dipi-filterable-grid-icon';
            
            if ('on' === $overlay_icon_use_circle) {
                $overlay_icon_classes[] = 'dipi-filterable-grid-icon-circle';
            }

            if ('on' === $overlay_icon_use_circle && 'on' === $overlay_icon_use_circle_border) {
                $overlay_icon_classes[] = 'dipi-filterable-grid-icon-circle-border';
            }

            $data_icon = '' !== $hover_icon ? sprintf(
                ' data-icon="%1$s"',
                esc_attr(et_pb_process_font_icon($hover_icon)),
                esc_attr($hover_icon)
            ) : 'data-no-icon';


            foreach ($post_ids as $post_index=>$post_id) {
                $post = get_post($post_id);
                $attachment = get_the_post_thumbnail_url($post_id, "full");
                $img_id = get_post_thumbnail_id($post_id);
                $image = $attachment;
                $image_desktop_url = DIPI_FilterableGrid::get_featured_image_url($post_id, $args['image_size_desktop'], $image);
                $image_tablet_url = DIPI_FilterableGrid::get_featured_image_url($post_id, $args['image_size_tablet'], $image);
                $image_phone_url = DIPI_FilterableGrid::get_featured_image_url($post_id, $args['image_size_phone'], $image);
                $image_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                $post_title = get_the_title($post_id);
                $a_open_tag = '';
                $a_close_tag = '';
                $img_a_open_tag = '';
                $img_a_close_tag = '';
                $lightbox_and_link_icon_html = '';

                if ($use_post_link === 'on') {
                    $post_link_url = get_permalink($post_id);
                    $a_open_tag =  sprintf('<a href="%1$s" target="%2$s">',
                        $post_link_url,
                        $post_link_target === '_self' ? '_self' : '_blank'
                    );
                    $a_close_tag = '</a>';

                    if ($use_overlay === 'on'
                        && $show_lightbox_link_icon === 'on'
                    ) {
                        $lightbox_icon_html =sprintf(
                            '<div
                                class="et-pb-icon et_pb_inline_icon %1$s animated %2$s %4$s"
                                %3$s
                                data-icon="&#x55;"
                            >
                            </div>
                            ',
                            implode(' ', $overlay_icon_classes),
                            $icon_animation,
                            !empty(trim($image)) ? "href='$image'" : "",
                            !empty(trim($image)) ? "lightbox-icon" : ""
                        );

                        $link_icon_html = sprintf(
                            '<a href="%3$s" target="%4$s">
                                <div class="et-pb-icon et_pb_inline_icon %1$s animated %2$s link-icon" data-icon="&#xe02c;"></div>
                            </a>',
                            implode(' ', $overlay_icon_classes),
                            $icon_animation,
                            $post_link_url,
                            $post_link_target
                        );

                        
                        $lightbox_and_link_icon_html =  sprintf(
                            '<div class="dipi_lightbox_link_icon">
                                %1$s
                                %2$s
                            </div>',
                            $lightbox_icon_html,
                            $link_icon_html
                        );
                    } else {
                        $img_a_open_tag = $a_open_tag;
                        $img_a_close_tag = $a_close_tag;
                    }
                }

                $icon_html = '';
                if ('on' === $icon_in_overlay) {
                    $icon_html = sprintf(
                        '<div class="et-pb-icon %1$s %3$s animated %4$s"%2$s></div>',
                        ('' !== $hover_icon ? ' et_pb_inline_icon' : ''),
                        'on' === $icon_in_overlay ? $data_icon : '',
                        implode(' ', $overlay_icon_classes),
                        $icon_animation
                    );
                }

                $name_html = '';
                $header_level = $args['header_level'];
                if ('on' === $title_in_overlay && '' !== $post_title) {
                    $name_html = sprintf(
                        '<%3$s class="dipi-filterable-grid-title animated %2$s">
                            %1$s
                        </%3$s>',
                        $post_title,
                        $title_animation,
                        $header_level
                    );
                }

                $excerpt = get_the_excerpt($post_id);
                
                // Render HTML of Excerpt
                $raw_html_excerpt = $excerpt;
                if ($enable_html_on_grid === 'on' || $enable_html_in_overlay === 'on') {
                    if (!has_excerpt($post_id )) {
                        $raw_html_excerpt =  get_the_content(null, false, $post_id);
                        // Remove HTML Comment tags
                        $raw_html_excerpt = preg_replace('/<!--(.*?)-->/', '', $raw_html_excerpt);
                    }
                }
                // Render short code of post content, but this is having performance issue
                $raw_shortcode_excerpt = $raw_html_excerpt;
                if ($enable_shortcode_on_grid === 'on' || $enable_shortcode_in_overlay === 'on') {
                    $shortcode_excerpt = do_shortcode($raw_html_excerpt);
                    $raw_shortcode_excerpt = $shortcode_excerpt;
                }              
                
                $excerpt = preg_replace( '@\[caption[^\]]*?\].*?\[\/caption]@si', '', $excerpt );
                $excerpt = preg_replace( '@\[et_pb_post_nav[^\]]*?\].*?\[\/et_pb_post_nav]@si', '', $excerpt );
                $excerpt = preg_replace( '@\[audio[^\]]*?\].*?\[\/audio]@si', '', $excerpt );
                $excerpt = preg_replace( '@\[embed[^\]]*?\].*?\[\/embed]@si', '', $excerpt );
                $excerpt = wp_strip_all_tags( $excerpt );
                $excerpt = et_strip_shortcodes( $excerpt );
                $excerpt = et_builder_strip_dynamic_content( $excerpt );
                $excerpt = apply_filters( 'et_truncate_post', $excerpt, get_the_ID() );
                $excerpt_html = '';
                if ('on' === $excerpt_in_overlay && '' !== $excerpt) {
                    $limit_excerpt = '';
                    if ($enable_html_in_overlay === "on") {
                        if ($enable_shortcode_in_overlay === "on") {
                            $limit_excerpt = dipi_limit_length_text_of_html( $raw_shortcode_excerpt, $excerpt_length_in_overlay);
                        } else {
                            $limit_excerpt = dipi_limit_length_of_html( $raw_html_excerpt, $excerpt_length_in_overlay) ['text'];
                        }
                    } else {
                        $limit_excerpt = dipi_limit_length_letters_of_string($excerpt, $excerpt_length_in_overlay);
                    }
                    $excerpt_html = sprintf(
                        '<div class="dipi-filterable-grid-excerpt animated %2$s">
                            %1$s
                        </div>',
                        $limit_excerpt,
                        $excerpt_animation
                    );
                }

                $overlay_output = sprintf(
                    '<span class="dipi_filterable_grid_overlay background"></span>
                    <span class="dipi_filterable_grid_overlay background-hover"></span>
                    <span class="dipi_filterable_grid_overlay content" style="transition-duration: 0ms;">
                        %4$s
                        %1$s
                        %2$s
                        %3$s
                    </span>',
                    $icon_html,
                    $name_html,
                    $excerpt_html,
                    $lightbox_and_link_icon_html
                );

                $item_class = '';
                $data_page = '';
                $pagination_pages = '';
                if ($pagination_type === 'none') {
                    if ((int)$post_count >=0 && $post_index >= (int)$post_count) {
                        $item_class = 'hidden';
                    }
                    if ($post_count_responsive_active) {
                        if ((int)$post_count_tablet >= 0 && $post_index >=(int)$post_count_tablet) {
                            $item_class .= ' tablet_hidden';
                        } else {
                            $item_class .=" tablet_show";
                        }
                        if ((int)$post_count_phone >= 0 && $post_index >=(int)$post_count_phone) {
                            $item_class .= ' phone_hidden';
                        } else {
                            $item_class .=" phone_show";
                        }
                    }
                } else {
                    $page = (int)($post_index  / $posts_per_page) + 1;
                    $item_class = 'page-'.$page;
                    if ( $page  !== 1) {
                        $item_class.=' hidden';
                    }
                    $data_page = 'data-page='.$page;
                    $pagination_pages='data-pages='.$pages;
                }
                //Grid Content
                $grid_item_category_html = '';
                if ('on' === $show_custom_taxonomy &&  !empty($dipi_include_term->name)) {
                    $item_category_terms = get_the_terms($post_id, $select_custom_tax);
                    if ($show_taxonomy_link === "on") {
                        $item_category_term_name =  array_map(function($term) {
                            return sprintf('<a href="%1$s" rel="tag" class="dipi-grid-item-category">%2$s</a>', get_term_link($term), $term->name);
                        }, $item_category_terms);
                        $grid_item_category_html = implode(", ", $item_category_term_name);

                    } else {
                        $item_category_term_name = array_map(function ($term)
                        {
                            return $term->name;
                        }, $item_category_terms);
                        $grid_item_category_html = sprintf(
                            '<div class="dipi-grid-item-category">
                                %1$s
                            </div>',
                            implode(", ", $item_category_term_name)
                        );
                    }
                }                
                
                // Grid Item Title
                $dipi_filterable_grid_before_title = "";
                $dipi_filterable_grid_before_title = apply_filters('dipi_filterable_grid_before_title', $dipi_filterable_grid_before_title);
                $dipi_filterable_grid_before_title = apply_filters('dipi_filterable_grid_before_title_with_post', $dipi_filterable_grid_before_title, $post);

                $dipi_filterable_grid_after_title = "";
                $dipi_filterable_grid_after_title = apply_filters('dipi_filterable_grid_after_title', $dipi_filterable_grid_after_title);
                $dipi_filterable_grid_after_title = apply_filters('dipi_filterable_grid_after_title_with_post', $dipi_filterable_grid_after_title, $post);

                $grid_item_title_html = '';
                $grid_item_title_level = $args['grid_item_title_level'];
                if ('on' === $show_post_title && '' !== $post_title) {
                    $grid_item_title_html = sprintf(
                        '<%2$s class="dipi-grid-item-title">
                            %1$s
                        </%2$s>',
                        $post_title,
                        $grid_item_title_level
                    );
                }
                if ($dipi_filterable_grid_before_title) {
                    $dipi_filterable_grid_before_title = sprintf('
                        <div class="dipi-grid-item-before-title">
                            %1$s
                        </div>',
                        $dipi_filterable_grid_before_title
                    );
                }
                if ($dipi_filterable_grid_after_title) {
                    $dipi_filterable_grid_after_title = sprintf('
                        <div class="dipi-grid-item-after-title">
                            %1$s
                        </div>
                        ',
                        $dipi_filterable_grid_after_title
                    );
                }
                // Grid Item Excerpt
                $grid_item_excerpt_html = '';
                if ('on' === $show_post_excerpt && '' !== $excerpt) {
                    $limit_excerpt = '';
                    if ($enable_html_on_grid === "on") {
                        if ($enable_shortcode_on_grid === "on") {
                            $limit_excerpt = dipi_limit_length_text_of_html( $raw_shortcode_excerpt, $excerpt_length);
                        } else {
                            $limit_excerpt = dipi_limit_length_of_html( $raw_html_excerpt, $excerpt_length) ['text'];
                        }
                    } else {
                        $limit_excerpt = dipi_limit_length_letters_of_string($excerpt, $excerpt_length);
                    }

                    $grid_item_excerpt_html = sprintf(
                        '<div class="dipi-grid-item-excerpt">
                            %1$s
                        </div>',
                        $limit_excerpt
                    );
                }
                // Author
                $author_id = get_post_field('post_author', $post_id);
                $author_info = get_userdata($author_id);
                $author_name = $author_info->display_name;
                $author_avatar_html = $show_author_avatar === 'on' ? sprintf (
                    '<img src=" %1$s" />',
                    esc_url(get_avatar_url($author_id))
                ) : '';
                $author_html = 'on' === $show_author ? sprintf(
                    '<span class="dipi-author-prefix">%4$s </span>
                    <span class="dipi-author">
                        
                        %1$s
                        <a href="%2$s"> %3$s</a>
                    </span>
                    ',
                    $author_avatar_html,
                    get_author_posts_url($author_id),
                    $author_name,
                    $author_prefix
                ) : '';
                // Date
                $date_html = 'on' === $args['show_date']
                    ? et_get_safe_localization( sprintf( __( '%s', 'et_builder' ), '<span class="post-date">' . esc_html( get_the_date( str_replace( '\\\\', '\\', $args['meta_date'] ), $post_id ) ) . '</span>' ) )
                    : '';
                // Read More
                $dipi_filterable_grid_before_readmore = "";
                $dipi_filterable_grid_before_readmore = apply_filters('dipi_filterable_grid_before_readmore', $dipi_filterable_grid_before_readmore);
                $dipi_filterable_grid_before_readmore = apply_filters('dipi_filterable_grid_before_readmore_with_post', $dipi_filterable_grid_before_readmore, $post);

                $dipi_filterable_grid_after_readmore = "";
                $dipi_filterable_grid_after_readmore = apply_filters('dipi_filterable_grid_after_readmore', $dipi_filterable_grid_after_readmore);
                $dipi_filterable_grid_after_readmore = apply_filters('dipi_filterable_grid_after_readmore_with_post', $dipi_filterable_grid_after_readmore, $post);
                $grid_item_more = "";
                if ('on' === $args['read_more']) {
                    //$btn_open_tag = 'button';
                    //$btn_close_tag = 'button';
                    //if ($use_post_link === 'off') {
                        $post_link_url = get_permalink($post_id);
                        $btn_open_tag = sprintf('a href="%1$s"', $post_link_url);
                        $btn_close_tag = 'a';
                    //}
                    $button_use_icon = $args['read_more_use_icon'];
                    $button_icon     = $args['read_more_icon'];
                    $read_more_link_target = $args['read_more_link_target'];
                    $data_icon       = '$';
                    $data_icon_class = '';
                    if('on' === $button_use_icon) {
                        $data_icon       = $button_icon ? et_pb_process_font_icon($button_icon) : '$';
                        $data_icon_class = 'et_pb_custom_button_icon';
                    }
                    $grid_item_more = sprintf(
                        '<div class="dipi-fg-readmore-button-wrapper">
                            <%5$s
                                class="et_pb_button dipi-fg-readmore-button %3$s"
                                target="%4$s"
                                data-icon="%2$s">%1$s
                            </%6$s>
                        </div>',
                        $read_more_text,
                        esc_attr($data_icon),
                        $data_icon_class,
                        $read_more_link_target,
                        $btn_open_tag,
                        $btn_close_tag
                    );
                }

                // Post Meta
                $dipi_filterable_grid_before_meta = "";
                $dipi_filterable_grid_before_meta = apply_filters('dipi_filterable_grid_before_meta', $dipi_filterable_grid_before_meta);
                $dipi_filterable_grid_before_meta = apply_filters('dipi_filterable_grid_before_meta_with_post', $dipi_filterable_grid_before_meta, $post);

                $dipi_filterable_grid_after_meta = "";
                $dipi_filterable_grid_after_meta = apply_filters('dipi_filterable_grid_after_meta', $dipi_filterable_grid_after_meta);
                $dipi_filterable_grid_after_meta = apply_filters('dipi_filterable_grid_after_meta_with_post', $dipi_filterable_grid_after_meta, $post);
                
                $dipi_filterable_grid_first_meta = "";
                $dipi_filterable_grid_first_meta = apply_filters('dipi_filterable_grid_first_meta', $dipi_filterable_grid_first_meta);
                $dipi_filterable_grid_first_meta = apply_filters('dipi_filterable_grid_first_meta_with_post', $dipi_filterable_grid_first_meta, $post);

                $dipi_filterable_grid_last_meta = "";
                $dipi_filterable_grid_last_meta = apply_filters('dipi_filterable_grid_last_meta', $dipi_filterable_grid_last_meta);
                $dipi_filterable_grid_last_meta = apply_filters('dipi_filterable_grid_last_meta_with_post', $dipi_filterable_grid_last_meta, $post);

                $post_meta = [];
                if ($dipi_filterable_grid_first_meta) {
                    $post_meta[] = $dipi_filterable_grid_first_meta;
                }
                if (!empty($author_html)) {
                    $post_meta[] = $author_html;
                }
                if (!empty($date_html)) {
                    $post_meta[] = $date_html;
                }
                if (!empty($grid_item_category_html)) {
                    $post_meta[] = $grid_item_category_html;
                }
                if ($dipi_filterable_grid_last_meta) {
                    $post_meta[] = $dipi_filterable_grid_last_meta;
                }
                $post_meta_html = "";
                if (!empty($post_meta)) {
                    $post_meta_html = sprintf('<div class="dipi-post-meta">%1$s</div>',
                        implode('<span class="dipi-post-meta-separator"> | </span>', $post_meta));
                }
                $grid_content_html = sprintf(
                    '<div class="dipi-grid-item-content">
                        %11$s
                        %1$s
                        %12$s
                        %9$s
                        %5$s
                            %2$s
                        %6$s
                        %10$s
                        %7$s
                            %3$s
                        %8$s
                        %13$s
                        %4$s
                        %14$s
                    </div>',
                    $post_meta_html,
                    $grid_item_title_html,
                    $grid_item_excerpt_html,
                    $grid_item_more,
                    $a_open_tag, #5
                    $a_close_tag,
                    $enable_html_on_grid === "on"? '' : $a_open_tag, // If raw html is enabled, need to keep link of raw HTML. So don't need to set link of excerpt to post.
                    $enable_html_on_grid === "on"? '' : $a_close_tag, // If raw html is enabled, need to keep link of raw HTML. So don't need to set link of excerpt to post.
                    $dipi_filterable_grid_before_title,
                    $dipi_filterable_grid_after_title, #10
                    $dipi_filterable_grid_before_meta,
                    $dipi_filterable_grid_after_meta,
                    $dipi_filterable_grid_before_readmore,
                    $dipi_filterable_grid_after_readmore
                );
                
                $img_html = sprintf('
                        <img src="%1$s"
                            loading="lazy"
                            alt="%2$s"
                            srcset="%8$s 768w, %7$s 980w, %6$s 1024w"
                            sizes="(max-width: 768px) 768px, (max-width: 980px) 980px, 1024px"
                        />
                    ',
                    $image,
                    $image_alt,
                    'on' === $title_in_lightbox ? " data-title='$post_title'" : '',
                    'on' === $excerpt_in_lightbox ? " data-excerpt='" . get_the_excerpt($post_id) . "'" : '', #5
                    $image_animation, #5
                    $image_desktop_url,
                    $image_tablet_url,
                    $image_phone_url
                    
                );
                $items[] = sprintf(
                    '<div class="grid-item %14$s" %17$s>
                        %10$s
                        <div class="img-container dipi-fg-animation dipi-fg-%12$s" %19$s %4$s%5$s>
                            %18$s
                            %6$s
                        </div>
                        %11$s
                        %13$s
                    </div>',
                    $image,
                    $image_alt,
                    $post_title,
                    'on' === $title_in_lightbox ? " data-title='$post_title'" : '',
                    'on' === $excerpt_in_lightbox ? " data-excerpt='" . get_the_excerpt($post_id) . "'" : '', #5
                    et_core_esc_previously($overlay_output),
                    $image_desktop_url,
                    $image_tablet_url,
                    $image_phone_url,
                    $img_a_open_tag, #10
                    $img_a_close_tag,
                    $image_animation,
                    $grid_content_html,
                    $item_class,
                    $a_open_tag, #15
                    $a_close_tag,
                    $data_page,
                    !empty(trim($image)) ? $img_html : "",
                    !empty(trim($image)) ? "href='$image'" : ""
                );
            }
            $posts_html.= sprintf('
                <div
                    class="
                        dipi-filtered-posts-item
                        dipi-filtered-posts-item-%6$s
                        %9$s
                        animated
                        %11$s
                    "
                    data-index="%6$s"
                    data-term="%7$s"
                    data-count="%8$s"
                    data-anim="%11$s"
                    %13$s
                >
                    <div class="grid %3$s %4$s %5$s" data-lazy="%2$s" data-config="%10$s">
                        %1$s
                    </div>
                    <div class="dipi-pagination" data-page-count="%14$s">
                        %12$s
                    </div>
                </div>',
                implode("", $items),
                $fix_lazy === 'on' ? esc_attr("true") : esc_attr("false"),
                $show_lightboxclasses,
                $show_overlay_classes,
                $use_post_link_class, #5
                $index,
                $dipi_include_term->name,
                $query_posts_count,
                $index === 0 ? 'active' : '',
                esc_attr(htmlspecialchars(json_encode($config), ENT_QUOTES, 'UTF-8')), #10
                $grid_animation,
                $pagination_html,
                $pagination_pages,
                $pages
            );
        }
        return sprintf(
            '<div
                class="dipi-filtered-posts-container"
                data-items-count="%2$s"
            >
                %1$s
             </div>',
            $posts_html,
            count($dipi_include_terms)
        );
    }
    public static function render_filterable_grid($args = array(), $conditional_tags = array(), $current_page = array())
    {
        $filter_bar_html = DIPI_FilterableGrid::render_filter_bar($args, $conditional_tags, $current_page);
        $posts_html = DIPI_FilterableGrid::render_posts($args, $conditional_tags, $current_page);
        
        return sprintf(
            '%1$s
            %2$s',
            $filter_bar_html,
            $posts_html
        );
        
    }

    public function render($attrs, $content, $render_slug)
    {
        wp_enqueue_script('dipi_filterable_grid_public');
        wp_enqueue_style('dipi_animate');
        wp_enqueue_style('magnific-popup');
        $this->dipi_apply_css($render_slug);
        $grid_layout = $this->props['grid_layout'];
        $sticky_filter_bar                            = $this->props['sticky_filter_bar'];
        $sticky_filter_bar_last_edited = $this->props['sticky_filter_bar_last_edited'];
        $sticky_filter_bar_tablet        = (et_pb_get_responsive_status($sticky_filter_bar_last_edited) && $this->props['sticky_filter_bar_tablet'] ) ?  $this->props['sticky_filter_bar_tablet'] : $sticky_filter_bar  ;
        $sticky_filter_bar_phone         = (et_pb_get_responsive_status($sticky_filter_bar_last_edited) && $this->props['sticky_filter_bar_phone'] ) ? $this->props['sticky_filter_bar_phone'] : $sticky_filter_bar_tablet;
        $infinite_scroll_viewport = $this->props['infinite_scroll_viewport'];
        $config = [
            'infinite_scroll_viewport' => $this->props['infinite_scroll_viewport'],
        ];
        $filterable_grid_html = DIPI_FilterableGrid::render_filterable_grid($this->props);
        $module_custom_classes = 'dipi_filterable_grid_wrapper';
        if ($grid_layout === 'grid') {
            $module_custom_classes.=" layout_grid";
        }
        if ($sticky_filter_bar  === "on") {
            $module_custom_classes.=" sticky_filter_bar";
        }
        if ($sticky_filter_bar_tablet  === "on") {
            $module_custom_classes.=" sticky_filter_bar_tablet";
        }
        if ($sticky_filter_bar_phone  === "on") {
            $module_custom_classes.=" sticky_filter_bar_phone";
        }
        return sprintf(
            '<div class="%2$s" data-config="%3$s">
                %1$s
            </div>
           ',
            $filterable_grid_html,
            $module_custom_classes,
            esc_attr(htmlspecialchars(json_encode($config), ENT_QUOTES, 'UTF-8'))
        );
    }

    public function dipi_apply_css($render_slug)
    { 
 
        if('on' === $this->props['icon_in_overlay']){
            $this->dipi_generate_font_icon_styles($render_slug, 'hover_icon', '%%order_class%% .dipi-filterable-grid-icon:before');
        }
        $columns = $this->props["columns"];
        $columns_responsive_active = isset($this->props["columns_last_edited"]) && et_pb_get_responsive_status($this->props["columns_last_edited"]);
        $columns_tablet = $columns_responsive_active && $this->props["columns_tablet"] ? $this->props["columns_tablet"] : $columns;
        $columns_phone = $columns_responsive_active && $this->props["columns_phone"] ? $this->props["columns_phone"] : $columns_tablet;

        $gutter = $this->props["gutter"];
        $gutter_responsive_active = isset($this->props["gutter_last_edited"]) && et_pb_get_responsive_status($this->props["gutter_last_edited"]);
        $gutter_tablet = $gutter_responsive_active && $this->props["gutter_tablet"] ? $this->props["gutter_tablet"] : $gutter;
        $gutter_phone = $gutter_responsive_active && $this->props["gutter_phone"] ? $this->props["gutter_phone"] : $gutter_tablet;


        $filter_bar_selector = "%%order_class%% .dipi-filter-bar";
        $filter_bar_item_selector = "%%order_class%% .dipi-filter-bar .dipi-filter-bar-item";
        $filter_bar_item_title_selector = "%%order_class%% .dipi-filter-bar .dipi-filter-bar-item .dipi-filter-bar-item-title";
        $filter_bar_item_text_selector = "%%order_class%% .dipi-filter-bar .dipi-filter-bar-item .dipi-filter-bar-item-title, %%order_class%% .dipi-filter-bar .dipi-filter-bar-item .dipi-filter-bar-item-desc";
        $filter_bar_item_hover_selector = "%%order_class%% .dipi-filter-bar .dipi-filter-bar-item:hover";
        $filter_bar_item_active_selector = "%%order_class%% .dipi-filter-bar .dipi-filter-bar-item.active";
        $filter_bar_item_active_text_selector = "%%order_class%% .dipi-filter-bar .dipi-filter-bar-item.active .dipi-filter-bar-item-title, %%order_class%% .dipi-filter-bar .dipi-filter-bar-item.active .dipi-filter-bar-item-desc";
        $filter_bar_item_active_hover_selector = "%%order_class%% .dipi-filter-bar .dipi-filter-bar-item.active:hover";
        $filter_bar_item_name_selector = "%%order_class%% .dipi-filter-bar .dipi-filter-bar-item .dipi-filter-bar-name";
        $filter_bar_item_count_selector = "%%order_class%% .dipi-filter-bar .dipi-filter-bar-item .dipi-filter-bar-count";
        $pagination_btn_normal_selector = "%%order_class%% .dipi-pagination .dipi-pagination-btn";
        $pagination_btn_normal_hover_selector = "%%order_class%% .dipi-pagination .dipi-pagination-btn:hover";
        $pagination_btn_active_selector = "%%order_class%% .dipi-pagination .dipi-pagination-btn.active";
        $pagination_btn_active_hover_selector = "%%order_class%% .dipi-pagination .dipi-pagination-btn.active:hover";
        $load_more_selector = "%%order_class%% .dipi-loadmore-btn";
        $load_more_hover_selector = "%%order_class%% .dipi-loadmore-btn:hover";

        $grid_selector =  "%%order_class%% .dipi-filtered-posts-container";
        $post_item_grid_selector =  "%%order_class%% .dipi-filtered-posts-container .dipi-filtered-posts-item, %%order_class%% .dipi-filtered-posts-container .dipi-filtered-posts-item .grid";
        $grid_item_selector =  "%%order_class%% .dipi-filtered-posts-container .dipi-filtered-posts-item .grid-item";

        //Pagination
        $this->dipi_apply_custom_style(
            $render_slug,
            'pagination_btn_bg_color',
            'background-color',
            $pagination_btn_normal_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'pagination_active_btn_bg_color',
            'background-color',
            $pagination_btn_active_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'load_more_bg_color',
            'background-color',
            $load_more_selector
        );
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'pagination_btn_margin',
            'margin',
            $pagination_btn_normal_selector
        );
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'pagination_btn_padding',
            'padding',
            $pagination_btn_normal_selector
        );
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'pagination_active_btn_margin',
            'margin',
            $pagination_btn_active_selector
        );
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'pagination_active_btn_padding',
            'padding',
            $pagination_btn_active_selector
        );
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'load_more_margin',
            'margin',
            $load_more_selector
        );
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'load_more_padding',
            'padding',
            $load_more_selector
        );

        // Filter bar 
        $this->dipi_apply_custom_style(
            $render_slug,
            'sticky_filter_bar_top',
            'top',
            $filter_bar_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'space_tabs',
            'gap',
            $filter_bar_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'filter_bar_max_width',
            'max-width',
            $filter_bar_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'space_tab_number',
            'gap',
            $filter_bar_item_title_selector
        );
        
        $this->dipi_apply_custom_style(
            $render_slug,
            'filter_bar_layout',
            'flex-direction',
            $filter_bar_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'filter_tab_alignment',
            'place-content',
            $filter_bar_selector
        );

        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'filter_bar_margin',
            'margin',
            $filter_bar_selector
        );
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'filter_bar_padding',
            'padding',
            $filter_bar_selector
        );
        
        $this->dipi_apply_custom_style(
            $render_slug,
            'filter_bar_background_color',
            'background-color',
            $filter_bar_selector
        );

        // Filter bar Item
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'filter_bar_item_padding',
            'padding',
            $filter_bar_item_selector
        );
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'filter_bar_item_padding_active',
            'padding',
            $filter_bar_item_active_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'filter_bar_normal_text_align',
            'justify-content',
            $filter_bar_item_text_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'filter_bar_active_text_align',
            'justify-content',
            $filter_bar_item_active_text_selector
        );
        
        $this->dipi_apply_custom_style(
            $render_slug,
            'filter_bar_item_background_color',
            'background-color',
            $filter_bar_item_selector
        );
        $this->dipi_apply_custom_style_for_hover(
            $render_slug,
            'filter_bar_item_background_color',
            'background-color',
            $filter_bar_item_hover_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'filter_bar_item_background_color_active',
            'background-color',
            $filter_bar_item_active_selector
        );
        $this->dipi_apply_custom_style_for_hover(
            $render_slug,
            'filter_bar_item_background_color_active',
            'background-color',
            $filter_bar_item_active_hover_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'filter_bar_item_width',
            'width',
            $filter_bar_item_selector
        );
        $this->dipi_apply_custom_style_for_hover(
            $render_slug,
            'filter_bar_item_width',
            'width',
            $filter_bar_item_hover_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'filter_bar_item_width_active',
            'width',
            $filter_bar_item_active_selector
        );   
        $this->dipi_apply_custom_style_for_hover(
            $render_slug,
            'filter_bar_item_width_active',
            'width',
            $filter_bar_item_active_hover_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'filter_bar_item_height',
            'height',
            $filter_bar_item_selector
        );
        $this->dipi_apply_custom_style_for_hover(
            $render_slug,
            'filter_bar_item_height',
            'height',
            $filter_bar_item_hover_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'filter_bar_item_height_active',
            'height',
            $filter_bar_item_active_selector
        );
        $this->dipi_apply_custom_style_for_hover(
            $render_slug,
            'filter_bar_item_height_active',
            'height',
            $filter_bar_item_active_hover_selector
        );
        //Grid
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'grid_margin',
            'margin',
            $grid_selector
        );

        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'grid_padding',
            'padding',
            $grid_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'grid_background_color',
            'background-color',
            $grid_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'grid_animation_speed',
            'animation-duration',
            $post_item_grid_selector
        );
        // Grid Item
        $this->dipi_apply_custom_style(
            $render_slug,
            'grid_item_background_color',
            'background-color',
            $grid_item_selector
        );
        $this->dipi_apply_custom_style(
            $render_slug,
            'grid_animation_delay',
            'animation-delay',
            $post_item_grid_selector
        );

        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'grid_item_meta_margin',
            'margin',
            "%%order_class%% .dipi-post-meta"
        );
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'grid_item_meta_padding',
            'padding',
            "%%order_class%% .dipi-post-meta"
        );
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'grid_item_author_margin',
            'margin',
            "%%order_class%% .dipi-post-meta .dipi-author-prefix, %%order_class%% .dipi-post-meta .dipi-author a"
        );
        
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'grid_item_author_padding',
            'padding',
            "%%order_class%% .dipi-post-meta .dipi-author-prefix, %%order_class%% .dipi-post-meta .dipi-author a"
        );
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'grid_item_date_margin',
            'margin',
            "%%order_class%% .dipi-post-meta .post-date"
        );
        
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'grid_item_date_padding',
            'padding',
            "%%order_class%% .dipi-post-meta .post-date"
        );
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'grid_item_category_margin',
            'margin',
            "%%order_class%% .dipi-grid-item-category"
        );
        
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'grid_item_category_padding',
            'padding',
            "%%order_class%% .dipi-grid-item-category"
        );

        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'grid_item_title_margin',
            'margin',
            "%%order_class%% .dipi-grid-item-title"
        );
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'grid_item_title_padding',
            'padding',
            "%%order_class%% .dipi-grid-item-title"
        );
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'grid_item_excerpt_margin',
            'margin',
            "%%order_class%% .dipi-grid-item-excerpt,%%order_class%% p.dipi-grid-item-excerpt"
        );
        $this->dipi_apply_custom_margin_padding(
            $render_slug,
            'grid_item_excerpt_padding',
            'padding',
            "%%order_class%% .dipi-grid-item-excerpt,%%order_class%% p.dipi-grid-item-excerpt"
        );
        
        
        ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .img-container.dipi-fg-animation:hover img',
            'declaration' => "transition-duration: " . intval($this->props["image_animation_speed"]) / 1000 . "s;",
        ]);
        //Width of grid items
        ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid-sizer, %%order_class%% .grid-item',
            'declaration' => "width: calc((100% - ({$columns} - 1) * {$gutter}px) / {$columns});",
        ]);

        ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid-sizer, %%order_class%% .grid-item',
            'declaration' => "width: calc((100% - ({$columns_tablet} - 1) * {$gutter_tablet}px) / {$columns_tablet});",
            'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
        ]);

        ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid-sizer, %%order_class%% .grid-item',
            'declaration' => "width: calc((100% - ({$columns_phone} - 1) * {$gutter_phone}px) / {$columns_phone});",
            'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
        ]);

        // Height of Grid Items
        $this->generate_styles(
            array(
                'base_attr_name' => 'row_height',
                'selector' => "%%order_class%%.dipi_filterable_grid .dipi_filterable_grid_wrapper.layout_grid .grid .img-container, %%order_class%%.dipi_filterable_grid .dipi_filterable_grid_wrapper.layout_grid .grid .img-container img",
                'css_property' => 'height',
                'render_slug' => $render_slug,
                'type' => 'range',
            )
        );
        //Gutter of grid items
        ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid-item',
            'declaration' => "margin-bottom: {$gutter}px;",
        ]);

        ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid-item',
            'declaration' => "margin-bottom: {$gutter_tablet}px;",
            'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
        ]);

        ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid-item',
            'declaration' => "margin-bottom: {$gutter_phone}px;",
            'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
        ]);
        $this->generate_styles(
            array(
                'base_attr_name' => 'gutter',
                'selector' => "%%order_class%%.dipi_filterable_grid .dipi_filterable_grid_wrapper.layout_grid .grid",
                'css_property' => 'column-gap',
                'render_slug' => $render_slug,
                'type' => 'range',
            )
        );
        ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .gutter-sizer',
            'declaration' => "width: {$gutter}px;",
        ]);

        ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .gutter-sizer',
            'declaration' => "width: {$gutter_tablet}px;",
            'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
        ]);

        ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .gutter-sizer',
            'declaration' => "width: {$gutter_phone}px;",
            'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
        ]);

        //Remove gutter from outer grid
        ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid',
            'declaration' => "margin-bottom: -{$gutter}px;",
        ]);

        ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid',
            'declaration' => "margin-bottom: -{$gutter_tablet}px;",
            'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
        ]);

        ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid',
            'declaration' => "margin-bottom: -{$gutter_phone}px;",
            'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
        ]);

        if ('on' === $this->props["show_overflow"]) {
            ET_Builder_Element::set_style($render_slug, [
                'selector' => '%%order_class%%.dipi_filterable_grid, %%order_class%%.dipi_filterable_grid .grid-item',
                'declaration' => "overflow: visible !important;",
            ]);
        }

        if ('on' === $this->props["use_overlay"]) {
            $overlay_bg_image = [];
            $overlay_bg_style = '';
            $use_overlay_bg_gradient = $this->props["overlay_bg_use_color_gradient"];
            $overlay_bg_type = $this->props["overlay_bg_color_gradient_type"];
            $overlay_bg_direction = $this->props["overlay_bg_color_gradient_direction"];
            $overlay_bg_direction_radial = $this->props["overlay_bg_color_gradient_direction_radial"];
            $overlay_bg_start = $this->props["overlay_bg_color_gradient_start"];
            $overlay_bg_end = $this->props["overlay_bg_color_gradient_end"];
            $overlay_bg_start_position = $this->props["overlay_bg_color_gradient_start_position"];
            $overlay_bg_end_position = $this->props["overlay_bg_color_gradient_end_position"];
            $overlay_bg_overlays_image = $this->props["overlay_bg_color_gradient_overlays_image"];
            $overlay_icon_use_circle = $this->props['overlay_icon_use_circle'];
            $overlay_icon_use_circle_border = $this->props['overlay_icon_use_circle_border'];
            $overlay_icon_use_icon_font_size = $this->props['overlay_icon_use_icon_font_size'];
            $overlay_icon_selector = '%%order_class%%.dipi_filterable_grid .grid .grid-item .dipi_filterable_grid_overlay .dipi-filterable-grid-icon';
            $overlay_icon_hover_selector = '%%order_class%%.dipi_filterable_grid .grid .grid-item .dipi_filterable_grid_overlay .dipi-filterable-grid-icon:hover';
            $overlay_icon_circle_selector = '%%order_class%%.dipi_filterable_grid .grid .grid-item .dipi_filterable_grid_overlay .dipi-filterable-grid-icon.dipi-filterable-grid-icon-circle';
            $overlay_icon_circle_hover_selector = '%%order_class%%.dipi_filterable_grid .grid .grid-item .dipi_filterable_grid_overlay .dipi-filterable-grid-icon.dipi-filterable-grid-icon-circle:hover';
            $overlay_selector = '%%order_class%%.dipi_filterable_grid .grid .grid-item .dipi_filterable_grid_overlay.content';
            $overlay_selector_background = '%%order_class%%.dipi_filterable_grid .grid .grid-item .dipi_filterable_grid_overlay.background';
            $icon_delay = $this->props['icon_delay'];
            $icon_speed = $this->props['icon_speed'];
            $title_delay = $this->props['title_delay'];
            $title_speed = $this->props['title_speed'];
            $excerpt_delay = $this->props['excerpt_delay'];
            $excerpt_speed = $this->props['excerpt_speed'];
            $hover_icon_selector = "%%order_class%%.dipi_filterable_grid .grid .grid-item:hover .dipi_filterable_grid_overlay .dipi-filterable-grid-icon";
            $hover_title_selector = "%%order_class%%.dipi_filterable_grid .grid .grid-item:hover .dipi_filterable_grid_overlay .dipi-filterable-grid-title";
            $hover_excerpt_selector = "%%order_class%%.dipi_filterable_grid .grid .grid-item:hover .dipi_filterable_grid_overlay .dipi-filterable-grid-excerpt";
            
            $this->set_background_css($render_slug, '%%order_class%% .grid .grid-item .dipi_filterable_grid_overlay.background', '%%order_class%% .grid .grid-item .dipi_filterable_grid_overlay.background-hover', 'overlay_bg', 'overlay_bg_color');

            ET_Builder_Element::set_style($render_slug, [
                'selector' => $hover_icon_selector,
                'declaration' => "animation-duration: {$icon_speed} !important;",
            ]);
            ET_Builder_Element::set_style($render_slug, [
                'selector' => $hover_icon_selector,
                'declaration' => "animation-delay: {$icon_delay} !important;",
            ]);

            ET_Builder_Element::set_style($render_slug, [
                'selector' => $hover_title_selector,
                'declaration' => "animation-duration: {$title_speed} !important;",
            ]);
            ET_Builder_Element::set_style($render_slug, [
                'selector' => $hover_title_selector,
                'declaration' => "animation-delay: {$title_delay} !important;",
            ]);

            ET_Builder_Element::set_style($render_slug, [
                'selector' => $hover_excerpt_selector,
                'declaration' => "animation-duration: {$excerpt_speed} !important;",
            ]);

            ET_Builder_Element::set_style($render_slug, [
                'selector' => $hover_excerpt_selector,
                'declaration' => "animation-delay: {$excerpt_delay} !important;",
            ]);

            $this->dipi_apply_custom_margin_padding(
                $render_slug,
                'overlay_padding',
                'padding',
                $overlay_selector
            );

            $text_align_style = sprintf(
                'text-align: %1$s !important;',
                $this->props['overlay_align_horizontal'] === 'flex-start' ? 'left' :
                ($this->props['overlay_align_horizontal'] === 'flex-end' ? 'right' : 'center')
            );
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $overlay_selector,
                'declaration' => $text_align_style,
            ));
            $this->generate_styles(
                array(
                    'base_attr_name' => 'overlay_align_horizontal',
                    'selector' => $overlay_selector,
                    'css_property' => 'align-items',
                    'render_slug' => $render_slug,
                    'type' => 'select',
                )
            );

            $this->generate_styles(
                array(
                    'base_attr_name' => 'overlay_align_vertical',
                    'selector' => $overlay_selector,
                    'css_property' => 'justify-content',
                    'render_slug' => $render_slug,
                    'type' => 'select',
                )
            );

            // Overlay Icon
            if ('off' !== $overlay_icon_use_icon_font_size) {
                $this->dipi_apply_custom_style(
                    $render_slug,
                    'overlay_icon_font_size',
                    'font-size',
                    $overlay_icon_selector
                );            
                $this->dipi_apply_custom_style_for_hover(
                    $render_slug,
                    'overlay_icon_font_size',
                    'font-size',
                    $overlay_icon_hover_selector
                );
            }
            $this->dipi_apply_custom_style(
                $render_slug,
                'overlay_icon_color',
                'color',
                $overlay_icon_selector
            );            
            $this->dipi_apply_custom_style_for_hover(
                $render_slug,
                'overlay_icon_color',
                'color',
                $overlay_icon_hover_selector
            );
            if ('on' === $overlay_icon_use_circle) {
                $this->dipi_apply_custom_style(
                    $render_slug,
                    'overlay_icon_circle_color',
                    'background-color',
                    $overlay_icon_circle_selector
                ); 
                $this->dipi_apply_custom_style_for_hover(
                    $render_slug,
                    'overlay_icon_circle_color',
                    'background-color',
                    $overlay_icon_circle_hover_selector,
                    true
                ); 
                $this->dipi_apply_custom_margin_padding(
                    $render_slug,
                    'overlay_icon_circle_padding',
                    'padding',
                    $overlay_icon_circle_selector
                );
                if ('on' === $overlay_icon_use_circle_border) {
                    $this->generate_styles(
                        array(
                            'base_attr_name' => 'overlay_icon_circle_border_color',
                            'selector' => $overlay_icon_circle_selector,
                            'css_property' => 'border-color',
                            'render_slug' => $render_slug,
                            'type' => 'color',
                        )
                    );
                }
            }
        }
    }
}

new DIPI_FilterableGrid;
