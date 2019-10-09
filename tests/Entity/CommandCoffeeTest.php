<?php

namespace Tests\Entity;

use App\Entity\CommandCoffee;
use PHPUnit\Framework\TestCase;

class CommandCoffeeTest extends TestCase
{
    public function test_initializeStatut()
    {
        $commandCoffee = new CommandCoffee('Expresso');
        $this->assertSame(0, $commandCoffee->getStatut());
    }
}