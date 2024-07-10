<?php

namespace App\Services;

use Http;

class RequestService
{
    public static function sendRequest(array $params): array
    {
        try {
            $response = Http::withBody(json_encode($params['data']), 'application/json')
                ->get($params['url']);

            // http code above 200 and less than 300
            if ($response->successful()) {
                $data = $response->json();
                return $data['Result'];
            }

        } catch (\Exception $exception) {

            /**
             * * TODO: Log
             */
        }

        return [];

    }

}