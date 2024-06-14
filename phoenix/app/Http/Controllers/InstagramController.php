<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Inertia\Inertia;

class InstagramController extends Controller
{
    protected $client;

    public function __construct()
    {
        //$this->client = new Client();
    }

    public function getPhotos()
    {
        //user token
        //EAATxtkQMZBmgBO6EiMv0mC21oTDjx1JOJx16ZCZCAlQu6UTNdXUEZBMHl6sAVk2xPwgn5izJ6b2swtOVapW0Jq7UOD8SIqZCfWE7CpKZBaZCTTsaNZBGvIVjcAMPrkVSMdkCtYUgswZB3GK9HFMbe56PxrxJ46jzy5KMFhihnL5bZA1fgeuShyprrrMbWKG6x5fFZCHshyA0LpnYUFudTWGEAZDZD
        //app token
        //1391665034885736|FxJ7E2xY3Fvv9wuvecoNaK-yYYQ 

    
        $client = new Client();
        $response = $client->get('https://graph.instagram.com/me/media', [
            'query' => [
                'fields' => 'id,media_type,media_url,permalink',
                'access_token' =>env('INSTAGRAM_TOKEN')
            ]
        ]);

        
        $photos = json_decode($response->getBody(), true);

        return Inertia::render('Events', ['photos' => $photos]);

    }


    // Redirecciona al usuario a la página de autorización de Instagram
    public function redirectToInstagram()
    {
        $query = http_build_query([
            'client_id' => env('INSTAGRAM_CLIENT_ID'),
            'redirect_uri' => env('INSTAGRAM_REDIRECT_URI'),
            'response_type' => 'code',
            'scope' => 'user_profile,user_media', // Ajusta el alcance según tus necesidades
        ]);

        return redirect('https://api.instagram.com/oauth/authorize?' . $query);
    }

    // Maneja la respuesta de Instagram y obtiene el token de acceso
    public function handleInstagramCallback(Request $request)
    {
        $code = $request->query('code');

        // Realiza una solicitud POST para intercambiar el código de autorización por un token de acceso
        $client = new Client();
        $response = $client->post('https://api.instagram.com/oauth/access_token', [
            'form_params' => [
                'client_id' => env('INSTAGRAM_CLIENT_ID'),
                'client_secret' => env('INSTAGRAM_CLIENT_SECRET'),
                'grant_type' => 'authorization_code',
                'redirect_uri' => env('INSTAGRAM_REDIRECT_URI'),
                'code' => $code,
            ]
        ]);

        // Decodifica la respuesta JSON
        $data = json_decode($response->getBody()->getContents(), true);

        // Guarda el token de acceso en tu base de datos o úsalo directamente en tu aplicación
        $accessToken = $data['access_token'];

        // Redirige a la página deseada después de obtener el token de acceso
        return redirect('/dashboard');
    }
}
