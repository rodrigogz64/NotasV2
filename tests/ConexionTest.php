<?php

use App\Conexion;

use PHPUnit\Framework\TestCase;

class ConexionTest extends TestCase
{
    public function testDBCredentials()
    {
        $conexion = new Conexion();

        $this->assertSame('localhost', $conexion->servername);
        $this->assertSame('root', $conexion->username);
        $this->assertSame('password', $conexion->password);
        $this->assertSame('notas', $conexion->database);
        
    }
}