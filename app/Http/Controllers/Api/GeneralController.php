<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\CompanyService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class GeneralController extends Controller
{
    public function getCompanyCities(Request $request)
    {
        $user_token = UserService::getUserToken($request->user);

        $token = $request->token;

        if ($token === $user_token) {

            $parameters = [
                "method" => "getCities"
            ];

            $url = CompanyService::getCompanyApiUrlBySubdomain($request->company);

            $response = Http::withBody(json_encode($parameters), 'application/json')
                ->get($url);

            return response()->json($response['Result']);

        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
    public function getCompanyProvinces(Request $request)
    {
        $user_token = UserService::getUserToken($request->user);

        $token = $request->token;

        if ($token === $user_token) {

            $parameters = [
                "method" => "getProvinces"
            ];

            $url = CompanyService::getCompanyApiUrlBySubdomain($request->company);

            $response = Http::withBody(json_encode($parameters), 'application/json')
                ->get($url);

            return response()->json($response['Result']);

        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}