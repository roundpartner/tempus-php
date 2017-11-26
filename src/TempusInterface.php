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
}