<?php

namespace App\Services;

use GuzzleHttp\Client;

class InstagramService
{

    protected $client;
    protected $accessToken;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->accessToken = env('INSTAGRAM_TOKEN'); // Obtener el token de acceso desde el archivo .env
    }

    public function getUserInfo($username)
    {
        $response = $this->client->get('https://api.instagram.com/v1/users/self/?access_token=ACCESS_TOKEN');
        return json_decode($response->getBody(), true);
    }
}