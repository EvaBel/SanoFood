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
        '/indexx' => [[['_route' => 'app_indexx', '_controller' => 'App\\Controller\\CommandeController::indexx'], null, null, null, false, false, null]],
        '/commande' => [[['_route' => 'app_commande', '_controller' => 'App\\Controller\\CommandeController::index'], null, null, null, false, false, null]],
        '/add_commande' => [[['_route' => 'add_commande', '_controller' => 'App\\Controller\\CommandeController::Add'], null, null, null, false, false, null]],
        '/afficher_commande' => [[['_route' => 'afficher_commande', '_controller' => 'App\\Controller\\CommandeController::AfficheCommande'], null, null, null, false, false, null]],
        '/afficher_commandeAdmin' => [[['_route' => 'afficher_commandeAdmin', '_controller' => 'App\\Controller\\CommandeController::AfficheCommandeAdmin'], null, null, null, false, false, null]],
        '/conseil' => [[['_route' => 'app_conseil', '_controller' => 'App\\Controller\\ConseilController::index'], null, null, null, false, false, null]],
        '/add_conseil' => [[['_route' => 'add_conseil', '_controller' => 'App\\Controller\\ConseilController::add'], null, null, null, false, false, null]],
        '/demande' => [[['_route' => 'app_demande', '_controller' => 'App\\Controller\\DemandeController::index'], null, null, null, false, false, null]],
        '/demandeAdmin' => [[['_route' => 'app_demandeAdmin', '_controller' => 'App\\Controller\\DemandeController::indexAdmin'], null, null, null, false, false, null]],
        '/add_demande' => [[['_route' => 'add_demande', '_controller' => 'App\\Controller\\DemandeController::add'], null, null, null, false, false, null]],
        '/livraison' => [[['_route' => 'app_livraison', '_controller' => 'App\\Controller\\LivraisonController::index'], null, null, null, false, false, null]],
        '/add_Livraison' => [[['_route' => 'add_Livraison', '_controller' => 'App\\Controller\\LivraisonController::Add'], null, null, null, false, false, null]],
        '/afficher_livraison' => [[['_route' => 'afficher_livraison', '_controller' => 'App\\Controller\\LivraisonController::AfficheLivraison'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/delete_(?'
                    .'|a(?'
                        .'|b/([^/]++)(*:227)'
                        .'|dh/([^/]++)(*:246)'
                    .')'
                    .'|conseil/([^/]++)(*:271)'
                    .'|demande/([^/]++)(*:295)'
                .')'
                .'|/update_(?'
                    .'|a(?'
                        .'|b/([^/]++)(*:329)'
                        .'|dh/([^/]++)(*:348)'
                    .')'
                    .'|conseil/([^/]++)(*:373)'
                    .'|demande/([^/]++)(*:397)'
                .')'
                .'|/livrer/([^/]++)(*:422)'
                .'|/conseiller/([^/]++)(*:450)'
                .'|/afficher_livraison1/([^/]++)(*:487)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        227 => [[['_route' => 'delete_ab', '_controller' => 'App\\Controller\\CommandeController::Delete'], ['id'], null, null, false, true, null]],
        246 => [[['_route' => 'delete_adh', '_controller' => 'App\\Controller\\LivraisonController::Delete'], ['id'], null, null, false, true, null]],
        271 => [[['_route' => 'delete_conseil', '_controller' => 'App\\Controller\\ConseilController::delete'], ['idC'], null, null, false, true, null]],
        295 => [[['_route' => 'delete_demande', '_controller' => 'App\\Controller\\DemandeController::delete'], ['id'], null, null, false, true, null]],
        329 => [[['_route' => 'update_ab', '_controller' => 'App\\Controller\\CommandeController::update'], ['id'], null, null, false, true, null]],
        348 => [[['_route' => 'update_adh', '_controller' => 'App\\Controller\\LivraisonController::update'], ['id'], null, null, false, true, null]],
        373 => [[['_route' => 'update_conseil', '_controller' => 'App\\Controller\\ConseilController::update'], ['idC'], null, null, false, true, null]],
        397 => [[['_route' => 'update_demande', '_controller' => 'App\\Controller\\DemandeController::update'], ['id'], null, null, false, true, null]],
        422 => [[['_route' => 'livrer', '_controller' => 'App\\Controller\\CommandeController::sendMessage'], ['id'], null, null, false, true, null]],
        450 => [[['_route' => 'conseiller', '_controller' => 'App\\Controller\\DemandeController::conseiller'], ['id'], null, null, false, true, null]],
        487 => [
            [['_route' => 'afficher_livraison1', '_controller' => 'App\\Controller\\LivraisonController::AfficheLivraison1'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
