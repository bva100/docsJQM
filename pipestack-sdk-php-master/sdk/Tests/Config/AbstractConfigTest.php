<?php

require 'sdk/Config/AbstractPipeStackConfig.php';

class AbstractConfigTest extends \PHPUnit_Framework_TestCase {

    /**
     * @expectedException LogicException
     */
    public function testConstructWithMissingProperties()
    {
        new AbstractPipeStackConfig();
    }

    public function testConstructWithAllProperties()
    {
        $config = new ConcreteConfig();
        $this->assertEquals('foobar', $config->getAccessToken());
        $this->assertEquals('fooformat', $config->getFormat());
        $this->assertEquals('http://', $config->getProtocol());
        $this->assertEquals('api.pipestack.com', $config->getHostname());
        $this->assertEquals(20, $config->getTimeout());
    }

    public function testGetParams()
    {
        $config = new ConcreteConfig();
        $this->assertEquals($config->getParams(), array(
            'accessToken' => 'foobar',
            'format' => 'fooformat',
            'protocol' => 'http://',
            'hostname' => 'api.pipestack.com',
            'timeout' => 20,
        ));
    }
}

class ConcreteConfig extends AbstractPipeStackConfig {
    protected $clientId = 'boom'; protected $clientSecret = 'foo'; protected $accessToken = 'foobar'; protected $format = 'fooformat'; protected $protocol = 'http://'; protected $hostname = 'api.pipestack.com'; protected $timeout = 20;
}