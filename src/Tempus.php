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
     *
     * @return Token
     */
    public function get($userId, $scenario)
    {
        $data = [
            'user_id' => (string) $userId,
            'scenario' => $scenario,
        ];
        $response = $this->client->post('/', [
            'json' => $data
        ]);
        $body = json_decode($response->getBody());
        $token = new Token();
        $token->user_id = $body->user_id;
        $token->scenario = $body->scenario;
        $token->token = $body->token;
        return $token;
    }

    /**
     * @param string $token
     * @param int $userId
     *
     * @return Token
     *
     * @throws \Exception
     */
    public function validate($token, $userId)
    {
        $uri = sprintf('/%d/%s', $userId, $token);
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
        $token = new Token();
        $token->user_id = $body->user_id;
        $token->scenario = $body->scenario;
        $token->token = $body->token;
        return $token;
    }
}
