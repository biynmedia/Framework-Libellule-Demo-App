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
     * @param $categorie
     * @return Response
     */
    public function categorie($categorie)
    {
        return new Response("<h1>JE SUIS SUR LA PAGE CATEGORIE : $categorie</h1>");
    }

    /**
     * Affiche un Article
     * @param $categorie
     * @param $slug
     * @param $id
     * @return Response
     */
    public function article($categorie, $id, $slug)
    {
        return new Response("<h1>JE SUIS SUR LA PAGE ARTICLE : $categorie, $slug, $id</h1>");
    }
}