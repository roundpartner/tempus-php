<?php

namespace RoundPartner\Tempus;

class Tempus extends RestClient
{
    public function __construct()
    {
        parent::__construct([
            'base_uri' => 'http://0.0.0.0:7373',
        ]);
    }

    /**
     * @param int $userId
     * @param string $scenario
     *
     * @return object
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
        return $body;
    }
}
