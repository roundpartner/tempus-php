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
            [1, 'alfred', [new Response(200, [], '{"user_id":1,"scenario":"alfred","token":"2b73bb3213da2f0627f492b741bdeb491a43d0f392176981e4138924147ca0d7"}')]],
            [4, 'betty', [new Response(200, [], '{"user_id":4,"scenario":"betty","token":"97758a59062d73e229150f7681cf4b31ebcd3c38066d09eb989f1798c1a1a8ad"}')]],
            [8, 'charlie', [new Response(200, [], '{"user_id":8,"scenario":"charlie","token":"670d3e29a25f2b71fc19e0dd4419b56d4dd1b2f48414419afd634474e1fb5989"}')]],
        ];
    }
}