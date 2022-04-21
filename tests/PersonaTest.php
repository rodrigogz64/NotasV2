<?php

use App\Clases\Persona;

use PHPUnit\Framework\TestCase;

class PersonaTest extends TestCase
{
    public function testClassConstructor()
    {
        $persona = new \App\Clases\Persona('Alejandro', 'Monge', 21);

        $this->assertSame('Alejandro', $persona->nombre);
        $this->assertSame('Monge', $persona->apellido);
        $this->assertSame(21, $persona->edad);
    }
}