<?php

use Libellule\Core\Core;
use Symfony\Component\HttpFoundation\Request;

# Chargement de l'Autoload de Composer
require __DIR__ . '/../vendor/autoload.php';

# 1. Initialisation de l'application avec $_GET
# $core = new Core();
# $core->handle($_GET);

# 2. Avec Symfony HttpFoundation

# Récupération de la Global Request
$request = Request::createFromGlobals();

# Récupération des routes
require '../config/routes.php';

# Initialisation de l'application
$core = new Core($l_routes);

# Traitement de la Requete par notre classe Core
$response = $core->handle($request);

# Retour de la réponse au navigateur du client.
$response->send();
