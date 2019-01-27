<?php

	$l_routes = [
        ['GET','/', 'App\Controller\FrontController::home', 'front_home'],
        ['GET','/[:categorie]', 'App\Controller\FrontController::categorie', 'front_categorie'],
        ['GET','/[:categorie]/[i:id]-[:slug].html', 'App\Controller\FrontController::article', 'front_article'],
    ];
