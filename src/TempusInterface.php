<?php

namespace RoundPartner\Tempus;

interface TempusInterface
{
    /**
     * @param int $userId
     * @param string $scenario
     * @param array $meta
     *
     * @return Token
     */
    public function get($userId, $scenario, $meta = []);

    /**
     * @param string $token
     * @param int $userId
     *
     * @return Token
     */
    public function validate($token, $userId);
}
