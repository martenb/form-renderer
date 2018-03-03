<?php
declare(strict_types = 1);

namespace NepadaTests;

use Mockery;
use Tester;

class TestCase extends Tester\TestCase
{

    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

}
