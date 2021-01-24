<?php

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    //写的测试代码不自然而且难看
    public function testHello()
    {
        $_GET['name'] = 'Fabien';

        ob_start();
        include 'index.php';
        $content = ob_get_clean();

        $this->assertEquals('Hello Fabien', $content);
    }
}