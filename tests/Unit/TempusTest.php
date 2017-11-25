<?php

namespace Test\Unit;

use RoundPartner\Tempus\Tempus;
use \PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class TempusTest extends TestCase
{
    /**
     * @var Tempus
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new Tempus();
    }

    /**
     * @param int $userId
     * @param string $scenario
     * @param Response[] $responses
     *
     * @dataProvider \Test\Provider\ResponseProvider::getTokenSuccessfully()
     */
    public function testGetsAToken($userId, $scenario, $responses)
    {
        $client = $this->getClientMock($responses);
        $this->instance->setClient($client);
        $response = $this->instance->get($userId, $scenario);
        $this->assertNotFalse($response);
    }

    /**
     * @param int $userId
     * @param string $scenario
     * @param Response[] $responses
     *
     * @dataProvider \Test\Provider\ResponseProvider::getTokenSuccessfully()
     */
    public function testTokenUserIdIsSet($userId, $scenario, $responses)
    {
        $client = $this->getClientMock($responses);
        $this->instance->setClient($client);
        $response = $this->instance->get($userId, $scenario);
        $this->assertEquals($userId, $response->user_id);
    }

    /**
     * @param int $userId
     * @param string $scenario
     * @param Response[] $responses
     *
     * @dataProvider \Test\Provider\ResponseProvider::getTokenSuccessfully()
     */
    public function testTokenScenarioIsSet($userId, $scenario, $responses)
    {
        $client = $this->getClientMock($responses);
        $this->instance->setClient($client);
        $response = $this->instance->get($userId, $scenario);
        $this->assertEquals($scenario, $response->scenario);
    }

    /**
     * @param Response[] $responses
     *
     * @return Client
     */
    protected function getClientMock($responses)
    {
        $mock = new MockHandler($responses);
        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);
        return $client;
    }
}
