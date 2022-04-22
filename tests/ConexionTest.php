<?php

use App\Clases\Conexion;

use PHPUnit\Framework\TestCase;

class ConexionTest extends TestCase
{
    public function testDBCredentials()
    {
        $conexion = new \App\Clases\Conexion();

        $this->assertSame('localhost', $conexion->servername);
        $this->assertSame('root', $conexion->username);
        $this->assertSame('', $conexion->password);
        $this->assertSame('notas', $conexion->database);
        
    }
}