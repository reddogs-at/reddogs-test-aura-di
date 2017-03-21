<?php
/**
 * Reddogs (https://github.com/reddogs-at)
 *
 * @see https://github.com/reddogs-at/reddogs-test-aura-di for the canonical source repository
 * @license https://github.com/reddogs-at/reddogs-test-aura-di/blob/master/LICENSE MIT License
 */
declare(strict_types = 1);
namespace ReddogsTest\Test\AuraDi\_files;

use Aura\Di\ContainerConfigInterface;
use Aura\Di\Container;

class TestContainerConfig implements ContainerConfigInterface
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function define(Container $di)
    {
        $di->set('config', new \ArrayObject($this->config, \ArrayObject::ARRAY_AS_PROPS));
    }

    public function modify(Container $di)
    {
    }
}