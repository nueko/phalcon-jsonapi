<?php namespace Phalcon\JsonApi\Test;


use Neomerx\JsonApi\Encoder\Encoder;
use Phalcon\Db\Adapter\Pdo;

class BasicTest extends UnitTestCase {

    public function testEncoderServiceIsLoaded()
    {
        $this->assertInstanceOf(Encoder::class, $this->di->get('encoder'));
    }

    public function testEncoderServiceOnProperty()
    {
        $this->assertInstanceOf(Encoder::class, $this->encoder);
    }

    public function testDbServiceIsLoaded()
    {
        $this->assertTrue($this->di->has('db'));
    }
}