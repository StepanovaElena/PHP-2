<?php

use app\engine\Autoload;

class AutoloadTest extends \PHPUnit\Framework\TestCase
{
    protected $fixture;
    /**
     * @dataProvider providerLoadClass
     */
    public function testLoadClass($className)
    {
        $this->assertNull($this->fixture->loadClass($className));
    }
    public function providerLoadClass()
    {
        return [
            ['..\app\engine\Db'],
            ['..\app\engine\Request'],
            ['..\app\controllers\Controller'],
            ['..\app\controllers\ProductController'],
            ['..\app\controllers\UserController']
        ];
    }
    protected function setUp()
    {
        $this->fixture = new Autoload();
    }
    protected function tearDown()
    {
        $this->fixture = null;
    }

}