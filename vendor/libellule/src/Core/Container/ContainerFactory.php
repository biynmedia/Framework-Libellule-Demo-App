<?php

namespace Libellule\Core\Container;

/**
 * Instancie et retourne le container.
 * Principe du Singleton.
 * Class ContainerFactory
 * @package Libellule\Core\Container
 */
final class ContainerFactory
{
    private static $instance;

    private function __construct() {}

    public static function get_instance() {

        if ( ! isset( self::$instance ) ) {
            self::$instance = new Container();
        }

        return self::$instance;
    }
}