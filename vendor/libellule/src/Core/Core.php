<?php

namespace Libellule\Core;

use Libellule\Core\Container\ContainerFactory;
use Libellule\Router\Router;
use Libellule\Twig\LibelluleTwigExtension;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig_Environment;
use Twig_Loader_Filesystem;

class Core
{

    private $container, $l_routes;

    public function __construct(array $l_routes)
    {
        # Chargement des Routes
        $this->l_routes = $l_routes;

        # Chargement du Container
        $this->container = ContainerFactory::get_instance();
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

        # On passe la request au container.
        # Elle sera ainsi accessible au controller...
        $this->container->set('request', $request);

        # Aperçu des instances du container
        # dump($this->container);
        # dump($this->container->get('test'));
        # dump($this->container->has('twig'));
        # dump($this->container->has('router'));

        # Initialisation de libellule
        $this->boot();

        /**
         * On appel la fonction matcher pour rechercher une correspondance
         * entre l'URL de la requète et le tableau de routes. Puis on
         * retourne la reponse correspondante.
         */
        $response = $this->container->get('router')->matcher($request);
        return $response;
    }

    /**
     * Initialisation de Libellule
     */
    public function boot()
    {
        # Initialisation du Router
        $this->initializeRouter($this->l_routes);

        # Initialisation de Twig
        $this->initializeTwig($this->container->get('request')->getBaseUrl());
    }

    /**
     * Initialisation de la configuration du router
     * @param $l_routes
     */
    public function initializeRouter(array $l_routes)
    {
        $router = new Router($l_routes);
        $this->container->set('router', $router);
    }

    /**
     * Initialisation de la configuration twig
     * @param string $baseUrl
     */
    public function initializeTwig(string $baseUrl)
    {
        $loader = new Twig_Loader_Filesystem($this->getTemplateDir());
        $twig = new Twig_Environment($loader, [
            # 'cache' => $this->getCacheDir().'/twig',
            'cache' => false,
        ]);
        $twig->addExtension(new LibelluleTwigExtension($baseUrl));
        $this->container->set('twig', $twig);
    }

    /**
     * DOssier root du projet
     * @return string
     */
    public function getProjectDir(): string
    {
        $r = new \ReflectionObject($this);
        $dir = dirname($r->getFileName());
        while (!file_exists($dir . '/composer.json')) {
            $dir = dirname($dir);
        }
        return $dir;
    }

    /**
     * Dossier templates
     * @return string
     */
    public function getTemplateDir(): string
    {
        return $this->getProjectDir().'/templates';
    }

    /**
     * Dossier cache
     * @return string
     */
    public function getCacheDir(): string
    {
        return $this->getProjectDir().'/var/cache';
    }

    /**
     * Dossier public
     * @return string
     */
    public function getPublicDir(): string
    {
        return $this->getProjectDir().'/public';
    }

}
