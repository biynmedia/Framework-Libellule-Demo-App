<?php

namespace Libellule\Controller;

use Libellule\Core\Container\Container;
use Libellule\Core\Container\ContainerFactory;

abstract class Controller
{

    use ControllerTrait;

    private $container;

    public function __construct()
    {
        $this->container = ContainerFactory::get_instance();
    }

    /**
     * @return Container
     */
    public function getContainer(): Container
    {
        return $this->container;
    }

}