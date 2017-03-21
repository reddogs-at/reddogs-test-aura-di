<?php
/**
 * Reddogs (https://github.com/reddogs-at)
 *
 * @see https://github.com/reddogs-at/reddogs-test-aura-di for the canonical source repository
 * @license https://github.com/reddogs-at/reddogs-test-aura-di/blob/master/LICENSE MIT License
 */
declare(strict_types = 1);
namespace ReddogsTest\Test\AuraDi\_files;

class TestConfigProvider
{
    public function __invoke()
    {
        return [
            'testKey' => 'testValue'
        ];
    }
}