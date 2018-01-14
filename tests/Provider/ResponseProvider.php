<?php

namespace Test\Provider;

use \GuzzleHttp\Psr7\Response;

class ResponseProvider
{
    /**
     * @return Response[]
     */
    public static function getTokenSuccessfully()
    {
        return [
            [1, 'alfred', [new Response(200, [], '{"user_id":"1","scenario":"alfred","token":"BAa-gqpESzJMy6k-oxiokPk-oJ-sejqzgmdSQ0pHXdz3dwTg9wXImWT3_hBKyhgS"}')]],
            [4, 'betty', [new Response(200, [], '{"user_id":"4","scenario":"betty","token":"97758a59062d73e229150f7681cf4b31ebcd3c38066d09eb989f1798c1a1a8ad"}')]],
            [8, 'charlie', [new Response(200, [], '{"user_id":"8","scenario":"charlie","token":"670d3e29a25f2b71fc19e0dd4419b56d4dd1b2f48414419afd634474e1fb5989","meta":{"one":"1"}}')]],
        ];
    }

    /**
     * @return Response[]
     */
    public static function getTokenFails()
    {
        return [
            [[new Response(400, [], '')]]
        ];
    }

    /**
     * @return Response[]
     */
    public static function validateReturnsToken()
    {
        return [
            [1, [new Response(200, [], '{"user_id":"1","scenario":"test","token":"BAa-gqpESzJMy6k-oxiokPk-oJ-sejqzgmdSQ0pHXdz3dwTg9wXImWT3_hBKyhgS"}')]],
            [2, [new Response(200, [], '{"user_id":"2","scenario":"test","token":"BAa-gqpESzJMy6k-oxiokPk-oJ-sejqzgmdSQ0pHXdz3dwTg9wXImWT3_hBKyhgS","meta":{"one":"1"}}')]],
        ];
    }

    public static function tokenNotFound()
    {
        return [
            [[new Response(404, [], '')]]
        ];
    }
}
