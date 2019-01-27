<?php

namespace Libellule\Router;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Router
{

    private $router;

    /**
     * Router constructor.
     * Initialise le router avec les routes.
     * @param array $l_routes
     * @throws \Exception
     */
    public function __construct(array $l_routes)
    {
        # Initialisation du Routeur
        $this->router = new \AltoRouter();

        # Ajout du tableau de routes au router.
        $this->router->addRoutes($l_routes);
    }

    /**
     * AltoRouter détecte la route et retourne
     * le controller et l'action à executer.
     * @param Request $request
     * @return Response
     */
    public function matcher(Request $request): Response
    {
        # Mise en Place du Base Path
        $this->router->setBasePath($request->getBaseUrl());

        # Cherche une correspondance entre l'URL et notre tableau de route
        $match = $this->router->match($request->server->get('REQUEST_URI'));

        # Si une correspondance est trouvé, on execute le controleur et l'action
        if ($match) {

            # Vérification du $match
            # dump($match);

            $target = explode('::', $match['target']);
            $controller = new $target[0];
            $action = $target[1];

            # Execution du Controller
            # return $controller->$action();
            return call_user_func_array([$controller, $action], $match['params']);

        } else {
            # Sinon, on retourne une erreur 404
            return new Response('ERREUR 404');
        }

    }

    /**
     * Génération d'une URL à partir du nom de la route
     * @param string $routeName
     * @param array $params
     * @return string
     * @throws \Exception
     */
    public function generateUrl(string $routeName, array $params = array()): string
    {
        return $this->router->generate($routeName, $params);
    }
}
