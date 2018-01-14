<?php

namespace RoundPartner\Tempus\Entity;

class Token
{
    /**
     * @var string
     */
    public $user_id;

    /**
     * @var string
     */
    public $scenario;

    /**
     * @var string
     */
    public $token;

    /**
     * @var array
     */
    public $meta;

    /**
     * @param $body
     *
     * @return Token
     */
    public static function factory($body)
    {
        $token = new Token();
        $token->user_id = $body->user_id;
        $token->scenario = $body->scenario;
        $token->token = $body->token;
        if (isset($body->meta)) {
            $token->meta = (array) $body->meta;
        }
        return $token;
    }
}
