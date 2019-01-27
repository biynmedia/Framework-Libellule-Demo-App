<?php

namespace Libellule\Core;


use Libellule\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Core
{

    private $router, $request;

    public function __construct(array $l_routes)
    {
        $this->router = new Router($l_routes);
    }

    /**
     * Récupère la Request du client et retourne la bonne réponse.
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request): Response
    {
        # Découverte de VarDumper
        # dump($request);

        # On passe à l'objet le request
        $this->request = $request;

        /**
         * On appel la fonction matcher pour rechercher une correspondance
         * entre l'URL de la requète et le tableau de routes. Puis on
         * retourne la reponse correspondante.
         */
        return $this->router->matcher($request);
    }
}
