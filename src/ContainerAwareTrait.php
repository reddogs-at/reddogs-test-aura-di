<?php
/**
 * Reddogs (https://github.com/reddogs-at)
 *
 * @see https://github.com/reddogs-at/reddogs-test-aura-di for the canonical source repository
 * @license https://github.com/reddogs-at/reddogs-test-aura-di/blob/master/LICENSE MIT License
 */
declare(strict_types = 1);
namespace Reddogs\Test\AuraDi;

use Aura\Di\Container;
use Zend\ConfigAggregator\ConfigAggregator;
use Aura\Di\ContainerBuilder;

trait ContainerAwareTrait
{

    /**
     * Config providers
     *
     * @var array
     */
    private $configProviders = [];

    /**
     * Container configs
     *
     * @var array
     */
    private $containerConfigs = [];

    /**
     * Container
     *
     * @var Container
     */
    private $container;

    /**
     * Get config providers
     *
     * @return array
     */
    public function getConfigProviders(): array
    {
        return $this->configProviders;
    }

    /**
     * Set config providers
     *
     * @param array $configProviders
     */
    public function setConfigProviders(array $configProviders)
    {
        $this->configProviders = $configProviders;
    }

    /**
     * Get container configs
     *
     * @return array
     */
    public function getContainerConfigs() : array
    {
        return $this->containerConfigs;
    }

    /**
     * Set container configs
     *
     * @param array $containerConfigs
     */
    public function setContainerConfigs(array $containerConfigs)
    {
        $this->containerConfigs = $containerConfigs;
    }

    /**
     * Get container
     *
     * @return Container
     */
    public function getContainer() : Container
    {
        return $this->container;
    }

    /**
     * Set container
     *
     * @param Container $container
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Setup container
     */
    public function setUpContainer()
    {
        $builder = new ContainerBuilder();
        $this->setContainer($builder->newConfiguredInstance($this->getContainerConfigObjects()));
    }

    /**
     * Get container config objects
     *
     * @return array
     */
    private function getContainerConfigObjects() : array
    {
        $config = (new ConfigAggregator($this->getConfigProviders()))->getMergedConfig();
        $containerConfigs = [];

        foreach ($this->getContainerConfigs() as $containerConfig)
        {
            $containerConfigs[] = new $containerConfig($config);
        }
        return $containerConfigs;
    }
}