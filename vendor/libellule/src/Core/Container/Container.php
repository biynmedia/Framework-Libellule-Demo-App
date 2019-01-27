<?php

namespace Libellule\Core\Container;
use Tightenco\Collect\Support\Collection;

/**
 * Démonstration d'un Container Simple
 * Class Container
 * @package Libellule\Core\Container
 */
class Container
{

    # Création d'un tableau
    # private $instances = [];
    private $instances;

    public function __construct()
    {
        $this->instances = new Collection();
    }

    public function get($key)
    {
        # return $this->instances[$key];
        return $this->instances->get($key);
    }

    public function set($key, $value)
    {
        # $this->instances[$key] = $value;
        $this->instances->put($key, $value);
    }

    public function has($key)
    {
        return $this->instances->has($key);
    }

}
