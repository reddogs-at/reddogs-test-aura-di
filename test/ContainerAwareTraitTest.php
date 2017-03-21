<?php
/**
 * Reddogs (https://github.com/reddogs-at)
 *
 * @see https://github.com/reddogs-at/reddogs-test-aura-di for the canonical source repository
 * @license https://github.com/reddogs-at/reddogs-test-aura-di/blob/master/LICENSE MIT License
 */
declare(strict_types = 1);
namespace ReddogsTest\Test\AuraDi;

use PHPUnit\Framework\TestCase;
use Aura\Di\Container;
use ReddogsTest\Test\AuraDi\_files\TestConfigProvider;
use ReddogsTest\Test\AuraDi\_files\TestContainerConfig;

class ContainerAwareTraitTest extends TestCase
{
    private $trait;

    protected function setUp()
    {
        $this->trait = $this->getMockBuilder('Reddogs\\Test\\AuraDi\\ContainerAwareTrait')->getMockForTrait();
    }

    public function testGetConfigProviders()
    {
        $this->assertSame([], $this->trait->getConfigProviders());
    }

    public function testSetConfigProviders()
    {
        $configProviders = ['testConfigProviders'];
        $this->trait->setConfigProviders($configProviders);
        $this->assertSame($configProviders, $this->trait->getConfigProviders());
    }

    public function testGetContainerConfigs()
    {
        $this->assertSame([], $this->trait->getContainerConfigs());
    }

    public function testSetContainerConfigs()
    {
        $containerConfigs = ['testContainerConfigs'];
        $this->trait->setContainerConfigs($containerConfigs);
        $this->assertSame($containerConfigs, $this->trait->getContainerConfigs());
    }

    public function testSetContainer()
    {
        $container = $this->createMock(Container::class);
        $this->trait->setContainer($container);
        $this->assertSame($container, $this->trait->getContainer());
    }

    public function testSetUpContainer()
    {
        $this->trait->setConfigProviders([TestConfigProvider::class]);
        $this->trait->setContainerConfigs([TestContainerConfig::class]);
        $this->trait->setUpContainer();

        $container = $this->trait->getContainer();
        $this->assertTrue($container->has('config'));
        $config = $container->get('config');
        $this->assertEquals('testValue', $config['testKey']);
    }
}