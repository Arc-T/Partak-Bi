<?php

namespace App\Services;

use Http;

class RequestService
{
    public static function sendRequest(array $query_params, string $api_url): array
    {
        try {
            $response = Http::withBody(json_encode($query_params), 'application/json')
                ->get($api_url);

            // if ($response->successful()) {
            //     $data = $response->json();
            //     return $data['Result'];
            // }

            $data = $response->json();



            return $data['Result'][0];

        } catch (\Exception $exception) {

            dd($exception);
            /**
             * * TODO: Log
             */
        }
        return [];
    }
}