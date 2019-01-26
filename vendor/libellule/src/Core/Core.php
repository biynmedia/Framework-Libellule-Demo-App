<?php

namespace Libellule\Core;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Core
{
    /**
     * Récupère la Request du client et retourne la bonne réponse.
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request): Response
    {
        # Découverte de VarDumper
        # dump($request);

        # Récupération des Paramètres avec $_GET
        # $controller = $request['controller'];
        # $action     = $request['action'];

        # Récupération des Paramètres avec Request
        $controller = $request->get('controller');
        $action = $request->get('action');

        if ($controller == "front" && $action == "index") {
            # 1. Affichage d'une réponse
            # echo "<h1>JE SUIS SUR LA PAGE ACCUEIL</h1>";

            # 2. Retour d'une réponse
            return new Response("<h1>JE SUIS SUR LA PAGE ACCUEIL</h1>");
        }

        if ($controller == "front" && $action == "categorie") {
            # echo "<h1>JE SUIS SUR LA PAGE CATEGORIE</h1>";
            return new Response("<h1>JE SUIS SUR LA PAGE CATEGORIE</h1>");
        }

        if ($controller == "front" && $action == "article") {
            # echo "<h1>JE SUIS SUR LA PAGE ARTICLE</h1>";
            return new Response("<h1>JE SUIS SUR LA PAGE ARTICLE</h1>");
        }
    }
}
