<?php

namespace Libellule\Core;


use App\Controller\FrontController;
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
        # dump($request->query->count());

        # Si aucun paramètre redirection sur la page 404
        # FIXME : Solution temporaire
        if(!$request->query->count()) {
            return new Response("<h1>ERREUR 404 !</h1>");
        }

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
            #return new Response("<h1>JE SUIS SUR LA PAGE ACCUEIL</h1>");

            # 3. Execution du Controller correspondant
            $frontController = new FrontController();
            return $frontController->home();
        }

        if ($controller == "front" && $action == "categorie") {
            # echo "<h1>JE SUIS SUR LA PAGE CATEGORIE</h1>";
            #return new Response("<h1>JE SUIS SUR LA PAGE CATEGORIE</h1>");
            $frontController = new FrontController();
            return $frontController->categorie();
        }

        if ($controller == "front" && $action == "article") {
            # echo "<h1>JE SUIS SUR LA PAGE ARTICLE</h1>";
            #return new Response("<h1>JE SUIS SUR LA PAGE ARTICLE</h1>");
            $frontController = new FrontController();
            return $frontController->article();
        }
    }
}
