<?php

namespace RoundPartner\Tempus;

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
}
