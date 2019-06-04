<?php

use app\engine\Render;

class RenderTest extends \PHPUnit\Framework\TestCase
{

    protected $fixture;
    /**
     * @dataProvider providerRender
     */
    public function testRender($content, $template)
    {
        $this->assertContains($content, $this->fixture->renderTemplate($template, []));
    }
    public function providerRender()
    {
        return [
            ["</h2>", "index"],
            ["HOME","menu"]
        ];
    }
    protected function setUp()
    {
        $this->fixture = new Render();
    }
    protected function tearDown()
    {
        $this->fixture = null;
    }
}