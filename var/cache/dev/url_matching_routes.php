<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/timetable' => [[['_route' => 'admin_timetable_index', '_controller' => 'App\\Controller\\AdminPanel\\AdminTimetableController::timetable'], null, null, null, true, false, null]],
        '/admin/users' => [[['_route' => 'admin_users_index', '_controller' => 'App\\Controller\\AdminPanel\\AdminUsersController::users_index'], null, null, null, true, false, null]],
        '/admin' => [[['_route' => 'admin_panel', '_controller' => 'App\\Controller\\AdminPanelController::index'], null, null, null, true, false, null]],
        '/' => [[['_route' => 'main', '_controller' => 'App\\Controller\\MainController::index'], null, null, null, false, false, null]],
        '/post' => [[['_route' => 'post_index', '_controller' => 'App\\Controller\\PostController::index'], null, null, null, true, false, null]],
        '/post/create' => [[['_route' => 'post_create', '_controller' => 'App\\Controller\\PostController::create'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/getadmin' => [[['_route' => 'getadmin', '_controller' => 'App\\Controller\\SecurityController::get_admin_role'], null, null, null, false, false, null]],
        '/getteacher' => [[['_route' => 'getteacher', '_controller' => 'App\\Controller\\SecurityController::get_teacher_role'], null, null, null, false, false, null]],
        '/getuser' => [[['_route' => 'getuser', '_controller' => 'App\\Controller\\SecurityController::get_user_role'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/admin/(?'
                    .'|timetable/timetable/(?'
                        .'|change/([^/]++)/([^/]++)(*:226)'
                        .'|delete/([^/]++)/([^/]++)/([^/]++)(*:267)'
                    .')'
                    .'|users/(?'
                        .'|([^/]++)(*:293)'
                        .'|profile/([^/]++)(*:317)'
                    .')'
                .')'
                .'|/mark(?'
                    .'|s(?:/([^/]++))?(*:350)'
                    .'|/remove(?:/([^/]++)(?:/([^/]++))?)?(*:393)'
                .')'
                .'|/p(?'
                    .'|ost/(?'
                        .'|show/([^/]++)(*:427)'
                        .'|delete/([^/]++)(*:450)'
                    .')'
                    .'|rofile(?:/([^/]++))?(*:479)'
                .')'
                .'|/timetable(?'
                    .'|(?:/([^/]++))?(*:515)'
                    .'|(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:565)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        226 => [[['_route' => 'admin_timetable_change', '_controller' => 'App\\Controller\\AdminPanel\\AdminTimetableController::timetableChange'], ['group', 'date'], null, null, false, true, null]],
        267 => [[['_route' => 'admin_timetable_delete', '_controller' => 'App\\Controller\\AdminPanel\\AdminTimetableController::deleteLesson'], ['id', 'group', 'date'], null, null, false, true, null]],
        293 => [[['_route' => 'admin_users_group', '_controller' => 'App\\Controller\\AdminPanel\\AdminUsersController::user_choose'], ['group'], null, null, false, true, null]],
        317 => [[['_route' => 'admin_users_profile', '_controller' => 'App\\Controller\\AdminPanel\\AdminUsersController::user_profile'], ['id'], null, null, false, true, null]],
        350 => [[['_route' => 'mark', 'id' => null, '_controller' => 'App\\Controller\\MarkController::index'], ['id'], null, null, false, true, null]],
        393 => [[['_route' => 'removeMark', 'id' => null, 'uid' => null, '_controller' => 'App\\Controller\\MarkController::removeMark'], ['id', 'uid'], null, null, false, true, null]],
        427 => [[['_route' => 'post_show', '_controller' => 'App\\Controller\\PostController::show'], ['id'], null, null, false, true, null]],
        450 => [[['_route' => 'post_delete', '_controller' => 'App\\Controller\\PostController::remove'], ['id'], null, null, false, true, null]],
        479 => [[['_route' => 'profile', 'name' => null, '_controller' => 'App\\Controller\\ProfileController::profileAction'], ['name'], null, null, false, true, null]],
        515 => [[['_route' => 'timetable', 'group' => null, '_controller' => 'App\\Controller\\TimetableController::index'], ['group'], null, null, false, true, null]],
        565 => [
            [['_route' => 'timetable_filter', 'date' => null, 'action' => null, 'group' => null, '_controller' => 'App\\Controller\\TimetableController::timetableFilter'], ['date', 'action', 'group'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
