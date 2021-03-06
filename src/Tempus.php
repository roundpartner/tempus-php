<?php

namespace RoundPartner\Tempus;

use GuzzleHttp\Exception\ClientException;
use RoundPartner\Tempus\Entity\Token;

class Tempus extends RestClient implements TempusInterface
{
    public function __construct($baseUri)
    {
        parent::__construct([
            'base_uri' => $baseUri,
        ]);
    }

    /**
     * @param int $userId
     * @param string $scenario
     * @param array $meta
     *
     * @return Token
     */
    public function get($userId, $scenario, $meta = [])
    {
        $data = [
            'user_id' => (string) $userId,
            'scenario' => $scenario,
            'meta' => (object) $meta,
        ];
        $response = $this->client->post('/', [
            'json' => $data
        ]);
        $body = json_decode($response->getBody());
        $token = Token::factory($body);
        return $token;
    }

    /**
     * @param string $token
     * @param int $userId
     * @param string $scenario
     *
     * @return Token
     *
     * @throws \Exception
     */
    public function validate($token, $userId, $scenario = null)
    {
        $uri = sprintf('/%d/%s', $userId, $token);
        if (null !== $scenario) {
            $uri = sprintf('/%d/%s/%s', $userId, $scenario, $token);
        }
        try {
            $response = $this->client->get($uri);
        } catch (ClientException $exception) {
            $response = $exception->getResponse();
            if (404 === $response->getStatusCode()) {
                return false;
            }
            throw $exception;
        }
        $body = json_decode($response->getBody());
        $token = Token::factory($body);
        return $token;
    }
}
