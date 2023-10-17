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
        $this->icon_path = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->name = esc_html__('Pixel Filterable Grid', 'dipi-divi-pixel');
        $this->main_css_element = '%%order_class%%';
        $this->settings_modal_toggles = [
            'general' => [
                'toggles' => [
                    'filter_settings' => esc_html__('Filter Settings', 'dipi-divi-pixel'),
                    'pagination' => esc_html__('Pagination', 'dipi-divi-pixel'),
                    'filter_bar' => esc_html__('Filter Bar', 'dipi-divi-pixel'),
                    'grid' => esc_html__('Grid', 'dipi-divi-pixel'),
                    'grid_items' => esc_html__('Grid Items', 'dipi-divi-pixel'),
                    'posts' => esc_html__('Posts', 'dipi-divi-pixel'),
                    'overlay' => esc_html__('Image Overlay', 'dipi-divi-pixel'),
                    'overlay_animation' => array(
                        'title' => esc_html__('Image Overlay Animation', 'dipi-divi-pixel'),
                        'tabbed_subtoggles' => true,
                        'sub_toggles' => [
                            'icon' => [
                                'name' => 'Icon',
                            ],
                            'title' => [
                                'name' => 'Title',
                            ],
                            'excerpt' => [
                                'name' => 'Excerpt',
                            ],
                        ],
                    ),
                ],
            ],
            'advanced' => [
                'toggles' => [
                    'pagination_btn'  => [
                        'title' =>  esc_html__('Pagination Button', 'dipi-divi-pixel'),
                        'tabbed_subtoggles' => true,
                        'sub_toggles' => [
                            'normal' => [
                                'name' => 'Normal',
                            ],
                            'active' => [
                                'name' => 'Active',
                            ],
                        ],
                    ],
                    'load_more' => esc_html__('Load More', 'dipi-divi-pixel'),
                    'filter_bar' => esc_html__('Filter Bar', 'dipi-divi-pixel'),
                    'filter_bar_items' => [
                        'title' => esc_html__('Filter Bar Items', 'dipi-divi-pixel'),
                        'tabbed_subtoggles' => true,
                        'sub_toggles' => [
                            'normal' => [
                                'name' => 'Normal',
                            ],
                            'active' => [
                                'name' => 'Active',
                            ],
                            'desc' => [
                                'name' => 'Description',
                            ],
                        ],
                    ],
                    'grid' => esc_html__('Grid', 'dipi-divi-pixel'),
                    'grid_items' => esc_html__('Grid Items', 'dipi-divi-pixel'),
                    'text'   => array(
                        'title'             => et_builder_i18n( 'Text' ),
                        'tabbed_subtoggles' => true,
                        'bb_icons_support'  => true,
                        'sub_toggles'       => array(
                            'a'     => array(
                                'name' => 'A',
                                'icon' => 'text-link',
                            ),
                            'ul'    => array(
                                'name' => 'UL',
                                'icon' => 'list',
                            ),
                            'ol'    => array(
                                'name' => 'OL',
                                'icon' => 'numbered-list',
                            ),
                            'quote' => array(
                                'name' => 'QUOTE',
                                'icon' => 'text-quote',
                            ),
                        ),
                    ),
                    'header' => array(
                        'title'             => esc_html__( 'Heading Text', 'et_builder' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'h1' => array(
                                'name' => 'H1',
                                'icon' => 'text-h1',
                            ),
                            'h2' => array(
                                'name' => 'H2',
                                'icon' => 'text-h2',
                            ),
                            'h3' => array(
                                'name' => 'H3',
                                'icon' => 'text-h3',
                            ),
                            'h4' => array(
                                'name' => 'H4',
                                'icon' => 'text-h4',
                            ),
                            'h5' => array(
                                'name' => 'H5',
                                'icon' => 'text-h5',
                            ),
                            'h6' => array(
                                'name' => 'H6',
                                'icon' => 'text-h6',
                            ),
                        ),
                    ),
                    'grid_item_meta_text' => [
                        'title' => esc_html__('Meta Text', 'dipi-divi-pixel'),
                        'tabbed_subtoggles' => true,
                        'sub_toggles' => [
                            'all' => [
                                'name' => 'All',
                            ],
                            'author' => [
                                'name' => 'Author',
                            ],
                            'date' => [
                                'name' => 'Date',
                            ],
                            'category' => [
                                'name' => 'Category',
                            ]
                        ]
                    ],
                    'grid_item_text' => [
                        'title' => esc_html__('Content Text', 'dipi-divi-pixel'),
                        'tabbed_subtoggles' => true,
                        'sub_toggles' => [
                            'title' => [
                                'name' => 'Title',
                            ],
                            'excerpt' => [
                                'name' => 'Excerpt',
                            ]
                        ]
                    ],
                    'grid_item_date' => esc_html__('Grid Item Date', 'dipi-divi-pixel'),               
                    'grid_item_read_more_btn' => esc_html__('Read More Button', 'dipi-divi-pixel'),
                    'overlay_text_group' => array(
                        'title' => esc_html__('Image Overlay Text', 'dipi-divi-pixel'),
                        'tabbed_subtoggles' => true,
                        'sub_toggles' => [
                            'title' => [
                                'name' => 'Title',
                            ],
                            'excerpt' => [
                                'name' => 'Excerpt',
                            ],
                        ],
                    ),
                    'overlay' => esc_html__('Image Overlay', 'dipi-divi-pixel'),
                ],
            ],
        ];
        $this->custom_css_fields = array(
            'filter_bar'=> array(
                'label' => esc_html__('Filter Bar', 'dipi-divi-pixel'),
                'selector' => '.dipi-filter-bar',
            ),
            'filter_bar_item_title'=> array(
                'label' => esc_html__('Filter Bar Item', 'dipi-divi-pixel'),
                'selector' => '.dipi-filter-bar-item',
            ),
            'filter_bar_item_title'=> array(
                'label' => esc_html__('Filter Bar Item Title', 'dipi-divi-pixel'),
                'selector' => '.dipi-filter-bar-item-title',
            ),
            'filter_bar_item_desc'=> array(
                'label' => esc_html__('Filter Bar Item Description', 'dipi-divi-pixel'),
                'selector' => '.dipi-filter-bar-item-desc',
            ),
            'grid'=> array(
                'label' => esc_html__('Grid', 'dipi-divi-pixel'),
                'selector' => '.dipi_filterable_grid_wrapper .grid',
            ),
            'grid_item'=> array(
                'label' => esc_html__('Grid Item', 'dipi-divi-pixel'),
                'selector' => '.dipi_filterable_grid_wrapper .grid  .grid-item',
            ),
            'grid_item_img'=> array(
                'label' => esc_html__('Grid Image', 'dipi-divi-pixel'),
                'selector' => '.dipi_filterable_grid_wrapper .grid  .grid-item .img-container img',
            ),
            'grid_item_meta' => array(
                'label' => esc_html__('Grid Meta', 'dipi-divi-pixel'),
                'selector' => '.dipi_filterable_grid_wrapper .grid  .grid-item .dipi-post-meta',
            ),
            'grid_item_author_prefix' => array(
                'label' => esc_html__('Author Prefix', 'dipi-divi-pixel'),
                'selector' => '.dipi_filterable_grid_wrapper .grid  .grid-item .dipi-post-meta .dipi-author-prefix',
            ),
            'grid_item_author_avatar' => array(
                'label' => esc_html__('Author Avatar', 'dipi-divi-pixel'),
                'selector' => '.dipi_filterable_grid_wrapper .grid  .grid-item .dipi-post-meta .dipi-author img',
            ),
            'grid_item_author_link' => array(
                'label' => esc_html__('Author Text', 'dipi-divi-pixel'),
                'selector' => '.dipi_filterable_grid_wrapper .grid  .grid-item .dipi-post-meta .dipi-author a',
            ),
            'grid_item_meta_separator' => array(
                'label' => esc_html__('Meta Separator', 'dipi-divi-pixel'),
                'selector' => '.dipi_filterable_grid_wrapper .grid  .grid-item .dipi-post-meta-separator',
            ),
            'grid_item_category' => array(
                'label' => esc_html__('Category', 'dipi-divi-pixel'),
                'selector' => '.dipi_filterable_grid_wrapper .grid  .grid-item .dipi-post-meta .dipi-grid-item-category',
            ),
            'grid_item_date' => array(
                'label' => esc_html__('Date', 'dipi-divi-pixel'),
                'selector' => '.dipi_filterable_grid_wrapper .grid  .grid-item .dipi-post-meta .post-date',
            ),
            'grid_item_author' => array(
                'label' => esc_html__('Author', 'dipi-divi-pixel'),
                'selector' => '.dipi_filterable_grid_wrapper .grid  .grid-item .dipi-post-meta .dipi-author',
            ),
            'grid_item_title' => array(
                'label' => esc_html__('Grid TItle', 'dipi-divi-pixel'),
                'selector' => '.dipi_filterable_grid_wrapper .grid  .grid-item .dipi-grid-item-title',
            ),
            'grid_item_excerpt' => array(
                'label' => esc_html__('Grid Excerpt', 'dipi-divi-pixel'),
                'selector' => '.dipi_filterable_grid_wrapper .grid  .grid-item .dipi-grid-item-excerpt',
            ),
            'overlay_icon' => array(
                'label' => esc_html__('Overlay Icon', 'dipi-divi-pixel'),
                'selector' => '.dipi-filterable-grid-icon',
            ),
            'overlay_title' => array(
                'label' => esc_html__('Overlay Title', 'dipi-divi-pixel'),
                'selector' => '.dipi-filterable-grid-title',
            ),
            'overlay_excerpt' => array(
                'label' => esc_html__('Overlay Excerpt', 'dipi-divi-pixel'),
                'selector' => '.dipi-filterable-grid-excerpt',
            ),
            'filter_bar_container' => array(
                'label' => esc_html__('Filter bar Container', 'dipi-divi-pixel'),
                'selector' => '.dipi-filter-bar',
            ),
        );
    }

    public function get_fields()
    {
        $et_accent_color = et_builder_accent_color();
        $registered_post_types = et_get_registered_post_type_options( false, false );
        $excluded_post_types = array( 'Media', 'Taxonomies', 'Popup Maker');
        
        $dipi_taxonomies_object = get_taxonomies(
            array(),
            'objects'
        );
      
        $dipi_taxonomies_object = array_filter($dipi_taxonomies_object, function($object){
            $exclude_taxonomies = array(
                'dipi_media_category',
                'layout_pack',
                'layout_type',
                'layout_category',
                'layout_tag',
                'scope',
                'module_width',
                'nav_menu',
                'link_category',
                'post_format',
                'wp_template_part_area',
                'wp_theme',
                'post_translations',
                'term_language',
                'term_translations'
            );
            return !in_array($object->name, $exclude_taxonomies);
        });
        $dipi_taxonomies_options = array_map(function($object) {
            return array($object->name => $object->label);
        }, $dipi_taxonomies_object);

        /*$dipi_taxonomies_options = array_merge($dipi_taxonomies_options, 
            array('post_category'=> (object)array('category'=>'Category')));*/
        $post_types = array_diff( $registered_post_types, $excluded_post_types);
        $fields = [];
        $fields['select_post_type'] = [
            'toggle_slug'       => 'filter_settings',
            'label'             => esc_html__( 'Custom Post Type', 'dipi-divi-pixel' ),
            'type'              => 'select',
            'options'           => $post_types,
            'default'           => 'post',
            'computed_affects' => array(
              '__filterable_grid',
            ),
            'description'       => esc_html__( 'Choose the post type you want to display', 'divi-filter' ),
        ];
        $fields['select_custom_tax'] =[
            'toggle_slug'       => 'filter_settings',
            'label'             => esc_html__( 'Custom Taxonomy', 'dipi-divi-pixel' ),
            'type'              => 'select',
            'options'           => $dipi_taxonomies_options,
            'option_category'   => 'configuration',
            'default'           => 'dipi_cpt_category',
            'description'       => esc_html__( 'Choose the custom taxonomy that you have made and want to filter', 'dipi-divi-pixel' ),
            'computed_affects' => ['__filterable_grid'],
        ];
        $computed_depends_on = [];
        foreach($dipi_taxonomies_object as $dipi_tax_object) {
            $include_term_ids = "include_term_ids_of_$dipi_tax_object->name";
            array_push($computed_depends_on, $include_term_ids);
            $fields[$include_term_ids] =[
                'label' => esc_html__("Included $dipi_tax_object->label", 'dipi-divi-pixel'),
                'type' => 'categories',
                'option_category' => 'basic_option',
                'toggle_slug' => 'filter_settings',
                'renderer_options' => array(
                    'use_terms' => true,
                    'term_name' => $dipi_tax_object->name,
                ),
                'computed_affects' => ['__filterable_grid'],
                'show_if'   => array (
                    'select_custom_tax' => $dipi_tax_object->name
                )
            ];
        }
        /*$fields['include_term_ids'] = [
            'label' => esc_html__('Included Divi Pixel Category', 'dipi-divi-pixel'),
            'type' => 'categories',
            'option_category' => 'basic_option',
            'toggle_slug' => 'filter_settings',
            'renderer_options' => array(
                'use_terms' => true,
                'term_name' => 'dipi_cpt_category'
            ),
            'computed_affects' => ['__filterable_grid'],
        ];*/
        $fields['pagination_type'] = [
            'label' => esc_html__('Pagination Type', 'dipi-divi-pixel'),
            'type' => 'select',
            'option_category' => 'configuration',
            'options' => [
                'none' => esc_html__('None', 'dipi-divi-pixel'),
                'numbered_pagination' => esc_html__('Numbered Pagination', 'dipi-divi-pixel'),
                'load_more' => esc_html__('Load More', 'dipi-divi-pixel'),
                'infinite_scroll' => esc_html__('Infinite Scroll', 'dipi-divi-pixel'),
            ],
            'default' => 'none',
            'toggle_slug' => 'pagination',
            'description' => esc_html__("Define the type of pagination.", 'dipi-divi-pixel'),
            'computed_affects' => ['__filterable_gallery'],
            'mobile_options' => true,
        ];
        $fields['post_count'] = [
            'label' => esc_html__('Post Count', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'unitless' => true,
            'default' => '-1',
            'range_settings' => array(
                'min' => '-1',
                'max' => '50',
                'step' => '1',
            ),
            'toggle_slug' => 'pagination',
            'description' => esc_html__("Define the number of Posts that should be displayed.", 'dipi-divi-pixel'),
            'computed_affects' => ['__filterable_grid'],
            'mobile_options' => true,
            'show_if' => [
                'pagination_type' => 'none'
            ]
        ];
        $fields['posts_per_page'] = [
            'label' => esc_html__('Posts Per Page', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'unitless' => true,
            'default' => '10',
            'range_settings' => array(
                'min' => '1',
                'max' => '50',
                'step' => '1',
            ),
            'toggle_slug' => 'pagination',
            'description' => esc_html__("Define the number of posts that should be displayed on a page.", 'dipi-divi-pixel'),
            'computed_affects' => ['__filterable_gallery'],
            'show_if_not' => [
                'pagination_type' => 'none'
            ]
        ];
        $fields["prev_btn_text"] = [
            'label'       => esc_html__('Prev Button Text', 'dipi-divi-pixel'),
            'type'        => 'text',
            'toggle_slug' => 'pagination',
            'default' => 'Prev',
            'computed_affects' => array(
                '__filterable_gallery',
            ),
            'show_if' => [
                'pagination_type' => ['numbered_pagination']
            ]
        ];
        $fields["next_btn_text"] = [
            'label'       => esc_html__('Next Button Text', 'dipi-divi-pixel'),
            'type'        => 'text',
            'toggle_slug' => 'pagination',
            'default' => 'Next',
            'computed_affects' => array(
                '__filterable_gallery',
            ),
            'show_if' => [
                'pagination_type' => ['numbered_pagination']
            ]
        ]; 
        $fields["load_more_text"] = [
            'label'       => esc_html__('Load More Text', 'dipi-divi-pixel'),
            'type'        => 'text',
            'toggle_slug' => 'pagination',
            'default' => 'Load More',
            'dynamic_content' => 'text',
            'computed_affects' => array(
                '__filterable_gallery',
            ),
            'show_if' => [
                'pagination_type' => ['load_more','infinite_scroll']
            ]
        ]; 
        $fields['infinite_scroll_viewport'] = [
            'label'           => esc_html__( 'Infinite Scrolling Viewport', 'dipi-divi-pixel' ),
            'description' => esc_html__('Load more images when scrolled this amount. Shouldn\'t be larger than 50% of screen height', 'dipi-divi-pixel'),
            'type'            => 'range',
            'range_settings'  => [
                'min'  => 0,
                'max'  => 50,
                'step' => 1,
            ],
            'default'             => '25%',
            'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
            'validate_unit'       => true,
            'fixed_range'         => true,
            'reset_animation'     => true,
            'toggle_slug' => 'pagination',
            'show_if' => [
                'pagination_type' => 'infinite_scroll'
            ]
        ]; 
        $fields['post_orderby'] = array(
            'label' => esc_html__('Order By', 'dipi-divi-pixel'),
            'type' => $this->is_loading_bb_data() ? 'hidden' : 'select',
            'options' => array(
                '' => esc_html__('Date: new to old', 'et_builder'),
                'date_asc' => esc_html__('Date: old to new', 'et_builder'),
                'title_asc' => esc_html__('Title: a-z', 'et_builder'),
                'title_desc' => esc_html__('Title: z-a', 'et_builder'),
                'menu_asc' => esc_html__('Menu Order: ASC', 'dipi-divi-pixel'),
                'menu_desc' => esc_html__('Menu Order: Desc', 'dipi-divi-pixel'),
                'rand' => esc_html__('Random', 'dipi-divi-pixel'),
            ),
            'class' => array('et-pb-post-ids-field'),
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'toggle_slug' => 'filter_settings',
        );
        $fields['post_status'] = [
            'toggle_slug'       => 'filter_settings',
            'option_category'   => 'configuration',
                'label'             => esc_html__( 'Post Status', 'dipi-divi-pixel' ),
                'type'              => 'select',
                'options'           => array(
                'publish' => sprintf( esc_html__( 'Publish', 'dipi-divi-pixel' ) ),
                'pending' => esc_html__( 'Pending', 'dipi-divi-pixel' ),
                'draft' => esc_html__( 'Draft', 'dipi-divi-pixel' ),
                'auto-draft' => esc_html__( 'Auto-draft', 'dipi-divi-pixel' ),
                'future' => esc_html__( 'Future', 'dipi-divi-pixel' ),
                'private' => esc_html__( 'Private', 'dipi-divi-pixel' ),
                'inherit' => esc_html__( 'Inherit', 'dipi-divi-pixel' ),
            ),
            'default' => 'publish',
            'computed_affects' => ['__filterable_grid'],
            'description'       => esc_html__( 'Choose the status of the posts you want to show.', 'dipi-divi-pixel' ),
        ];
        $fields['filter_bar_layout'] = [
            'label' => esc_html__('Layout', 'dipi-divi-pixel'),
            'type' => 'select',
            'option_category' => 'configuration',
            'options' => [
                /*'dropdown' => esc_html__('Dropdown', 'dipi-divi-pixel'),*/
                'row' => esc_html__('Inline', 'dipi-divi-pixel'),
                'column' => esc_html__('Stacked', 'dipi-divi-pixel')
            ],
            'mobile_options' => true,
            'responsive' => true,
            'default' => 'row',
            'toggle_slug' => 'filter_bar',
        ];
        $fields['filter_tab_alignment'] =[
            'label'            => esc_html__( 'Filter Tab Alignment', 'et_builder' ),
            'type'             => 'select',
            'option_category'  => 'configuration',
            'options_icon' => 'module_align',
            'options' => [
                'start' => esc_html__('Left', 'dipi-divi-pixel'),
                'center' => esc_html__('Center', 'dipi-divi-pixel'),
                'end' => esc_html__('Right', 'dipi-divi-pixel'),
            ],
            'toggle_slug'      => 'filter_bar',
            'mobile_options' => true,
        ];
        $fields["show_all_filter"] = [
            'label' => esc_html__('Show All Filter', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'default' => 'on',
            'options' => array(
                'off' => esc_html__('No', 'dipi-divi-pixel'),
                'on' => esc_html__('Yes', 'dipi-divi-pixel'),
            ),
            'toggle_slug'      => 'filter_bar',
            'computed_affects' => array(
                '__filterable_grid',
            ),
        ];
        $fields["all_filter_label"] = [
            'label'       => esc_html__('All Filter Label', 'dipi-divi-pixel'),
            'type'        => 'text',
            'toggle_slug' => 'filter_bar',
            'show_if' => ['show_all_filter' => 'on'],
            'default' => 'All',
            'dynamic_content' => 'text',
            'computed_affects' => array(
                '__filterable_grid',
            ),
        ];
        $fields["hide_description"] = [
            'label' => esc_html__('Hide Description of Taxonomy', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('No', 'dipi-divi-pixel'),
                'on' => esc_html__('Yes', 'dipi-divi-pixel'),
            ),
            'toggle_slug'      => 'filter_bar',
            'computed_affects' => array(
                '__filterable_grid',
            ),
        ];
        $fields["show_num_of_elements"] = [
            'label' => esc_html__('Show Number of Elements', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('No', 'dipi-divi-pixel'),
                'on' => esc_html__('Yes', 'dipi-divi-pixel'),
            ),
            'toggle_slug'      => 'filter_bar',
            'computed_affects' => array(
                '__filterable_grid',
            ),
        ];
        $fields['grid_layout'] = [
            'label' => esc_html__('Layout', 'dipi-divi-pixel'),
            'type' => 'select',
            'option_category' => 'configuration',
            'options' => [
                'grid' => esc_html__('Grid', 'dipi-divi-pixel'),
                'masonry' => esc_html__('Masonry', 'dipi-divi-pixel')
            ],
            'default' => 'masonry',
            'toggle_slug' => 'grid',
            'computed_affects' => array(
                '__filterable_grid',
            ),
        ];

        $fields["columns"] = [
            'label' => esc_html__('Columns', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'basic_option',
            'toggle_slug' => 'grid',
            'default' => '4',
            'range_settings' => array(
                'min' => '1',
                'max' => '10',
                'step' => '1',
            ),
            'mobile_options' => true,
            'responsive' => true,
            'unitless' => true,
            'default_unit' => '',
        ];
        $fields['row_height'] = [
            'label' => esc_html__('Row Height', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
            'range_settings' => [
                'min' => '0',
                'max' => '500',
                'step' => '10',
            ],
            'show_if' => [
                'grid_layout' => 'grid',
            ],
            'default_unit' => 'px',
            'toggle_slug' => 'grid',
            'mobile_options' => true,
        ];


        $fields["gutter"] = [
            'label' => esc_html__('Gutter', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'layout',
            'toggle_slug' => 'grid',
            'default' => '10',
            'range_settings' => array(
                'min' => '0',
                'max' => '100',
                'step' => '1',
            ),
            'mobile_options' => true,
            'responsive' => true,
            'unitless' => true,
        ];
        $fields['grid_animation'] = array(
            'label' => esc_html__('Grid Animation', 'dipi-divi-pixel'),
            'type' => 'select',
            'options' => array(
                'none' => esc_html__('None', 'dipi-divi-pixel'),
                'fadeIn'  => esc_html__('Fade In', 'dipi-divi-pixel'),
                'fadeInLeftShort'  => esc_html__('FadeIn Left', 'dipi-divi-pixel'),
                'fadeInRightShort' => esc_html__('FadeIn Right', 'dipi-divi-pixel'),
                'fadeInUpShort'    => esc_html__('FadeIn Up', 'dipi-divi-pixel'),
                'fadeInDownShort'  => esc_html__('FadeIn Down', 'dipi-divi-pixel'),
                'zoomInShort'       => esc_html__('Grow', 'dipi-divi-pixel'),
                'bounceInShort' => esc_html__('BounceIn', 'dipi-divi-pixel'),
                'bounceInLeftShort' => esc_html__('BounceIn Left', 'dipi-divi-pixel'),
                'bounceInRightShort' => esc_html__('BounceIn Right', 'dipi-divi-pixel'),
                'bounceInUpShort' => esc_html__('BounceIn Up', 'dipi-divi-pixel'),
                'bounceInDownShort' => esc_html__('BounceIn Down', 'dipi-divi-pixel'),
                'flipInXShort' => esc_html__('FlipInX', 'dipi-divi-pixel'),
                'flipInYShort' => esc_html__('FlipInY', 'dipi-divi-pixel'),
                'jackInTheBoxShort' => esc_html__('JackInTheBox', 'dipi-divi-pixel'),
                'rotateInShort'  => esc_html__('RotateIn', 'dipi-divi-pixel'),
                'rotateInDownLeftShort' => esc_html__('RotateIn DownLeft', 'dipi-divi-pixel'),
                'rotateInUpLeftShort' => esc_html__('RotateIn UpLeft', 'dipi-divi-pixel'),
                'rotateInDownRightShort' => esc_html__('RotateIn DownRight', 'dipi-divi-pixel'),
                'rotateInUpRightShort' => esc_html__('RotateIn UpRight', 'dipi-divi-pixel'),
            ),
            'default' => 'none',
            'toggle_slug' => 'grid',
            'computed_affects' => array(
                '__filterable_grid',
            ),
        );
        $fields['grid_animation_delay'] = [
            'label' => esc_html__('Interval Delay', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'default' => '0ms',
            'default_on_front' => '0ms',
            'default_unit' => 'ms',
            'range_settings' => [
                'min' => '0',
                'max' => '3000',
                'step' => '100',
            ],
            'validate_unit' => true,
            'toggle_slug' => 'grid',
            'computed_affects' => array(
                '__filterable_grid',
            ),
             
        ];
        $fields['grid_animation_speed'] = [
            'label' => esc_html__('Grid Animation Speed', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'default' => '1000ms',
            'default_on_front' => '1000ms',
            'default_unit' => 'ms',
            'range_settings' => [
                'min' => '0',
                'max' => '3000',
                'step' => '100',
            ],
            'validate_unit' => true,
            'toggle_slug' => 'grid',
            'computed_affects' => array(
                '__filterable_grid',
            ),
        ];

        $fields['fix_lazy'] = [
            'label' => esc_html__('Fix Lazy Loading Images', 'ds-suit-material'),
            'description' => esc_html__('Whether or not to use apply a fix for lazy loading images. Only activate this setting, if you encounter issues with the gallery in combination with lazy loading images plugins like Jetpack.', 'ds-suit'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'toggle_slug' => 'grid',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'ds-suit-material'),
                'on' => esc_html__('On', 'ds-suit-material'),
            ),
        ];

        $fields['image_animation'] = array(
            'label' => esc_html__('Image Animation', 'dipi-divi-pixel'),
            'type' => 'select',
            'options' => array(
                'none' => esc_html__('None', 'dipi-divi-pixel'),
                'zoom-in' => esc_html__('Zoom In', 'dipi-divi-pixel'),
                'zoom-out' => esc_html__('Zoom Out', 'dipi-divi-pixel'),
                'move-up' => esc_html__('Move Up', 'dipi-divi-pixel'),
                'move-down' => esc_html__('Move Down', 'dipi-divi-pixel'),
                'move-left' => esc_html__('Move Left', 'dipi-divi-pixel'),
                'move-right' => esc_html__('Move Right', 'dipi-divi-pixel'),
                'rotate' => esc_html__('Rotate', 'dipi-divi-pixel'),
            ),
            'default' => 'none',
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'toggle_slug' => 'grid_items',
        );

        $fields['image_animation_speed'] = [
            'label' => esc_html__('Image Animation Speed', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'default' => '600ms',
            'default_on_front' => '500ms',
            'default_unit' => 'ms',
            'range_settings' => [
                'min' => '0',
                'max' => '3000',
                'step' => '100',
            ],
            'validate_unit' => true,
            'toggle_slug' => 'grid_items',
        ];
        $fields['show_post_title'] = [
            'label' => esc_html__('Show Title in Grid item', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'configuration',
            'toggle_slug' => 'grid_items',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'dipi-divi-pixel'),
                'on' => esc_html__('On', 'dipi-divi-pixel'),
            ),
            'computed_affects' => array(
                '__filterable_grid',
            ),
        ];
        $fields['show_post_excerpt'] = [
            'label' => esc_html__('Show Excerpt in Grid item', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'configuration',
            'toggle_slug' => 'grid_items',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'dipi-divi-pixel'),
                'on' => esc_html__('On', 'dipi-divi-pixel'),
            ),
            'computed_affects' => array(
                '__filterable_grid',
            ),
        ];
        $fields['enable_html_on_grid'] = array(
            'label'   => esc_html__( 'Enable Raw HTML on Grid', 'et_builder' ),
            'type'    => 'yes_no_button',
            'option_category' => 'configuration',
            'toggle_slug' => 'grid_items',
            'options' => array(
                'on'  => et_builder_i18n( 'Yes' ),
                'off' => et_builder_i18n( 'No' ),
            ),
            // Set enable_html default to `on` for taxonomy fields so builder
            // automatically renders taxonomy list properly as unescaped HTML.
            'default' => 'off',
            'show_if' => [
                'show_post_excerpt' => 'on'
            ],
            'computed_affects' => array(
                '__filterable_grid',
            ),
        );
        $fields['enable_shortcode_on_grid'] = array(
            'label'   => esc_html__( 'Enable to Render Shortcode on Grid', 'et_builder' ),
            'type'    => 'yes_no_button',
            'option_category' => 'configuration',
            'toggle_slug' => 'grid_items',
            'options' => array(
                'on'  => et_builder_i18n( 'Yes' ),
                'off' => et_builder_i18n( 'No' ),
            ),
            // Set enable_html default to `on` for taxonomy fields so builder
            // automatically renders taxonomy list properly as unescaped HTML.
            'default' => 'off',
            'show_if' => [
                'show_post_excerpt' => 'on',
                'enable_html_on_grid' => 'on',
            ],
            'computed_affects' => array(
                '__filterable_grid',
            ),
        );
        $fields['excerpt_length'] = [
            'label' => esc_html__('Excerpt Length on Grid', 'dipi-divi-pixel'),
            'type' => 'text',
            'default' => '100',
            'toggle_slug' => 'grid_items',
            'show_if' => [
                'show_post_excerpt' => 'on'
            ],
            'computed_affects' => ['__filterable_grid'],
        ];
        $fields['show_author'] = [
            'label' => esc_html__('Show Author', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'options' => array(
                'on' => esc_html__('Yes', 'dipi-divi-pixel'),
                'off' => esc_html__('No', 'dipi-divi-pixel'),
            ),
            'toggle_slug' => 'grid_items',
            'default_on_front' => 'off',
            'computed_affects' => ['__filterable_grid'],
        ];
        $fields['author_prefix'] = [
            'label'            => esc_html__( 'Author Prefix', 'et_builder' ),
            'type'             => 'text',
            'option_category'  => 'configuration',
            'description'      => esc_html__( 'If you would like to change the author prefix, input the appropriate word here.', 'et_builder' ),
            'toggle_slug'      => 'grid_items',
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'show_if' => [
                'show_author' => 'on',
            ],
            'default'          => 'By',
        ];
        $fields['show_author_avatar'] = [
            'label' => esc_html__('Show Author Avatar', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'options' => array(
                'on' => esc_html__('Yes', 'dipi-divi-pixel'),
                'off' => esc_html__('No', 'dipi-divi-pixel'),
            ),
            'toggle_slug' => 'grid_items',
            'default_on_front' => 'off',
            'show_if' => [
                'show_author' => 'on',
            ],
            'computed_affects' => ['__filterable_grid'],
        ];

        $fields['show_date'] = [
            'label' => esc_html__('Show Date', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'options' => array(
                'on' => esc_html__('Yes', 'dipi-divi-pixel'),
                'off' => esc_html__('No', 'dipi-divi-pixel'),
            ),
            'affects' => [
                'date_circle_icon',
                'date_circle_color',
                'date_circle_border',
                'date_circle_border_color',
            ],
            'toggle_slug' => 'grid_items',
            'default_on_front' => 'off',
            'computed_affects' => ['__filterable_grid'],
        ];
        $fields['meta_date'] = [
            'label'            => esc_html__( 'Date Format', 'et_builder' ),
            'type'             => 'text',
            'option_category'  => 'configuration',
            'description'      => esc_html__( 'If you would like to adjust the date format, input the appropriate PHP date format here.', 'et_builder' ),
            'toggle_slug'      => 'grid_items',
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'show_if' => [
                'show_date' => 'on',
            ],
            'default'          => 'M j, Y',
        ];
        $fields['show_custom_taxonomy'] = [
            'label' => esc_html__('Show Taxonomies in Grid item', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'configuration',
            'toggle_slug' => 'grid_items',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'dipi-divi-pixel'),
                'on' => esc_html__('On', 'dipi-divi-pixel'),
            ),
            'computed_affects' => array(
                '__filterable_grid',
            ),
        ];
        $fields['show_taxonomy_link'] = array(
            'label'   => esc_html__( 'Show Taxonomies as link', 'et_builder' ),
            'type'    => 'yes_no_button',
            'option_category' => 'configuration',
            'toggle_slug' => 'grid_items',
            'options' => array(
                'on'  => et_builder_i18n( 'Yes' ),
                'off' => et_builder_i18n( 'No' ),
            ),
            // Set enable_html default to `on` for taxonomy fields so builder
            // automatically renders taxonomy list properly as unescaped HTML.
            'default' => 'off',
            'show_if' => [
                'show_custom_taxonomy' => 'on'
            ],
            'computed_affects' => array(
                '__filterable_grid',
            ),
        );
        $fields['read_more'] = [
            'label' => esc_html__('Show Read More Button', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'options' => array(
                'off' => esc_html__('No', 'dipi-divi-pixel'),
                'on' => esc_html__('Yes', 'dipi-divi-pixel'),
            ),
            'toggle_slug' => 'grid_items',
            'default' => 'off',
            'computed_affects' => ['__filterable_grid'],
        ];

        $fields['read_more_text'] = [
            'label' => esc_html__('Read More Text', 'dipi-divi-pixel'),
            'type' => 'text',
            'default' => 'Read More',
            'show_if' => [
                'read_more' => 'on',
            ],
            'toggle_slug' => 'grid_items',
            'computed_affects' => ['__filterable_grid'],
        ];
        $fields["read_more_link_target"] = [
            'label' => esc_html__('Shore More Link Target', 'dipi-divi-pixel'),
            'type' => 'select',
            'default' => '_self',
            'options' => array(
                '_self' => esc_html__('Same Window', 'dipi-divi-pixel'),
                '_blank' => esc_html__('New Window', 'dipi-divi-pixel'),
            ),
            'show_if' => [
                'read_more' => 'on',
            ],
            'toggle_slug' => 'grid_items',
        ];
        
        $fields["use_post_link"] = [
            'label' => esc_html__('Use Post Link', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('No', 'dipi-divi-pixel'),
                'on' => esc_html__('Yes', 'dipi-divi-pixel'),
            ),
            'toggle_slug' => 'posts',
            'description' => esc_html__('Open Posts when image is clicked.', 'dipi-divi-pixel'),
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'mobile_options' => false,
        ];
        $fields["post_link_target"] = [
            'label' => esc_html__('Post Link Target', 'dipi-divi-pixel'),
            'type' => 'select',
            'option_category' => 'layout',
            'default' => '_blank',
            'default_on_child' => true,
            'options' => [
                '_self' => esc_html__('Same Window', 'dipi-divi-pixel'),
                '_blank' => esc_html__('New Window', 'dipi-divi-pixel'),
            ],
            'toggle_slug' => 'posts',
            'show_if' => ['use_post_link' => 'on'],
        ];
        $fields["show_lightbox"] = [
            'label' => esc_html__('Show Lightbox', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'default' => 'on',
            'options' => array(
                'off' => esc_html__('No', 'dipi-divi-pixel'),
                'on' => esc_html__('Yes', 'dipi-divi-pixel'),
            ),
            'toggle_slug' => 'posts',
            'description' => esc_html__('Whether or not to show lightbox.', 'dipi-divi-pixel'),
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'show_if' => [
                'use_post_link' => 'off'
            ],
            'mobile_options' => true,
        ];
        $fields["title_in_lightbox"] = [
            'label' => esc_html__('Show Post Title in Lightbox', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'dipi-divi-pixel'),
                'on' => esc_html__('On', 'dipi-divi-pixel'),
            ),
            'toggle_slug' => 'posts',
            'description' => esc_html__('Whether or not to show the Post Title in the lightbox.', 'dipi-divi-pixel'),
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'show_if' => [
                'show_lightbox' => 'on',
            ],
        ];

        $fields["excerpt_in_lightbox"] = [
            'label' => esc_html__('Show Post Excerpt in Lightbox', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'dipi-divi-pixel'),
                'on' => esc_html__('On', 'dipi-divi-pixel'),
            ),
            'toggle_slug' => 'posts',
            'description' => esc_html__('Whether or not to show the Post Excerpt in the lightbox.', 'dipi-divi-pixel'),
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'show_if' => [
                'show_lightbox' => 'on',
            ],
        ];
        $fields['use_thumbnails'] = [
            'label' => esc_html__('Use Responsive Thumbnails', 'dipi-divi-pixel'),
            'description' => esc_html__('Whether or not to use custom sized thumbnails on different devices. If this option is disabled, the full size image will be used as thumbnail.', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'toggle_slug' => 'posts',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'dipi-divi-pixel'),
                'on' => esc_html__('On', 'dipi-divi-pixel'),
            ),
        ];

        $fields['image_size_desktop'] = [
            'label' => esc_html__('Image Size (Desktop)', 'dipi-divi-pixel'),
            'type' => 'select',
            'option_category' => 'basic_option',
            'default' => 'full',
            'options' => $this->dipi_get_image_sizes(),
            'toggle_slug' => 'posts',
            'description' => 'Here you can choose the image size to use. If you are using very large images, consider using a thumbnail size to speed up page loading time.',
            'show_if' => [
                'use_thumbnails' => 'on',
            ],
        ];

        $fields['image_size_tablet'] = [
            'label' => esc_html__('Image Size (Tablet)', 'dipi-divi-pixel'),
            'type' => 'select',
            'option_category' => 'basic_option',
            'default' => 'full',
            'options' => $this->dipi_get_image_sizes(),
            'toggle_slug' => 'posts',
            'description' => 'Here you can choose the image size to use. If you are using very large images, consider using a thumbnail size to speed up page loading time.',
            'show_if' => [
                'use_thumbnails' => 'on',
            ],
        ];

        $fields['image_size_phone'] = [
            'label' => esc_html__('Image Size (Phone)', 'dipi-divi-pixel'),
            'type' => 'select',
            'option_category' => 'basic_option',
            'default' => 'full',
            'options' => $this->dipi_get_image_sizes(),
            'toggle_slug' => 'posts',
            'description' => 'Here you can choose the image size to use. If you are using very large images, consider using a thumbnail size to speed up page loading time.',
            'show_if' => [
                'use_thumbnails' => 'on',
            ],
        ];
        $fields["use_overlay"] = [
            'label' => esc_html__('Use Image Overlay', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'toggle_slug' => 'overlay',
            'options' => array(
                'off' => esc_html__('Off', 'dipi-divi-pixel'),
                'on' => esc_html__('On', 'dipi-divi-pixel'),
            ),
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'mobile_options' => true,
        ];
        $fields["show_lightbox_link_icon"] = [
            'label' => esc_html__('Show Lightbox and Link Icon', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'default' => 'on',
            'options' => array(
                'off' => esc_html__('No', 'dipi-divi-pixel'),
                'on' => esc_html__('Yes', 'dipi-divi-pixel'),
            ),
            'toggle_slug' => 'overlay',
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'mobile_options' => false,
            'show_if' => [
                'use_post_link' => 'on',
                'use_overlay' => 'on',
            ],
        ];
        $fields["overlay_align_horizontal"] = [
            'label' => esc_html__('Horizontal Align', 'dipi-divi-pixel'),
            'type' => 'select',
            'option_category' => 'basic_option',
            'default' => 'center',
            'options' => array(
                'flex-start' => esc_html__('Left', 'dipi-divi-pixel'),
                'center' => esc_html__('Center', 'dipi-divi-pixel'),
                'flex-end' => esc_html__('Right', 'dipi-divi-pixel'),
            ),
            'toggle_slug' => 'overlay',
            'show_if' => [
                'use_overlay' => 'on',
            ],
        ];

        $fields["overlay_align_vertical"] = [
            'label' => esc_html__('Vertical Align', 'dipi-divi-pixel'),
            'type' => 'select',
            'option_category' => 'basic_option',
            'default' => 'center',
            'options' => array(
                'flex-start' => esc_html__('Top', 'dipi-divi-pixel'),
                'center' => esc_html__('Center', 'dipi-divi-pixel'),
                'flex-end' => esc_html__('Bottom', 'dipi-divi-pixel'),
            ),
            'toggle_slug' => 'overlay',
            'show_if' => [
                'use_overlay' => 'on',
            ],
        ];
        $fields["icon_in_overlay"] = [
            'label' => esc_html__('Show Icon in Overlay', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'dipi-divi-pixel'),
                'on' => esc_html__('On', 'dipi-divi-pixel'),
            ),
            'toggle_slug' => 'overlay',
            'description' => esc_html__('Whether or not to show the Icon in the Overlay.', 'dipi-divi-pixel'),
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'show_if' => [
                'use_overlay' => 'on',
            ],
        ];

        $fields['hover_icon'] = array(
            'label' => esc_html__('Overlay Icon', 'dipi-divi-pixel'),
            'type' => 'select_icon',
            'option_category' => 'configuration',
            'class' => array('et-pb-font-icon'),
            'option_category' => 'configuration',
            'default' => '',
            'toggle_slug' => 'overlay',
            'show_if' => [
                'use_overlay' => 'on',
                'icon_in_overlay' => 'on',
            ],
            'computed_affects' => array(
                '__filterable_grid',
            ),
        );

        $fields["title_in_overlay"] = [
            'label' => esc_html__('Show Post Title in Overlay', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'dipi-divi-pixel'),
                'on' => esc_html__('On', 'dipi-divi-pixel'),
            ),
            'toggle_slug' => 'overlay',
            'description' => esc_html__('Whether or not to show the Post Title in the Overlay. The title is automatically loaded from the media library.', 'dipi-divi-pixel'),
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'show_if' => [
                'use_overlay' => 'on',
            ],
        ];

        $fields["excerpt_in_overlay"] = [
            'label' => esc_html__('Show Post Excerpt in Overlay', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'dipi-divi-pixel'),
                'on' => esc_html__('On', 'dipi-divi-pixel'),
            ),
            'toggle_slug' => 'overlay',
            'description' => esc_html__('Whether or not to show the Post Excerpt in the lightbox. The excerpt is automatically loaded from the media library.', 'dipi-divi-pixel'),
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'show_if' => [
                'use_overlay' => 'on',
            ],
        ];
        $fields['enable_html_in_overlay'] = array(
            'label'   => esc_html__( 'Enable Raw HTML on Overlay', 'et_builder' ),
            'type'    => 'yes_no_button',
            'option_category' => 'configuration',
            'toggle_slug' => 'overlay',
            'options' => array(
                'on'  => et_builder_i18n( 'Yes' ),
                'off' => et_builder_i18n( 'No' ),
            ),
            'default' => 'off',
            'show_if' => [
                'excerpt_in_overlay' => 'on'
            ],
            'computed_affects' => array(
                '__filterable_grid',
            ),
        );
        $fields['enable_shortcode_in_overlay'] = array(
            'label'   => esc_html__( 'Enable to Render shortcode on Overlay', 'et_builder' ),
            'type'    => 'yes_no_button',
            'option_category' => 'configuration',
            'toggle_slug' => 'overlay',
            'options' => array(
                'on'  => et_builder_i18n( 'Yes' ),
                'off' => et_builder_i18n( 'No' ),
            ),
            'default' => 'off',
            'show_if' => [
                'enable_html_in_overlay' => 'on',
                'excerpt_in_overlay' => 'on'
            ],
            'computed_affects' => array(
                '__filterable_grid',
            ),
        );
        $fields['excerpt_length_in_overlay'] = [
            'label' => esc_html__('Excerpt Length in Overlay', 'dipi-divi-pixel'),
            'type' => 'text',
            'default' => '170',
            'toggle_slug' => 'overlay',
            'show_if' => [
                'excerpt_in_overlay' => 'on'
            ],
            'computed_affects' => ['__filterable_grid'],
        ];
        $fields["icon_animation"] = [
            'label' => esc_html__('Icon Animation', 'dipi-divi-pixel'),
            'type' => 'select',
            'default' => 'fadeInUp',
            'options' => [
                'fadeIn' => esc_html__('Fade In', 'dipi-divi-pixel'),
                'fadeInLeft' => esc_html__('Fade In Left', 'dipi-divi-pixel'),
                'fadeInRight' => esc_html__('Fade In Right', 'dipi-divi-pixel'),
                'fadeInUp' => esc_html__('Fade In Up', 'dipi-divi-pixel'),
                'fadeInDown' => esc_html__('Fade In Down', 'dipi-divi-pixel'),
                'zoomIn' => esc_html__('Grow', 'dipi-divi-pixel'),
                'bounceIn' => esc_html__('Bounce In', 'dipi-divi-pixel'),
                'bounceInLeft' => esc_html__('Bounce In Left', 'dipi-divi-pixel'),
                'bounceInRight' => esc_html__('Bounce In Right', 'dipi-divi-pixel'),
                'bounceInUp' => esc_html__('Boune In Up', 'dipi-divi-pixel'),
                'bounceInDown' => esc_html__('BouneIn Down', 'dipi-divi-pixel'),
                'flipInX' => esc_html__('FlipInX', 'dipi-divi-pixel'),
                'flipInY' => esc_html__('FlipInY', 'dipi-divi-pixel'),
                'jackInTheBox' => esc_html__('JackInThe Box', 'dipi-divi-pixel'),
                'rotateIn' => esc_html__('RotateIn', 'dipi-divi-pixel'),
                'rotateInDownLeft' => esc_html__('RotateInDownLeft', 'dipi-divi-pixel'),
                'rotateInUpLeft' => esc_html__('RotateInUpLeft', 'dipi-divi-pixel'),
                'rotateInDownRight' => esc_html__('RotateInDownRight', 'dipi-divi-pixel'),
                'rotateInUpRight' => esc_html__('RotateInUpRight', 'dipi-divi-pixel'),
            ],
            'sub_toggle' => 'title',
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'show_if' => [
                'use_overlay' => 'on',
            ],
            'toggle_slug' => 'overlay_animation',
            'sub_toggle' => 'icon',
        ];
        $fields["title_animation"] = [
            'label' => esc_html__('Title Animation', 'dipi-divi-pixel'),
            'type' => 'select',
            'default' => 'fadeInUp',
            'options' => [
                'fadeIn' => esc_html__('Fade In', 'dipi-divi-pixel'),
                'fadeInLeft' => esc_html__('Fade In Left', 'dipi-divi-pixel'),
                'fadeInRight' => esc_html__('Fade In Right', 'dipi-divi-pixel'),
                'fadeInUp' => esc_html__('Fade In Up', 'dipi-divi-pixel'),
                'fadeInDown' => esc_html__('Fade In Down', 'dipi-divi-pixel'),
                'zoomIn' => esc_html__('Grow', 'dipi-divi-pixel'),
                'bounceIn' => esc_html__('Bounce In', 'dipi-divi-pixel'),
                'bounceInLeft' => esc_html__('Bounce In Left', 'dipi-divi-pixel'),
                'bounceInRight' => esc_html__('Bounce In Right', 'dipi-divi-pixel'),
                'bounceInUp' => esc_html__('Boune In Up', 'dipi-divi-pixel'),
                'bounceInDown' => esc_html__('BouneIn Down', 'dipi-divi-pixel'),
                'flipInX' => esc_html__('FlipInX', 'dipi-divi-pixel'),
                'flipInY' => esc_html__('FlipInY', 'dipi-divi-pixel'),
                'jackInTheBox' => esc_html__('JackInThe Box', 'dipi-divi-pixel'),
                'rotateIn' => esc_html__('RotateIn', 'dipi-divi-pixel'),
                'rotateInDownLeft' => esc_html__('RotateInDownLeft', 'dipi-divi-pixel'),
                'rotateInUpLeft' => esc_html__('RotateInUpLeft', 'dipi-divi-pixel'),
                'rotateInDownRight' => esc_html__('RotateInDownRight', 'dipi-divi-pixel'),
                'rotateInUpRight' => esc_html__('RotateInUpRight', 'dipi-divi-pixel'),
            ],
            'sub_toggle' => 'title',
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'show_if' => [
                'use_overlay' => 'on',
            ],
            'toggle_slug' => 'overlay_animation',
            'sub_toggle' => 'title',
        ];
        $fields['icon_delay'] = [
            'label' => esc_html__('Interval Delay', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'default' => '100ms',
            'default_on_front' => '0ms',
            'default_unit' => 'ms',
            'range_settings' => [
                'min' => '0',
                'max' => '3000',
                'step' => '100',
            ],
            'validate_unit' => true,
            'toggle_slug' => 'overlay_animation',
            'sub_toggle' => 'icon',
            'show_if' => [
                'use_overlay' => 'on',
            ],
        ];

        $fields['icon_speed'] = [
            'label' => esc_html__('Speed', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'default' => '600ms',
            'default_on_front' => '600ms',
            'default_unit' => 'ms',
            'range_settings' => [
                'min' => '0',
                'max' => '2000',
                'step' => '100',
            ],
            'validate_unit' => true,
            'toggle_slug' => 'overlay_animation',
            'sub_toggle' => 'icon',
            'show_if' => [
                'use_overlay' => 'on',
            ],
        ];
        $fields['title_delay'] = [
            'label' => esc_html__('Interval Delay', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'default' => '100ms',
            'default_on_front' => '100ms',
            'default_unit' => 'ms',
            'range_settings' => [
                'min' => '0',
                'max' => '3000',
                'step' => '100',
            ],
            'validate_unit' => true,
            'toggle_slug' => 'overlay_animation',
            'sub_toggle' => 'title',
            'show_if' => [
                'use_overlay' => 'on',
            ],
        ];

        $fields['title_speed'] = [
            'label' => esc_html__('Speed', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'default' => '600ms',
            'default_on_front' => '600ms',
            'default_unit' => 'ms',
            'range_settings' => [
                'min' => '0',
                'max' => '2000',
                'step' => '100',
            ],
            'validate_unit' => true,
            'toggle_slug' => 'overlay_animation',
            'sub_toggle' => 'title',
            'show_if' => [
                'use_overlay' => 'on',
            ],
        ];
        $fields["excerpt_animation"] = [
            'label' => esc_html__('Excerpt Animation', 'dipi-divi-pixel'),
            'type' => 'select',
            'default' => 'fadeInUp',
            'options' => [
                'fadeIn' => esc_html__('Fade In', 'dipi-divi-pixel'),
                'fadeInLeft' => esc_html__('Fade In Left', 'dipi-divi-pixel'),
                'fadeInRight' => esc_html__('Fade In Right', 'dipi-divi-pixel'),
                'fadeInUp' => esc_html__('Fade In Up', 'dipi-divi-pixel'),
                'fadeInDown' => esc_html__('Fade In Down', 'dipi-divi-pixel'),
                'zoomIn' => esc_html__('Grow', 'dipi-divi-pixel'),
                'bounceIn' => esc_html__('Bounce In', 'dipi-divi-pixel'),
                'bounceInLeft' => esc_html__('Bounce In Left', 'dipi-divi-pixel'),
                'bounceInRight' => esc_html__('Bounce In Right', 'dipi-divi-pixel'),
                'bounceInUp' => esc_html__('Boune In Up', 'dipi-divi-pixel'),
                'bounceInDown' => esc_html__('BouneIn Down', 'dipi-divi-pixel'),
                'flipInX' => esc_html__('FlipInX', 'dipi-divi-pixel'),
                'flipInY' => esc_html__('FlipInY', 'dipi-divi-pixel'),
                'jackInTheBox' => esc_html__('JackInThe Box', 'dipi-divi-pixel'),
                'rotateIn' => esc_html__('RotateIn', 'dipi-divi-pixel'),
                'rotateInDownLeft' => esc_html__('RotateInDownLeft', 'dipi-divi-pixel'),
                'rotateInUpLeft' => esc_html__('RotateInUpLeft', 'dipi-divi-pixel'),
                'rotateInDownRight' => esc_html__('RotateInDownRight', 'dipi-divi-pixel'),
                'rotateInUpRight' => esc_html__('RotateInUpRight', 'dipi-divi-pixel'),
            ],
            'toggle_slug' => 'overlay_animation',
            'sub_toggle' => 'excerpt',
            'computed_affects' => array(
                '__filterable_grid',
            ),
            'show_if' => [
                'use_overlay' => 'on',
            ],
        ];
        $fields['excerpt_delay'] = [
            'label' => esc_html__('Interval Delay', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'default' => '400ms',
            'default_on_front' => '400ms',
            'default_unit' => 'ms',
            'range_settings' => [
                'min' => '0',
                'max' => '3000',
                'step' => '100',
            ],
            'validate_unit' => true,
            'toggle_slug' => 'overlay_animation',
            'sub_toggle' => 'excerpt',
            'show_if' => [
                'use_overlay' => 'on',
            ],
        ];

        $fields['excerpt_speed'] = [
            'label' => esc_html__('Speed', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'default' => '600ms',
            'default_on_front' => '600ms',
            'default_unit' => 'ms',
            'range_settings' => [
                'min' => '0',
                'max' => '2000',
                'step' => '100',
            ],
            'validate_unit' => true,
            'toggle_slug' => 'overlay_animation',
            'sub_toggle' => 'excerpt',
            'show_if' => [
                'use_overlay' => 'on',
            ],
        ];
       

        $fields["show_overflow"] = [
            'label' => esc_html__('Show Overflow', 'dipi-divi-pixel'),
            'description' => esc_html__('Hide or show the overflow of the module. Useful if you want to use box shadows on the images but be aware that too much gutter can cause weird effects on mobiles due to the extra margin of the module. In this case, you should set the overflow of the row or section to hidden.', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'layout',
            'toggle_slug' => 'grid',
            'tab_slug' => 'advanced',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'dipi-divi-pixel'),
                'on' => esc_html__('On', 'dipi-divi-pixel'),
            ),
        ];

        $fields["overlay_bg_color"] = [
            'label' => esc_html__('Overlay Color', 'dipi-divi-pixel'),
            'type' => 'background-field',
            'base_name' => "overlay_bg",
            'context' => "overlay_bg",
            'custom_color' => true,
            'default' => 'rgba(21,2,42,0.3)',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'overlay',
            'hover' => 'tabs',
            'mobile_options' => true,
            'responsive' => true,
            'background_fields' => array_merge(

                ET_Builder_Element::generate_background_options(
                    'overlay_bg',
                    'gradient',
                    "advanced",
                    "overlay",
                    "overlay_bg_gradient"
                ),

                ET_Builder_Element::generate_background_options(
                    "overlay_bg",
                    "color",
                    "advanced",
                    "overlay",
                    "overlay_bg_color"
                )
            ),
            'show_if' => [
                'use_overlay' => 'on',
            ],
        ];

        $fields['overlay_icon_color'] = [
            'label' => esc_html__(' Overlay Icon Color', 'dipi-divi-pixel'),
            'type' => 'color-alpha',
            'custom_color' => true,
            'tab_slug' => 'advanced',
            'hover' => 'tabs',
            'default' => '#ffffff',
            'show_if' => [
                'use_overlay' => 'on',
            ],
            'toggle_slug' => 'overlay',
            'description' => esc_html__('Color of the overlay icon. The overlay icon is centered horizontally and vertically over the image.', 'dipi-divi-pixel'),
        ];
        $fields['overlay_icon_use_circle'] = [
            'label' => esc_html__('Circle Icon', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'configuration',
            'options' => [
                'off' => esc_html__('No', 'dipi-divi-pixel'),
                'on' => esc_html__('Yes', 'dipi-divi-pixel'),
            ],
            'tab_slug' => 'advanced',
            'toggle_slug' => 'overlay',
            'description' => esc_html__('Here you can choose whether icon set above should display within a circle.', 'dipi-divi-pixel'),
            'default' => 'on',
            'show_if' => [
                'use_overlay' => 'on',
            ],
            'computed_affects' => array(
                '__filterable_grid',
            ),
        ];
        $fields['overlay_icon_circle_color'] = [
            'label' => esc_html__('Circle Color', 'dipi-divi-pixel'),
            'type' => 'color-alpha',
            'description' => esc_html__('Here you can define a custom color for the icon circle.', 'dipi-divi-pixel'),
            'show_if' => [
                'use_overlay' => 'on',
                'overlay_icon_use_circle' => 'on',
            ],
            'tab_slug' => 'advanced',
            'toggle_slug' => 'overlay',
            'hover' => 'tabs',
            'sticky' => true,
            'default' => 'rgba(255,255,255,0.22)',
        ];
        $fields['overlay_icon_circle_padding'] = [
            'label' => __('Circle Icon Padding', 'et_builder'),
            'type' => 'custom_margin',
            'description' => __('Set Padding of Overlay Icon.', 'et_builder'),
            'tab_slug' => 'advanced',
            'toggle_slug' => 'overlay',
            'default' => '20px|20px|20px|20px',
            'mobile_options' => true,
        ];
        $fields['overlay_icon_use_circle_border'] = [
            'label' => esc_html__('Show Circle Border', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'layout',
            'options' => [
                'off' => esc_html__('No', 'dipi-divi-pixel'),
                'on' => esc_html__('Yes', 'dipi-divi-pixel'),
            ],
            'description' => esc_html__('Here you can choose whether if the icon circle border should display.', 'dipi-divi-pixel'),
            'show_if' => [
                'use_overlay' => 'on',
                'overlay_icon_use_circle' => 'on',
            ],
            'tab_slug' => 'advanced',
            'toggle_slug' => 'overlay',
            'default_on_front' => 'off',
            'computed_affects' => array(
                '__filterable_grid',
            ),
        ];
        $fields['overlay_icon_circle_border_color'] = [
            'default' => $et_accent_color,
            'label' => esc_html__('Circle Border Color', 'dipi-divi-pixel'),
            'type' => 'color-alpha',
            'description' => esc_html__('Here you can define a custom color for the icon circle border.', 'dipi-divi-pixel'),
            'show_if' => array(
                'use_overlay' => 'on',
                'overlay_icon_use_circle_border' => 'on',
            ),
            'tab_slug' => 'advanced',
            'toggle_slug' => 'overlay',
            'hover' => 'tabs',
            'sticky' => true,
            'default' => '#000',
        ];
        $fields['overlay_icon_use_icon_font_size'] = [
            'label' => esc_html__('Use Icon Font Size', 'dipi-divi-pixel'),
            'description' => esc_html__('If you would like to control the size of the icon, you must first enable this option.', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'font_option',
            'options' => [
                'off' => esc_html__('No', 'dipi-divi-pixel'),
                'on' => esc_html__('Yes', 'dipi-divi-pixel'),
            ],
            'show_if' => [
                'use_overlay' => 'on',
            ],
            'tab_slug' => 'advanced',
            'toggle_slug' => 'overlay',
            'default_on_front' => 'off',
        ];
        $fields['overlay_icon_font_size'] = [
            'label' => esc_html__('Icon Font Size', 'dipi-divi-pixel'),
            'description' => esc_html__('Control the size of the icon by increasing or decreasing the font size.', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'font_option',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'overlay',
            'default' => '18px',
            'default_unit' => 'px',
            'default_on_front' => '',
            'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
            'range_settings' => array(
                'min' => '1',
                'max' => '120',
                'step' => '1',
            ),
            'show_if' => [
                'use_overlay' => 'on',
                'overlay_icon_use_icon_font_size' => 'on',
            ],
            'mobile_options' => true,
            'hover' => 'tabs',
            'sticky' => true,
        ];
        
        $fields["sticky_filter_bar"] = [
            'label' => esc_html__('Sticky Filter bar', 'dipi-divi-pixel'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('No', 'dipi-divi-pixel'),
                'on' => esc_html__('Yes', 'dipi-divi-pixel'),
            ),
            'mobile_options' => true,
            'tab_slug' => 'advanced',
            'toggle_slug'      => 'filter_bar',
        ];
        $fields['sticky_filter_bar_top'] = [
            'label' => esc_html__('Sticky Top Offset', 'dipi-divi-pixel'),
            'type' => 'range',
            'default' => '80px',
            'default_on_front' => '80px',
            'default_unit' => 'px',
            'range_settings' => [
                'min' => '0',
                'max' => '300',
                'step' => '10',
            ],
            'validate_unit' => true,
            'responsive' => true,
            'mobile_options' => true,
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar',
            'show_if'   => ['sticky_filter_bar' => 'on']
        ];
        $fields['space_tabs'] = [
            'label' => esc_html__('Space between Tabs', 'dipi-divi-pixel'),
            'type' => 'range',
            'default' => '20px',
            'default_on_front' => '20px',
            'default_unit' => 'px',
            'range_settings' => [
                'min' => '0',
                'max' => '300',
                'step' => '10',
            ],
            'validate_unit' => true,
            'responsive' => true,
            'mobile_options' => true,
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar',
        ];
        $fields["filter_bar_max_width"] = [
            'label' => esc_html__('Filter Bar Max Width', 'dipi-divi-pixel'),
            'type' => 'range',
            'default' => '100%',
            'default_unit' => '%',
            'default_on_front' => '100%',
            'allowed_units' => ['%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'],
            'range_settings' => [
                'min' => '1',
                'max' => '100',
                'step' => '1',
            ],
            'mobile_options' => true,
            'responsive' => true,
            'validate_unit' => true,
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar',
        ];

        $fields['space_tab_number'] = [
            'label' => esc_html__('Space between Label and Number', 'dipi-divi-pixel'),
            'type' => 'range',
            'default' => '0.5em',
            'default_on_front' => '0.5em',
            'default_unit' => 'em',
            'range_settings' => [
                'min' => '0',
                'max' => '5',
                'step' => '0.1',
            ],
            'validate_unit' => true,
            'responsive' => true,
            'mobile_options' => true,
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar',
            'show_if'   => array (
                'show_num_of_elements' => 'on'
            )
        ];
        $fields['pagination_btn_margin'] = [
            'label' => __('Margin', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'pagination_btn',
            'sub_toggle' => 'normal',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];
        $fields['pagination_btn_padding'] = [
            'label' => __('Padding', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'pagination_btn',
            'sub_toggle' => 'normal',
            'default' => '5px|12px|5px|12px',
            'mobile_options' => true,
        ];
        $fields['pagination_active_btn_margin'] = [
            'label' => __('Margin', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'pagination_btn',
            'sub_toggle' => 'active',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];
        $fields['pagination_active_btn_padding'] = [
            'label' => __('Padding', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'pagination_btn',
            'sub_toggle' => 'active',
            'default' => '5px|12px|5px|12px',
            'mobile_options' => true,
        ];
        $fields['load_more_margin'] = [
            'label' => __('Margin', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'load_more',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];
        $fields['load_more_padding'] = [
            'label' => __('Padding', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'load_more',
            'default' => '5px|12px|5px|12px',
            'mobile_options' => true,
        ];
        $fields['pagination_btn_bg_color'] = [
            'label'          => esc_html__( 'Background Color', 'dipi-divi-pixel' ),
            'type'           => 'color-alpha',
            'default'        => 'transparent',
            'tab_slug'       => 'advanced',
            'hover'          => 'tabs',
            'mobile_options' => true,
            'sticky'         => true,
            'toggle_slug' => 'pagination_btn',
            'sub_toggle' => 'normal',
        ];
        $fields['pagination_active_btn_bg_color'] = [
            'label'          => esc_html__( 'Background Color', 'dipi-divi-pixel' ),
            'type'           => 'color-alpha',
            'default'        => '#ff4200',
            'tab_slug'       => 'advanced',
            'hover'          => 'tabs',
            'mobile_options' => true,
            'sticky'         => true,
            'toggle_slug' => 'pagination_btn',
            'sub_toggle' => 'active',
        ];
        $fields['load_more_bg_color'] = [
            'label'          => esc_html__( 'Background Color', 'dipi-divi-pixel' ),
            'type'           => 'color-alpha',
            'default'        => 'transparent',
            'tab_slug'       => 'advanced',
            'hover'          => 'tabs',
            'mobile_options' => true,
            'sticky'         => true,
            'toggle_slug' => 'load_more',
            'sub_toggle' => 'active',
        ];
        $fields['filter_bar_margin'] = [
            'label' => __('Margin', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];
        $fields['filter_bar_padding'] = [
            'label' => __('Padding', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];
        $fields['filter_bar_background_color'] = [
            'label'          => esc_html__( 'Background Color', 'dipi-divi-pixel' ),
            'type'           => 'color-alpha',
            'default'        => 'transparent',
            'tab_slug'       => 'advanced',
            'hover'          => 'tabs',
            'mobile_options' => true,
            'sticky'         => true,
            'toggle_slug'  => 'filter_bar',
        ];

        $fields['overlay_padding'] = [
            'label' => __('Overlay Padding', 'et_builder'),
            'type' => 'custom_margin',
            'description' => __('Set Padding of Overlay.', 'et_builder'),
            'tab_slug' => 'advanced',
            'toggle_slug' => 'margin_padding',
            'default' => '30px|30px|30px|30px',
            'mobile_options' => true,
        ];
        $fields = array_merge(
            $fields,
            $this->generate_background_options(
                "overlay_bg",
                'skip',
                "advanced",
                "image",
                "overlay_bg_gradient"
            )
        );
        $fields = array_merge(
            $fields,
            $this->generate_background_options(
                "overlay_bg",
                'skip',
                "advanced",
                "image",
                "overlay_bg_color"
            )
        );
       
        $fields['filter_bar_item_padding'] = [
            'label' => __('Padding', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar_items',
            'sub_toggle' => 'normal',
            'default' => '5px|10px|5px|10px',
            'mobile_options' => true,
        ];
        $fields['filter_bar_item_padding_active'] = [
            'label' => __('Padding', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar_items',
            'sub_toggle' => 'active',
            'default' => '5px|15px|5px|15px',
            'mobile_options' => true,
        ];

        $fields['filter_bar_item_background_color'] = [
            'label'          => esc_html__( 'Background Color', 'dipi-divi-pixel' ),
            'type'           => 'color-alpha',
            'default'        => 'transparent',
            'hover'          => 'tabs',
            'mobile_options' => true,
            'sticky'         => true,
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar_items',
            'sub_toggle' => 'normal',
        ];
        $fields['filter_bar_item_background_color_active'] = [
            'label'          => esc_html__( 'Background Color', 'dipi-divi-pixel' ),
            'type'           => 'color-alpha',
            'default'        => 'transparent',
            'hover'          => 'tabs',
            'mobile_options' => true,
            'sticky'         => true,
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar_items',
            'sub_toggle' => 'active',
        ];
        $fields['filter_bar_item_width'] = [
            'label' => esc_html__('Width', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
            'range_settings' => [
                'min' => '0',
                'max' => '100',
                'step' => '10',
            ],
            'default_unit' => 'px',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar_items',
            'sub_toggle' => 'normal',
            'mobile_options' => true,
        ];
        $fields['filter_bar_item_width_active'] = [
            'label' => esc_html__('Width', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
            'range_settings' => [
                'min' => '0',
                'max' => '100',
                'step' => '10',
            ],
            'default_unit' => 'px',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar_items',
            'sub_toggle' => 'active',
            'mobile_options' => true,
        ];
        $fields['filter_bar_item_height'] = [
            'label' => esc_html__('Height', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
            'range_settings' => [
                'min' => '0',
                'max' => '100',
                'step' => '10',
            ],
            'default_unit' => 'px',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar_items',
            'sub_toggle' => 'normal',
            'mobile_options' => true
        ];
        $fields['filter_bar_item_height_active'] = [
            'label' => esc_html__('Height', 'dipi-divi-pixel'),
            'type' => 'range',
            'option_category' => 'configuration',
            'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
            'range_settings' => [
                'min' => '0',
                'max' => '100',
                'step' => '10',
            ],
            'default_unit' => 'px',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar_items',
            'sub_toggle' => 'active',
            'mobile_options' => true
        ];
       

        $fields['grid_margin'] = [
            'label' => __('Margin', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];
        $fields['grid_padding'] = [
            'label' => __('Padding', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];
        $fields['grid_background_color'] = [
            'label'          => esc_html__( 'Background Color', 'dipi-divi-pixel' ),
            'type'           => 'color-alpha',
            'default'        => 'transparent',
            'tab_slug'       => 'advanced',
            'hover'          => 'tabs',
            'mobile_options' => true,
            'sticky'         => true,
            'toggle_slug'  => 'grid',
        ];
        
        $fields['grid_item_background_color'] = [
            'label'          => esc_html__( 'Background Color', 'dipi-divi-pixel' ),
            'type'           => 'color-alpha',
            'default'        => 'transparent',
            'tab_slug'       => 'advanced',
            'hover'          => 'tabs',
            'mobile_options' => true,
            'sticky'         => true,
            'toggle_slug'  => 'grid_items',
        ];
        $fields['grid_item_meta_margin'] = [
            'label' => __('Margin', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid_item_meta_text',
            'sub_toggle' => 'all',
            'default' => '10px|10px|10px|10px',
            'mobile_options' => true,
        ];
        $fields['grid_item_meta_padding'] = [
            'label' => __('Padding', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid_item_meta_text',
            'sub_toggle' => 'all',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];
        $fields['grid_item_author_margin'] = [
            'label' => __('Margin', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid_item_meta_text',
            'sub_toggle' => 'author',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];
        $fields['grid_item_author_padding'] = [
            'label' => __('Padding', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid_item_meta_text',
            'sub_toggle' => 'author',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];
        $fields['grid_item_date_margin'] = [
            'label' => __('Margin', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid_item_meta_text',
            'sub_toggle' => 'date',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];
        $fields['grid_item_date_padding'] = [
            'label' => __('Padding', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid_item_meta_text',
            'sub_toggle' => 'date',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];
        $fields['grid_item_category_margin'] = [
            'label' => __('Margin', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid_item_meta_text',
            'sub_toggle' => 'category',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];
        $fields['grid_item_category_padding'] = [
            'label' => __('Padding', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid_item_meta_text',
            'sub_toggle' => 'category',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];    
        $fields['grid_item_title_margin'] = [
            'label' => __('Margin', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid_item_text',
            'sub_toggle' => 'title',
            'default' => '10px|10px|10px|10px',
            'mobile_options' => true,
        ];
        $fields['grid_item_title_padding'] = [
            'label' => __('Padding', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid_item_text',
            'sub_toggle' => 'title',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];
        $fields['grid_item_excerpt_margin'] = [
            'label' => __('Margin', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid_item_text',
            'sub_toggle' => 'excerpt',
            'default' => '10px|10px|10px|10px',
            'mobile_options' => true,
        ];
        $fields['grid_item_excerpt_padding'] = [
            'label' => __('Padding', 'et_builder'),
            'type' => 'custom_margin',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid_item_text',
            'sub_toggle' => 'excerpt',
            'default' => '0px|0px|0px|0px',
            'mobile_options' => true,
        ];
         
        $computed_depends_on = array_merge(
            $computed_depends_on, 
            [   'select_post_type',
                'select_custom_tax',
                'include_term_ids',
                'pagination_type',
                'post_count',
                'posts_per_page',
                'prev_btn_text',
                'next_btn_text',
                'load_more_text',
                'show_all_filter',
                'all_filter_label',
                'show_num_of_elements',
                'hide_description',
                'post_orderby',
                'grid_layout',
                'use_post_link',
                'show_lightbox_link_icon',
                'show_lightbox',
                'title_in_lightbox',
                'excerpt_in_lightbox',
                'icon_in_overlay',
                'title_in_overlay',
                'excerpt_in_overlay',
                'overlay_icon_use_circle',
                'overlay_icon_use_circle_border',
                'hover_icon',
                'use_overlay',
                'icon_animation',
                'title_animation',
                'excerpt_animation',
                'image_animation',
                'grid_animation',
                'grid_animation_delay',
                'grid_animation_speed',
                'show_post_excerpt',
                'excerpt_length',
                'show_post_title',
                'read_more',
                'read_more_text',
                'read_more_icon',
                'read_more_use_icon',
                'show_author',
                'author_prefix',
                'show_author_avatar',
                'show_date',
                'meta_date',
                'show_custom_taxonomy',
                'show_taxonomy_link',
                'grid_item_title_level',
                'header_level',
                'post_status',
                'enable_html_on_grid',
                'enable_shortcode_on_grid',
                'enable_html_in_overlay',
                'enable_shortcode_in_overlay',
                'excerpt_length_in_overlay',
            ]
        );
        $fields["__filterable_grid"] = [
            'type' => 'computed',
            'computed_callback' => array('DIPI_FilterableGrid', 'render_filterable_grid'),
            'computed_depends_on' => $computed_depends_on,
        ];
        return $fields;
    }

    public function get_advanced_fields_config()
    {
        $filter_bar_selector = "%%order_class%% .dipi-filter-bar";
        $filter_bar_item_selector = "%%order_class%% .dipi-filter-bar .dipi-filter-bar-item";
        $filter_bar_item_hover_selector = "%%order_class%% .dipi-filter-bar .dipi-filter-bar-item:hover";
        $filter_bar_item_active_selector = "%%order_class%% .dipi-filter-bar .dipi-filter-bar-item.active";
        $filter_bar_item_active_hover_selector = "%%order_class%% .dipi-filter-bar .dipi-filter-bar-item.active:hover";
        $pagination_btn_normal_selector = "%%order_class%% .dipi-pagination .dipi-pagination-btn";
        $pagination_btn_normal_hover_selector = "%%order_class%% .dipi-pagination .dipi-pagination-btn:hover";
        $pagination_btn_active_selector = "%%order_class%% .dipi-pagination .dipi-pagination-btn.active";
        $pagination_btn_active_hover_selector = "%%order_class%% .dipi-pagination .dipi-pagination-btn.active:hover";
        $load_more_selector = "%%order_class%% .dipi-loadmore-btn";
        $load_more_hover_selector = "%%order_class%% .dipi-loadmore-btn:hover";

        $advanced_fields = [];

        $advanced_fields["text_shadow"] = false;
        $advanced_fields["fonts"]       = [
            'link'     => [
                'label'       => et_builder_i18n( 'Link' ),
                'css'         => array(
                    'main'  => "{$this->main_css_element} a",
                    'color' => "{$this->main_css_element} .grid-item  a",
                ),
                'line_height' => array(
                    'default' => '1em',
                ),
                'font_size'   => array(
                    'default' => absint( et_get_option( 'body_font_size', '14' ) ) . 'px',
                ),
                'toggle_slug' => 'text',
                'sub_toggle'  => 'a',
            ],
            'ul'       => [
                'label'       => esc_html__( 'Unordered List', 'et_builder' ),
                'css'         => array(
                    'main'        => "{$this->main_css_element} ul li",
                    'color'       => "{$this->main_css_element} ul li",
                    'line_height' => "{$this->main_css_element} ul li",
                    'item_indent' => "{$this->main_css_element} ul",
                ),
                'line_height' => array(
                    'default' => '1em',
                ),
                'font_size'   => array(
                    'default' => '14px',
                ),
                'toggle_slug' => 'text',
                'sub_toggle'  => 'ul',
            ],
            'ol'       => [
                'label'       => esc_html__( 'Ordered List', 'et_builder' ),
                'css'         => array(
                    'main'        => "{$this->main_css_element} ol li",
                    'color'       => "{$this->main_css_element} ol li",
                    'line_height' => "{$this->main_css_element} ol li",
                    'item_indent' => "{$this->main_css_element} ol",
                ),
                'line_height' => array(
                    'default' => '1em',
                ),
                'font_size'   => array(
                    'default' => '14px',
                ),
                'toggle_slug' => 'text',
                'sub_toggle'  => 'ol',
            ],
            'quote'    => [
                'label'       => esc_html__( 'Blockquote', 'et_builder' ),
                'css'         => array(
                    'main'  => "{$this->main_css_element} blockquote",
                    'color' => "{$this->main_css_element} blockquote",
                ),
                'line_height' => array(
                    'default' => '1em',
                ),
                'font_size'   => array(
                    'default' => '14px',
                ),
                'toggle_slug' => 'text',
                'sub_toggle'  => 'quote',
            ],
            'header_1'   => [
                'label'       => esc_html__( 'Heading', 'et_builder' ),
                'css'         => array(
                    'main' => "{$this->main_css_element} h1",
                ),
                'font_size'   => array(
                    'default' => absint( et_get_option( 'body_header_size', '30' ) ) . 'px',
                ),
                'toggle_slug' => 'header',
                'sub_toggle'  => 'h1',
            ],
            'header_2' => [
                'label'       => esc_html__( 'Heading 2', 'et_builder' ),
                'css'         => array(
                    'main' => "{$this->main_css_element} h2",
                ),
                'font_size'   => array(
                    'default' => '26px',
                ),
                'line_height' => array(
                    'default' => '1em',
                ),
                'toggle_slug' => 'header',
                'sub_toggle'  => 'h2',
            ],
            'header_3' => [
                'label'       => esc_html__( 'Heading 3', 'et_builder' ),
                'css'         => array(
                    'main' => "{$this->main_css_element} h3",
                ),
                'font_size'   => array(
                    'default' => '22px',
                ),
                'line_height' => array(
                    'default' => '1em',
                ),
                'toggle_slug' => 'header',
                'sub_toggle'  => 'h3',
            ],
            'header_4' => [
                'label'       => esc_html__( 'Heading 4', 'et_builder' ),
                'css'         => array(
                    'main' => "{$this->main_css_element} h4",
                ),
                'font_size'   => array(
                    'default' => '18px',
                ),
                'line_height' => array(
                    'default' => '1em',
                ),
                'toggle_slug' => 'header',
                'sub_toggle'  => 'h4',
            ],
            'header_5' => [
                'label'       => esc_html__( 'Heading 5', 'et_builder' ),
                'css'         => array(
                    'main' => "{$this->main_css_element} h5",
                ),
                'font_size'   => array(
                    'default' => '16px',
                ),
                'line_height' => array(
                    'default' => '1em',
                ),
                'toggle_slug' => 'header',
                'sub_toggle'  => 'h5',
            ],
            'header_6' => [
                'label'       => esc_html__( 'Heading 6', 'et_builder' ),
                'css'         => array(
                    'main' => "{$this->main_css_element} h6",
                ),
                'font_size'   => array(
                    'default' => '14px',
                ),
                'line_height' => array(
                    'default' => '1em',
                ),
                'toggle_slug' => 'header',
                'sub_toggle'  => 'h6',
            ],
        ];
        $advanced_fields["fonts"]["header"] = [
            'label' => esc_html__('Title', 'dipi-divi-pixel'),
            'css' => [
                'main' => "%%order_class%% .dipi-filterable-grid-title",
                'hover' => "%%order_class%% .dipi_filterable_grid_overlay:hover .dipi-filterable-grid-title",
            ],
            'header_level' => [
                'default' => 'h4',
            ],
            'hide_text_align' => true,
            'toggle_slug' => 'overlay_text_group',
            'sub_toggle' => 'title',
            'computed_affects' => array(
                '__filterable_grid',
              ),
        ];
        $advanced_fields["fonts"]["meta"] = [
            'label' => esc_html__('Meta', 'dipi-divi-pixel'),
            'css' => [
                'main' => "%%order_class%% .dipi-post-meta,%%order_class%% .dipi-post-meta-separator",
                'hover' => "%%order_class%% .grid-item:hover .dipi-post-meta, %%order_class%% .grid-item:hover .dipi-post-meta-separator",
            ],
            'hide_text_align' => true,
            'toggle_slug' => 'grid_item_meta_text',
            'sub_toggle' => 'all',
        ];
        $advanced_fields["fonts"]["meta_author"] = [
            'label' => esc_html__('Author', 'dipi-divi-pixel'),
            'css' => [
                'main' => "%%order_class%% .dipi-post-meta .dipi-author-prefix, %%order_class%% .dipi-post-meta .dipi-author a",
                'hover' => "%%order_class%% .grid-item:hover .dipi-post-meta .dipi-author-prefix, %%order_class%% .grid-item:hover .dipi-post-meta .dipi-author a ",
            ],
            'hide_text_align' => true,
            'toggle_slug' => 'grid_item_meta_text',
            'sub_toggle' => 'author',
        ];
        $advanced_fields["fonts"]["meta_date"] = [
            'label' => esc_html__('Date', 'dipi-divi-pixel'),
            'css' => [
                'main' => "%%order_class%% .dipi-post-meta .post-date",
                'hover' => "%%order_class%% .grid-item:hover .dipi-post-meta .post-date",
            ],
            'hide_text_align' => true,
            'toggle_slug' => 'grid_item_meta_text',
            'sub_toggle' => 'date',
        ];
        $advanced_fields["fonts"]["excerpt"] = [
            'label' => esc_html__('Excerpt', 'dipi-divi-pixel'),
            'css' => [
                'main' => "%%order_class%% .dipi-filterable-grid-excerpt",
                'hover' => "%%order_class%% .dipi_filterable_grid_overlay:hover .dipi-filterable-grid-excerpt",
            ],
            'hide_text_align' => true,
            'toggle_slug' => 'overlay_text_group',
            'sub_toggle' => 'excerpt',
        ];
        $advanced_fields["fonts"]["pagination_btn_normal"] = [
            'css' => [
                'main' => $pagination_btn_normal_selector,
                'hover' => $pagination_btn_normal_hover_selector,
            ],
            /*'hide_text_align' => false,*/
            'tab_slug' => 'advanced',
            'toggle_slug' => 'pagination_btn',
            'sub_toggle' => 'normal',
            'show_if' => [
                'pagination_type' => 'numbered_pagination'
            ]
        ];
        $advanced_fields["fonts"]["pagination_btn_active"] = [
            'css' => [
                'main' => $pagination_btn_active_selector,
                'hover' => $pagination_btn_active_hover_selector,
            ],
            'hide_text_align' => true,
            'tab_slug' => 'advanced',
            'toggle_slug' => 'pagination_btn',
            'sub_toggle' => 'active',
            'show_if' => [
                'pagination_type' => 'numbered_pagination'
            ]
        ];
        $advanced_fields["fonts"]["load_more"] = [
            'css' => [
                'main' => $load_more_selector,
                'hover' => $load_more_hover_selector,
            ],
            'hide_text_align' => true,
            'tab_slug' => 'advanced',
            'toggle_slug' => 'load_more',
            'show_if' => [
                'pagination_type' => ['load_more','infinite_scroll']
            ]
        ];
        $advanced_fields["fonts"]["filter_bar_normal"] = [
            'css' => [
                'main' => "%%order_class%% .dipi-filter-bar-item",
                'hover' => "%%order_class%% .dipi-filter-bar-item:hover",
            ],
            /*'hide_text_align' => false,*/
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar_items',
            'sub_toggle' => 'normal',
        ];
        $advanced_fields["fonts"]["filter_bar_active"] = [
            'css' => [
                'main' => "%%order_class%% .dipi-filter-bar-item.active",
                'hover' => "%%order_class%% .dipi-filter-bar-item.active:hover",
            ],
            /*'hide_text_align' => false,*/
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar_items',
            'sub_toggle' => 'active',
        ];
        $advanced_fields["fonts"]["filter_bar_desc"] = [
            'css' => [
                'main' => "%%order_class%% .dipi-filter-bar-item .dipi-filter-bar-item-desc",
                'hover' => "%%order_class%% .dipi-filter-bar-item .dipi-filter-bar-item-desc",
            ],
            /*'hide_text_align' => false,*/
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar_items',
            'sub_toggle' => 'desc',
        ];
        $advanced_fields["fonts"]["grid_item_title"] = [
            'label' => esc_html__('Title', 'dipi-divi-pixel'),
            'css' => [
                'main' => "%%order_class%% .dipi-grid-item-title",
                'hover' => "%%order_class%% .grid-item:hover .dipi-grid-item-title",
            ],
            'header_level' => [
                'default' => 'h4',
            ],
            /*'hide_text_align' => false,*/
            'toggle_slug' => 'grid_item_text',
            'sub_toggle' => 'title',
            'computed_affects' => array(
                '__filterable_grid',
            ),
        ];
        $advanced_fields["fonts"]["grid_item_excerpt"] = [
            'label' => esc_html__('Excerpt', 'dipi-divi-pixel'),
            'css' => [
                'main' => "%%order_class%% .dipi-grid-item-excerpt",
                'hover' => "%%order_class%% .grid-item:hover .dipi-grid-item-excerpt",
            ],
            /*'hide_text_align' => false,*/
            'toggle_slug' => 'grid_item_text',
            'sub_toggle' => 'excerpt',
        ];
        $advanced_fields["fonts"]["grid_item_category"] = [
            'label' => esc_html__('Category', 'dipi-divi-pixel'),
            'css' => [
                'main' => "%%order_class%% .dipi-grid-item-category",
                'hover' => "%%order_class%% .grid-item:hover .dipi-grid-item-category",
            ],
            /*'hide_text_align' => false,*/
            'toggle_slug' => 'grid_item_meta_text',
            'sub_toggle' => 'category',
        ];        
        $advanced_fields["borders"]["default"] = [
            'css' => [
                'main' => [
                    'border_radii' => "%%order_class%%",
                    'border_styles' => "%%order_class%%",
                ],
            ],
        ];
        $advanced_fields["borders"]["pagination_btn_normal"] = [
            'css' => [
                'main' => [
                    'border_radii' => $pagination_btn_normal_selector,
                    'border_styles' => $pagination_btn_normal_selector,
                ],
            ],
            'tab_slug' => 'advanced',
            'toggle_slug' => 'pagination_btn',
            'sub_toggle' => 'normal',
        ];
        $advanced_fields["borders"]["pagination_btn_active"] = [
            'css' => [
                'main' => [
                    'border_radii' => $pagination_btn_active_selector,
                    'border_styles' => $pagination_btn_active_selector,
                ],
            ],
            'tab_slug' => 'advanced',
            'toggle_slug' => 'pagination_btn',
            'sub_toggle' => 'active',
        ];
        $advanced_fields["borders"]["load_more"] = [
            'css' => [
                'main' => [
                    'border_radii' => $load_more_selector,
                    'border_styles' => $load_more_selector,
                ],
            ],
            'tab_slug' => 'advanced',
            'toggle_slug' => 'load_more',
        ];
        $advanced_fields["borders"]["filter_bar"] = [
            'css' => [
                'main' => [
                    'border_radii' => "%%order_class%% .dipi-filter-bar",
                    'border_styles' => "%%order_class%% .dipi-filter-bar",
                ],
            ],
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar',
        ];
        $advanced_fields["borders"]["filter_bar_item"] = [
            'css' => [
                'main' => [
                    'border_radii' => "%%order_class%% .dipi-filter-bar-item",
                    'border_styles' => "%%order_class%% .dipi-filter-bar-item",
                ],
            ],
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar_items',
            'sub_toggle' => 'normal',
        ];

        $advanced_fields["borders"]["filter_bar_item_active"] = [
            'css' => [
                'main' => [
                    'border_radii' => "%%order_class%% .dipi-filter-bar-item.active",
                    'border_styles' => "%%order_class%% .dipi-filter-bar-item.active",
                ],
            ],
            'tab_slug' => 'advanced',
            'toggle_slug' => 'filter_bar_items',
            'sub_toggle' => 'active',
        ];
        $advanced_fields["borders"]["grid"] = [
            'css' => [
                'main' => [
                    'border_radii' => "%%order_class%% .dipi-filtered-posts-container",
                    'border_styles' => "%%order_class%% .dipi-filtered-posts-container",
                ],
            ],
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid',
        ];
        $advanced_fields["borders"]["grid_item"] = [
            'label_prefix' => esc_html__('Grid Item', 'dipi-divi-pixel'),
            'toggle_slug' => 'grid_items',
            'tab_slug' => 'advanced',
            'css' => [
                'main' => [
                    'border_radii' => "%%order_class%% .grid .grid-item",
                    'border_styles' => "%%order_class%% .grid .grid-item",
                ],
            ],
        ];
        $advanced_fields["box_shadow"]["pagination_normal"] = [
            'label' => esc_html__('Box Shadow', 'dipi-divi-pixel'),
            'toggle_slug' => 'pagination_btn',
            'sub_toggle' => 'normal',
            'tab_slug' => 'advanced',
            'css' => [
                'main' => $pagination_btn_normal_selector,
                'hover' => $pagination_btn_normal_hover_selector,
            ],
        ];
        $advanced_fields["box_shadow"]["pagination_btn_active"] = [
            'label' => esc_html__('Box Shadow', 'dipi-divi-pixel'),
            'toggle_slug' => 'pagination_btn',
            'sub_toggle' => 'active',
            'tab_slug' => 'advanced',
            'css' => [
                'main' => $pagination_btn_active_selector,
                'hover' => $pagination_btn_active_hover_selector,
            ],
        ];
        $advanced_fields["box_shadow"]["load_more"] = [
            'label' => esc_html__('Box Shadow', 'dipi-divi-pixel'),
            'toggle_slug' => 'load_more',
            'tab_slug' => 'advanced',
            'css' => [
                'main' => $load_more_selector,
                'hover' => $load_more_hover_selector,
            ],
        ];
        $advanced_fields["box_shadow"]["filter_bar"] = [
            'label' => esc_html__('Filter Bar Box Shadow', 'dipi-divi-pixel'),
            'toggle_slug' => 'filter_bar',
            'tab_slug' => 'advanced',
            'css' => [
                'main' => $filter_bar_selector,
            ],
        ];
        $advanced_fields["box_shadow"]["filter_bar_item"] = [
            'label' => esc_html__('Filter Bar Item Box Shadow', 'dipi-divi-pixel'),
            'toggle_slug' => 'filter_bar_items',
            'sub_toggle' => 'normal',
            'tab_slug' => 'advanced',
            'css' => [
                'main' => $filter_bar_item_selector,
                'hover' => $filter_bar_item_hover_selector
            ],
        ];
        $advanced_fields["box_shadow"]["filter_bar_item_active"] = [
            'label' => esc_html__('Filter Bar Item Box Shadow', 'dipi-divi-pixel'),
            'toggle_slug' => 'filter_bar_items',
            'sub_toggle' => 'active',
            'tab_slug' => 'advanced',
            'css' => [
                'main' => $filter_bar_item_active_selector,
                'hover' => $filter_bar_item_active_hover_selector
            ],
        ];
        
        $advanced_fields["box_shadow"]["grid"] = [
            'label' => esc_html__('Grid Box Shadow', 'dipi-divi-pixel'),
            'toggle_slug' => 'grid',
            'tab_slug' => 'advanced',
            'css' => [
                'main' => "%%order_class%%  .dipi-filtered-posts-container",
            ],
        ];
        $advanced_fields["box_shadow"]["images"] = [
            'label' => esc_html__('Grid Item Box Shadow', 'dipi-divi-pixel'),
            'toggle_slug' => 'grid_items',
            'tab_slug' => 'advanced',
            'css' => [
                'main' => "%%order_class%% .grid .grid-item",
            ],
        ];

        $advanced_fields['margin_padding'] = [
            'css' => [
                'important' => 'all',
            ],
        ];

        $advanced_fields['button']["read_more"] = [
            'label' => esc_html__('Button', 'dipi-divi-pixel'),
            'css' => [
                'main' => "%%order_class%% .dipi-fg-readmore-button",
                'alignment' => "%%order_class%% .dipi-fg-readmore-button-wrapper",
            ],
            'default' => '10px|11px|12px|13px|14px|15px|16px|17px|18px|19px|20px|21px|22px|23px|24px|',
            'use_alignment' => true,
            'box_shadow' => [
                'css' => [
                    'main' => "%%order_class%% .dipi-fg-readmore-button",
                    'important' => true,
                ],
            ],
            'margin_padding' => [
                'css' => [
                    'main' => "%%order_class%% .dipi-fg-readmore-button",
                ],
            ],
            'tab_slug' => 'advanced',
            'toggle_slug' => 'grid_item_read_more_btn'
        ];

        return $advanced_fields;
    }

    public function dipi_get_image_sizes()
    {
        global $_wp_additional_image_sizes;
        $sizes = array();
        $get_intermediate_image_sizes = get_intermediate_image_sizes();
        foreach ($get_intermediate_image_sizes as $_size) {
            if (in_array($_size, array('thumbnail', 'medium', 'large'))) {
                $sizes[$_size]['width'] = get_option($_size . '_size_w');
                $sizes[$_size]['height'] = get_option($_size . '_size_h');
                $sizes[$_size]['crop'] = (bool) get_option($_size . '_crop');
            } elseif (isset($_wp_additional_image_sizes[$_size])) {
                $sizes[$_size] = array(
                    'width' => $_wp_additional_image_sizes[$_size]['width'],
                    'height' => $_wp_additional_image_sizes[$_size]['height'],
                    'crop' => $_wp_additional_image_sizes[$_size]['crop'],
                );
            }
        }

        $image_sizes = array(
            'full' => esc_html__('Full Size', 'dipi-divi-pixel'),
        );
        foreach ($sizes as $sizeKey => $sizeValue) {
            $image_sizes[$sizeKey] = sprintf(
                '%1$s (%2$s x %3$s,%4$s cropped)',
                $sizeKey,
                $sizeValue["width"],
                $sizeValue["height"],
                ($sizeValue["crop"] == false ? ' not' : '')

            );
        }

        return $image_sizes;
    }

    private static function get_featured_image_url($post_id, $image_size, $fallback_url)
    {
        $attachment = get_the_post_thumbnail_url($post_id, $image_size);
        if ($attachment) {
            return $attachment;
        } else {
            return $fallback_url;
        }
    }
    public static function render_filter_bar($args = array(), $conditional_tags = array(), $current_page = array()) {
        $filter_bar_html = '';
        $defaults = [
        ];
        $args = wp_parse_args($args, $defaults);
        $show_all_filter = $args['show_all_filter'];
        $all_filter_label = $args['all_filter_label'];
        $select_post_type = $args['select_post_type'];
        $select_custom_tax = $args['select_custom_tax'];
        $include_term_ids = $args["include_term_ids_of_$select_custom_tax"];
        $show_num_of_elements = $args['show_num_of_elements'];
        $hide_description = $args['hide_description'];
        $post_status = $args['post_status'];
        
        if (!$include_term_ids) {
            return sprintf('<div class="alert" data-items-count="0">
                    Please Select <strong>\'Included '.$select_custom_tax.'\'</strong> to show in filter bar.
                    <br>
                    If you still didn\'t add terms of <strong>\''.$select_custom_tax.'\'</strong>,
                    you can add new terms and assign.
                </div>');
        }
        $dipi_include_terms = $include_term_ids 
            ? array_map(function ($term_id)
                {
                    return  get_term( $term_id );
                }, explode(",", $include_term_ids)) 
            : [];
        $dipi_include_terms = array_filter($dipi_include_terms, function($term_id){
            return $term_id;
        });
        if ($show_all_filter == 'on') {
            $dipi_include_term_all = new stdClass();
            $dipi_include_term_all->name = $all_filter_label;
            array_unshift($dipi_include_terms, $dipi_include_term_all);
        }
        foreach($dipi_include_terms as $index=>$dipi_include_term){
            $name_html = "";
            $desc_html = "";
            if(!empty($dipi_include_term->name) || !empty($dipi_include_term->description)){
                $name_html = sprintf('<div class="dipi-filter-bar-name">%1$s</div>', !empty($dipi_include_term->name) ? $dipi_include_term->name : '');
                if($hide_description === 'off') {
                    $desc_html = sprintf('<div class="dipi-filter-bar-item-desc">%1$s</div>', !empty($dipi_include_term->description) ? $dipi_include_term->description : '');
                }
            }
            $count_html = '';
            if ( $show_num_of_elements === 'on') {
                $query_images_args = [];
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
                $query_posts_args = array(
                    'post_type'      => $select_post_type,
                    'post_status'    => 'published',
                    'posts_per_page' => - 1,
                    'tax_query'      => $tax_query,
                    'fields' => 'ids',
                    'no_found_rows' => true,
                    'post_status' => $post_status
                );
                $query_posts = new WP_Query( $query_posts_args );
                $query_post_count = $query_posts->post_count;
                $count_html = sprintf('<div class="dipi-filter-bar-count">%1$s</div>', $query_post_count);
            }

            $filter_bar_html .=sprintf('
                <div class="dipi-filter-bar-item dipi-filter-bar-item-%3$s %5$s"
                    data-index="%3$s"
                    data-term="%4$s"
                >
                    <div class="dipi-filter-bar-item-title">
                        %1$s
                        %6$s
                    </div>
                    %2$s
                </div>
                ',
                $name_html, 
                $desc_html,
                $index,
                $dipi_include_term->name,
                $index === 0 ? 'active' : '', #5
                $count_html
            );
            
        }
        return sprintf(
            '<div class="dipi-filter-bar" data-items-count="%2$s">
                %1$s
            </div>
           ',
            $filter_bar_html,
            count($dipi_include_terms)
        );
    }
    public static function render_posts($args = array(), $conditional_tags = array(), $current_page = array()) {
        $defaults = [
            'select_post_type' => 'post',
            'select_custom_tax' => 'dipi_cpt_category',
            'posts' => '',
            'pagination_type'=>'none',
            'post_orderby' => '',
            'title_in_lightbox' => 'off',
            'excerpt_in_lightbox' => 'off',
            'icon_in_overlay' => 'off',
            'title_in_overlay' => 'off',
            'excerpt_in_overlay' => 'off',
            'use_post_link' => 'off',
            'post_link_target' => '_blank',
            'use_overlay' => 'off',
            'hover_icon' => '',
            'fix_lazy' => 'off',
            'image_size_desktop' => 'full',
            'image_size_tablet' => 'full',
            'image_size_phone' => 'full',
            'image_animation' => 'none',
            'grid_animation'=> 'none',
            'show_lightbox_link_icon' => 'off',
            'post_count' => '-1',
            'posts_per_page'=>'10',
            'load_more_text' => 'Load More',
            'prev_btn_text' => 'Prev',
            'next_btn_text' => 'Next',
            'post_status' => 'publish',
            'show_author' => 'off',
            'show_author_avatar' => 'off',
            'show_date' => 'off',
            'meta_date' => 'M j, Y',
            'read_more' => 'off',
            'read_more_text' => 'Read More',
            'show_custom_taxonomy' => 'off',
            'show_taxonomy_link' => 'off',
        ];
        $args = wp_parse_args($args, $defaults);
        $show_all_filter = $args['show_all_filter'];
        $all_filter_label = $args['all_filter_label'];
        $select_post_type = $args['select_post_type'];
        $select_custom_tax = $args['select_custom_tax'];
        $include_term_ids = $args["include_term_ids_of_$select_custom_tax"];
        $grid_animation = $args['grid_animation'];
        $show_lightbox_link_icon = $args['show_lightbox_link_icon'];
        $use_overlay = $args['use_overlay'];
        $use_overlay_values = et_pb_responsive_options()->get_property_values($args, 'use_overlay');
        $use_overlay_tablet = isset($use_overlay_values['tablet']) ? $use_overlay_values['tablet'] : '';
        $use_overlay_phone = isset($use_overlay_values['phone']) ? $use_overlay_values['phone'] : '';
        $grid_layout = $args['grid_layout'];
        $use_post_link = $args['use_post_link'];
        $post_link_target = $args['post_link_target'];
        $icon_animation = $args['icon_animation'];
        $title_animation = $args['title_animation'];
        $excerpt_animation = $args['excerpt_animation'];
        $post_status = $args['post_status'];

        $show_lightbox = $args['show_lightbox'];
        $show_lightbox_values = et_pb_responsive_options()->get_property_values($args, 'show_lightbox');
        $show_lightbox_tablet = isset($show_lightbox_values['tablet']) && !empty($show_lightbox_values['tablet']) ? $show_lightbox_values['tablet'] : $show_lightbox;
        $show_lightbox_phone = isset($show_lightbox_values['phone']) && !empty($show_lightbox_values['phone']) ? $show_lightbox_values['phone'] : $show_lightbox_tablet;        
        $post_orderby = $args['post_orderby'];
        $overlay_icon_use_circle = $args['overlay_icon_use_circle'];
        $overlay_icon_use_circle_border = $args['overlay_icon_use_circle_border'];
        $icon_in_overlay = $args["icon_in_overlay"];
        $hover_icon = $args['hover_icon'];
        $title_in_overlay = $args["title_in_overlay"];
        $excerpt_in_overlay = $args["excerpt_in_overlay"];
        $enable_html_in_overlay = $args["enable_html_in_overlay"];
        $enable_shortcode_in_overlay = $args["enable_shortcode_in_overlay"];
        $excerpt_length_in_overlay = $args["excerpt_length_in_overlay"];
        $show_custom_taxonomy = $args["show_custom_taxonomy"];
        $show_taxonomy_link = $args["show_taxonomy_link"];
        $show_post_title = $args["show_post_title"];
        $read_more = $args["read_more"];
        $read_more_text = $args["read_more_text"];
        $read_more_link_target = (isset($args["read_more_link_target"]) && !empty($args["read_more_link_target"]))? $args["read_more_link_target"] : '_self';
        $show_author = $args["show_author"];
        $author_prefix = $args["author_prefix"];
        $show_author_avatar = $args["show_author_avatar"];
        $show_date = $args["show_date"];
        $meta_date = $args["meta_date"];
        $show_post_excerpt = $args["show_post_excerpt"];
        $excerpt_length = $args["excerpt_length"];
        $enable_html_on_grid = $args["enable_html_on_grid"];
        $enable_shortcode_on_grid = $args["enable_shortcode_on_grid"];
        $title_in_lightbox = $args["title_in_lightbox"];
        $excerpt_in_lightbox = $args["excerpt_in_lightbox"];
        $image_animation = $args["image_animation"];
        $fix_lazy = $args["fix_lazy"];
        $pagination_type = $args['pagination_type'];
        $post_count = $args['post_count'];
        $post_count_values = et_pb_responsive_options()->get_property_values($args, 'post_count');
        $post_count_tablet = isset($post_count_values['tablet']) && !empty($post_count_values['tablet']) ? $post_count_values['tablet'] : $post_count;
        $post_count_phone = isset($post_count_values['phone']) && !empty($post_count_values['phone']) ? $post_count_values['phone'] : $post_count_tablet;        
        $post_count_responsive_active = isset($args['post_count_last_edited']) ? et_pb_get_responsive_status($args['post_count_last_edited']) : false;
        $posts_per_page = $args['posts_per_page'];
        $load_more_text = $args['load_more_text'];
        $prev_btn_text = $args['prev_btn_text'];
        $next_btn_text = $args['next_btn_text'];
        $config = [
            'grid_layout' => $grid_layout,
        ];
        $dipi_include_terms = $include_term_ids
            ? array_map(function ($term_id)
                {
                    return  get_term( $term_id );
                }, explode(",", $include_term_ids))
            : [];
        $dipi_include_terms = array_filter($dipi_include_terms, function($term_id){
            return $term_id;
        });
        if ($show_all_filter == 'on') {
            $dipi_include_term_all = new stdClass();
            $dipi_include_term_all->name = $all_filter_label;
            array_unshift($dipi_include_terms, $dipi_include_term_all);
        }

        $show_overlay_classes = ($use_overlay === 'on') ? 'show_overlay' : 'hide_overlay';
        if (!empty($use_overlay_tablet)) {
            $show_overlay_classes .= ($use_overlay_tablet === 'on') ? ' show_overlay_tablet' : ' hide_overlay_tablet';
        }
        if (!empty($use_overlay_phone)) {
            $show_overlay_classes .= ($use_overlay_phone === 'on') ? ' show_overlay_phone' : ' hide_overlay_phone';
        }


        $show_lightboxclasses = "";
        $use_post_link_class = "";
        if ($use_post_link  === "on" ) {
            if ($show_lightbox_link_icon === 'on') {
                $show_lightboxclasses = 'show_lightbox';
            } else {
                $show_lightboxclasses = "hide_lightbox";
            }
            $use_post_link_class ='use_post_link';
        } else {
            $show_lightboxclasses = ($show_lightbox === 'on') ? 'show_lightbox' : 'hide_lightbox';
            if (!empty($show_lightbox_tablet)) {
                $show_lightboxclasses .= ($show_lightbox_tablet === 'on') ? ' show_lightbox_tablet' : ' hide_lightbox_tablet';
            }
            if (!empty($show_lightbox_phone)) {
                $show_lightboxclasses .= ($show_lightbox_phone === 'on') ? ' show_lightbox_phone' : ' hide_lightbox_phone';
            }
        }

    

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
