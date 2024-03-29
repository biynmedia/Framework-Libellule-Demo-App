<?php

namespace App\Controller;


use Libellule\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FrontController extends Controller
{

    /**
     * Page d'Accueil
     * @return Response
     */
    public function home()
    {
        # Récupération de request via le controller.
        # dump($this->getContainer()->get('request'));

        # return new Response("<h1>JE SUIS SUR LA PAGE ACCUEIL</h1>");
        return $this->render('front/index.html.twig');

        # return $this->redirectToRoute('front_categorie', [
        #    'categorie' => 'sport'
        # ]);

        #dump($this->generateUrl('front_home'));

        # return $this->redirect('https://google.fr');
    }

    /**
     * Affiche les Articles d'une Catégorie
     * @param $categorie
     * @return Response
     */
    public function categorie($categorie)
    {
        # return new Response("<h1>JE SUIS SUR LA PAGE CATEGORIE : $categorie</h1>");
        return $this->render('front/categorie.html.twig', [
            'categorie' => $categorie
        ]);
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
        # return new Response("<h1>JE SUIS SUR LA PAGE ARTICLE : $categorie, $slug, $id</h1>");
        return $this->render('front/article.html.twig');
    }
}