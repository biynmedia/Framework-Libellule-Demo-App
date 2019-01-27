<?php

namespace Libellule\Twig;

use Libellule\Core\Container\ContainerFactory;
use Twig_Function;

/**
 * Création de fonction essentiel au fonctionnement de libellule
 * Class LibelluleTwigExtension
 * @package Libellule\Core\Twig
 */
class LibelluleTwigExtension extends \Twig_Extension
{

    private $publicDir, $router;

    public function __construct($publicDir)
    {
        $container = ContainerFactory::get_instance();
        $this->router = $container->get('router');
        $this->publicDir = $publicDir;
    }

    public function getFunctions()
    {
        return [
            new Twig_Function('asset', [$this, 'asset']),
            new Twig_Function('url', [$this, 'url']),
        ];
    }

    public function asset(string $asset): string
    {
        return $this->publicDir . '/' . $asset;
    }

    public function url(string $routeName, array $params = array()): string
    {
        return $this->router->generateUrl($routeName, $params);
    }

}