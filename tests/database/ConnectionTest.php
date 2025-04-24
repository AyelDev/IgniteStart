<?php

namespace App\Database;

use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;

class ConnectionTest extends CIUnitTestCase
{
    public function testMysqliConnection()
    {
        $db = \Config\Database::connect('tests');

        // Check if the driver is MySQLi
        $this->assertSame('MySQLi', $db->DBDriver) === true;
    }
}
?>