<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Dashboard Owner Information
    |--------------------------------------------------------------------------
    | 
    */
    'owner' => 'Coderz Tech',

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    */

    'title' => 'Doctype Nepal',
    'title_prefix' => 'Doctype',
    'title_postfix' => 'Nepal',
    'default_logo' => 'static/logo.png',
    'login_logo' => 'static/logo.png',

    /*
    |--------------------------------------------------------------------------
    | Admin Dashboard Route Configurations
    |--------------------------------------------------------------------------
    | 
    */
    'prefix' => 'admin',
    'middleware' => ['web', 'auth', 'role:admin|user'],

    // Register Route
    'register' => true,

    /*
    |--------------------------------------------------------------------------
    | Dashboard Customization
    |--------------------------------------------------------------------------
    |
    | This section contains almost all option for molding the admin panel dashbord
    | according to the user needs.
    | 
    */

    // ===========================BODY CUSTOMIZATION===========================

    // Attributes

    /*
    |--------------------------------------------------------------------------
    | data-open
    |--------------------------------------------------------------------------
    |
    | Set data-open attribute value hover/click to open the dropdown on hover/click.
    | 
    */
    'data-open' => 'click',

    /*
    |--------------------------------------------------------------------------
    | data-menu
    |--------------------------------------------------------------------------
    |
    | This attribute use for the referance to know the menu type, Set data-menu
    | attribute value "vertical-menu" for vertical menu type and "horizontal-menu"
    | for horizontal menu type.
    | 
    */
    'data-menu' => 'vertical-menu',

    /*
    |--------------------------------------------------------------------------
    | data-col
    |--------------------------------------------------------------------------
    |
    | This attribute use for the referance to know the page columns,
    | Set data-menu attribute value based on your column structure requirement,
    | for demo please check the template layout section.
    | Options :
    |"1-column", "2-columns",
    | "content-left-sidebar",
    | "content-right-sidebar",
    | "content-detached-left-sidebar",
    | "content-detached-right-sidebar"
    | 
    */
    'data-col' => '2-columns',

    /*
    |--------------------------------------------------------------------------
    | Body Class
    |--------------------------------------------------------------------------
    | Options :
    |".vertical-layout vertical-menu",
    | "horizontal-layout horizontal-menu"
    | "boxed-layout"
    | "fixed-navbar"
    | "menu-collapsed"
    | 
    */
    'body_class' => 'vertical-layout vertical-menu 2-columns fixed-navbar',

    // =======================NAVBAR CUSTOMIZATION=======================

    // Attribute

    // Navbar Disabled
    'navbar_disable' => false,

    /*
    |--------------------------------------------------------------------------
    | Navbar Color
    |--------------------------------------------------------------------------
    | Options :
    | navbar-light
    | navbar-dark
    | navbar-semi-dark
    | 
    */
    'navbar_color' => 'navbar-light',

    /*
    |--------------------------------------------------------------------------
    | Navbar Classes
    |--------------------------------------------------------------------------
    | Options:
    | fixed-top
    | fixed-bottom
    | navbar-static-top
    | navbar-brand-center
    | navbar-border
    | navbar-shadow
    */
    'navbar_classes' => 'fixed-top navbar-border',

    // ==========================MENU CUSTOMIZATION==========================

    // Menu Disable
    'menu_disabled' => false,

    // Vertical Navigation

    /*
    |--------------------------------------------------------------------------
    | Vertical Menu Color
    |--------------------------------------------------------------------------
    |
    | Options:
    | menu-light
    | menu-dark
    | 
    */
    'vertical_menu_color' => 'menu-light',

    /*
    |--------------------------------------------------------------------------
    | Menu Classes
    |--------------------------------------------------------------------------
    |
    | Options :
    | menu-fixed : To create vertical fixed navigation
    | menu-static : To create vertical static navigation
    | menu-accordion : Default vertical navigation type is accordion navigation. 
    | menu-collapsible : To create vertical collapsible navigation
    | menu-flipped : Change navigation menu position to right with the help of flipped navigation menu options.
    | menu-native-scroll : 	To create vertical navigation with native scroll
    | menu-icon-right : To create vertical navigation right side icons,
    | menu-bordered : To create vertical bordered navigation
    | menu-shadow : navigation shadow
    | 
    */
    'vertical_manu_classes' => 'menu-fixed menu-shadow menu-accordion',

    // Horizontal Navigation (Not Implemeneted ToDO)

    /*
    |--------------------------------------------------------------------------
    | Horizontal Menu Color
    |--------------------------------------------------------------------------
    |
    | Options :
    | navbar-light
    | navbar-dark
    | 
    */
    'horizontal_menu_color' => 'navbar-light',

    /*
    |--------------------------------------------------------------------------
    | Menu Classes
    |--------------------------------------------------------------------------
    |
    | Options :
    | navbar-fixed : To create horizontal fixed navigation
    | navbar-flipped : To create horizontal flipped navigation
    | navbar-without-dd-arrow : To remove the horizontal navigation dropdown arrow
    | navbar-icon-right : To create horizontal navigation with right side icons
    | navbar-border : Add horizontal navigation border bottom
    | navbar-shadow : Add horizontal navigation shadow
    | 
    | 
    */
    'horizontal_menu_classes' => '',

    // =========================HEADER CUSTOMIZATION=========================

    /*
    |--------------------------------------------------------------------------
    | Header Settings
    |--------------------------------------------------------------------------
    | 
    */
    'include_mega_menu' => false,
    'include_maximizer' => true,
    'include_search' => false,
    'include_language_drawer' => false,
    'include_notification_panel' => false,
    'include_profile_dropdown' => true,

    // =========================FOOTER CUSTOMIZATION=========================

    /*
    |--------------------------------------------------------------------------
    | Footer Settings
    |--------------------------------------------------------------------------
    | 
    */
    'include_footer' => true,

    /*
    |--------------------------------------------------------------------------
    | Footer Color
    |--------------------------------------------------------------------------
    |
    | Options :
    | footer-light 
    | footer-dark
    | footer-transparent
    */
    'footer_color' => 'footer-light',
    /*
    |--------------------------------------------------------------------------
    | Footer Classes
    |--------------------------------------------------------------------------
    |
    | Options :
    | footer-fixed : To set footer fixed
    | footer-static 
    | navbar-border
    | 
    */
    'footer_classes' => 'footer-static navbar-border',

    // GLOBAL CARD CUSTOMIZATION
    'global_card' => true,
    'card_wrapper_classes' => '',
    'global_card_classes' => '',
    'global_card_header_classes' => '',
    'global_card_title_classes' => '',
    'global_card_content_classes' => '',
    'global_card_body_classes' => '',
    'global_card_header_elements' => true,
    'global_card_actions' => [
        [
            'data-action' => 'collapse',
            'action-icon' => 'feather icon-minus'
        ],
        [
            'data-action' => 'expand',
            'action-icon' => 'feather icon-maximize'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Data Settings
    |--------------------------------------------------------------------------
    | 
    */
    'caching' => true,

    // ======================DASHBOARD CUSTOMIZATION END======================

    // ASSETS DEPENDENCIES INJECTION
    'plugins' => [
        [
            'name' => 'Datatables',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'app-assets/vendors/css/tables/datatable/datatables.min.css'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/vendors/js/tables/datatable/datatables.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/vendors/js/tables/buttons.flash.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/vendors/js/tables/jszip.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/vendors/js/tables/pdfmake.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/vendors/js/tables/vfs_fonts.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/vendors/js/tables/buttons.html5.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/vendors/js/tables/buttons.print.min.js'
                ],
            ]
        ],
        [
            'name' => 'Toastr',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'app-assets/vendors/css/extensions/toastr.css'
                ],
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'app-assets/css/plugins/extensions/toastr.css'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/vendors/js/extensions/toastr.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/js/scripts/extensions/toastr.js'
                ],
            ],
        ],
        [
            'name' => 'Input Group',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'app-assets/css/plugins/forms/form-inputs-groups.css'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js'
                ],
            ],
        ],
        [
            'name' => 'Touch Spin',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/js/scripts/forms/input-groups.js'
                ],
            ],
        ],
        [
            'name' => 'Select2',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'app-assets/vendors/css/forms/selects/select2.min.css'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/vendors/js/forms/select/select2.full.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/js/scripts/forms/select/form-select2.js'
                ],
            ],
        ],
        [
            'name' => 'Datetime',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'active' => false,
                    'location' => 'app-assets/css/plugins/pickers/daterange/daterange.css'
                ],
                [
                    'type' => 'css',
                    'active' => false,
                    'location' => 'app-assets/vendors/css/pickers/daterange/daterangepicker.css'
                ],
                [
                    'type' => 'css',
                    'active' => false,
                    'location' => 'app-assets/vendors/css/pickers/datetime/bootstrap-datetimepicker.css'
                ],
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'app-assets/vendors/css/pickers/pickadate/pickadate.css'
                ],
                [
                    'type' => 'js',
                    'active' => false,
                    'location' => 'app-assets/vendors/js/pickers/dateTime/bootstrap-datetimepicker.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/vendors/js/pickers/pickadate/picker.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/vendors/js/pickers/pickadate/picker.date.js'
                ],
                [
                    'type' => 'js',
                    'active' => false,
                    'location' => 'app-assets/vendors/js/pickers/pickadate/picker.time.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/vendors/js/pickers/pickadate/legacy.js'
                ],
                [
                    'type' => 'js',
                    'active' => false,
                    'location' => 'app-assets/vendors/js/pickers/daterange/daterangepicker.js'
                ],
                [
                    'type' => 'js',
                    'active' => false,
                    'location' => 'app-assets/js/scripts/pickers/dateTime/bootstrap-datetime.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js'
                ],
            ],
        ],
        [
            'name' => 'CKEditor',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'plugins/ckeditor5-build-classic/ckeditor.js'
                ],
                [
                    'type' => 'js',
                    'active' => false,
                    'location' => 'plugins/ckeditor5-build-balloon/ckeditor.js'
                ],
            ],
        ],
        [
            'name' => 'Switch',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'active' => false,
                    'location' => 'app-assets/vendors/css/forms/toggle/switchery.min.css'
                ],
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'app-assets/css/plugins/forms/switch.css'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => false,
                    'location' => 'app-assets/vendors/js/forms/toggle/switchery.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'app-assets/js/scripts/forms/switch.js'
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    | 
    */

    'login_view' => 'admin.auth.login',
    'register_view' => 'admin.auth.register',

    'default_user_role' => 'user',
    'default_user_role_level' => 1,


];
