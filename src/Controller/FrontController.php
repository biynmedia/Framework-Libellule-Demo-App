<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

class FrontController
{

    /**
     * Page d'Accueil
     * @return Response
     */
    public function home()
    {
        return new Response("<h1>JE SUIS SUR LA PAGE ACCUEIL</h1>");
    }

    /**
     * Affiche les Articles d'une Catégorie
     * @return Response
     */
    public function categorie()
    {
        return new Response("<h1>JE SUIS SUR LA PAGE CATEGORIE</h1>");
    }

    /**
     * Affiche un Article
     * @return Response
     */
    public function article()
    {
        return new Response("<h1>JE SUIS SUR LA PAGE ARTICLE</h1>");
    }
}