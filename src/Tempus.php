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

    public function get()
    {
        $data = [
            'user_id' => 1,
            'scenario' => 'test',
        ];
        $response = $this->client->post('/', [
            'json' => $data
        ]);
        $body = json_decode($response->getBody());
        return $body;
    }
}