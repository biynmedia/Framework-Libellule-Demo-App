<?php

namespace Libellule\Controller;


use Symfony\Component\HttpFoundation\Response;

trait ControllerTrait
{
    /**
     * Permet de générer l'affichage de la vue passée en paramètre.
     * @param string $view Vue à afficher
     * @param array $parameters
     * @return Response
     */
    protected function render(string $view, array $parameters = array()): Response
    {

        # Récupération de twig dans le container + rendu de la vue
        $content = $this->container->get('twig')->render($view, $parameters);

        # Fabrication du réponse
        $response = new Response();

        # Affectation du contenu twig
        $response->setContent($content);

        # Retour de la réponse à Core
        return $response;

    }
}