<?php

namespace RoundPartner\Tempus;

interface TempusInterface
{
    /**
     * @param int $userId
     * @param string $scenario
     *
     * @return Token
     */
    public function get($userId, $scenario);

    /**
     * @param string $token
     * @param int $userId
     *
     * @return Token
     */
    public function validate($token, $userId);
}
