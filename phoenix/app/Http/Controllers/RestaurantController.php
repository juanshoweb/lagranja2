<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Inertia\Inertia;
use Illuminate\Support\Facades\Http;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Restaurant::all();
        $limit = env('LIMIT_IMG_PAG_INSTAGRAM'); // Definir límite de resultados por página
        $after = $request->input('after');
        $photos = [];

        
        do {
            $client = new Client();
            $response = $client->get('https://graph.instagram.com/me/media', [
                'query' => [
                    'fields' => 'id,username,profile_picture_url,media_type,media_url,permalink',
                    'access_token' => env('INSTAGRAM_TOKEN'),
                    'after' => $after,
                    'limit' => $limit
                ]
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            // Filtrar solo las imágenes
            $images = array_filter($data['data'], function ($media) {
                return $media['media_type'] === 'IMAGE' || $media['media_type'] === 'CAROUSEL_ALBUM';
            });

            // Si hay imágenes, las agregamos al array de fotos
            if (!empty($images)) {
                $photos = array_merge($photos, $images);
            }

            // Obtener el nombre de usuario solo si es la primera página
            if ($after === null) {
                $username = isset($data['data'][0]['username']) ? $data['data'][0]['username'] : null;
            }

            // Establecer el token de paginación para la siguiente solicitud
            $after = isset($data['paging']['cursors']['after']) ? $data['paging']['cursors']['after'] : null;
        } while ($after !== null && count($photos) < $limit);

       //Carousel promociones 
       // Simulando la obtención de datos del carrusel desde algún modelo o fuente de datos
       $carouselDataPromo = [
            [
                'image' => '/images/home/promociones/promocion1.png', //TODO: hacerlo de BD
                'title' => 'Título 1',
                'description' => 'Descripción 1',
            ],
            [
                'image' => '/images/home/promociones/promocion1.png', //TODO: hacerlo de BD
                'title' => 'Título 2',
                'description' => 'Descripción 2',
            ],
            // Puedes agregar más datos según sea necesario
        ];

         //videos 
        $videosInstagram = $this->getVideoFirstTime($request);


        return Inertia::render('home', [
            'photosInstagram' =>  array_slice($photos, 0, $limit), 
            'videosInstagram' =>  $videosInstagram, 
            'userInstagram' => isset($username) ? $username : null,
            'carouselData' => $carouselDataPromo
        ]);

    }

    public function getInstagramData(Request $request) // Cargar mas imagenes
    {
        
        $limit = env('LIMIT_IMG_PAG_INSTAGRAM_MORE'); // Definir límite de resultados por página
        $after = $request->input('after');
        $photos = [];
        $paging = null; // Inicializar $paging con un valor nulo


        do {
            $client = new Client();
            $response = $client->get('https://graph.instagram.com/me/media', [
                'query' => [
                    'fields' => 'id,username,profile_picture_url,media_type,media_url,permalink',
                    'access_token' => env('INSTAGRAM_TOKEN'),
                    'after' => $after,
                    'limit' => $limit
                ]
            ]);
        
            $data = json_decode($response->getBody()->getContents(), true);

            // Filtrar solo las imágenes
            $images = array_filter($data['data'], function ($media) {
                return $media['media_type'] === 'IMAGE' || $media['media_type'] === 'CAROUSEL_ALBUM';
            });
            
            // Si hay imágenes, las agregamos al array de fotos
            if (!empty($images)) {
                $photos = array_merge($photos, $images);
            }
        
            // Obtener el nombre de usuario solo si es la primera página
            if ($after === null) {
                $username = isset($data['data'][0]['username']) ? $data['data'][0]['username'] : null;
            }

            // Establecer el token de paginación para la siguiente solicitud
            $after = isset($data['paging']['cursors']['after']) ? $data['paging']['cursors']['after'] : null;
            // Guardar la información de paginación
            if (isset($data['paging'])) {
                $paging = $data['paging'];
            }
            
        } while ($after !== null && count($photos) < $limit);

       

        return response()->json([
            'data' => array_slice($photos, 0, $limit),
            'paging' => $paging // Agregar la información de paginación al JSON de respuesta
        ]);

    }

    public function getVideoFirstTime($request){ // videos ppor primera vez, hacer un Servicio parae stro
        $limit = env('LIMIT_IMG_PAG_INSTAGRAM'); // Definir límite de resultados por página
        $after = $request->input('after');
        $videos = [];

        do {
            $client = new Client();
            $response = $client->get('https://graph.instagram.com/me/media', [
                'query' => [
                    'fields' => 'id,username,profile_picture_url,media_type,media_url,permalink',
                    'access_token' => env('INSTAGRAM_TOKEN'),
                    'after' => $after,
                    'limit' => $limit
                ]
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            // Filtrar solo las imágenes
            $images = array_filter($data['data'], function ($media) {
                return $media['media_type'] === 'VIDEO';
            });

            // Si hay imágenes, las agregamos al array de fotos
            if (!empty($images)) {
                $videos = array_merge($videos, $images);
            }

            // Obtener el nombre de usuario solo si es la primera página
            if ($after === null) {
                $username = isset($data['data'][0]['username']) ? $data['data'][0]['username'] : null;
            }

            // Establecer el token de paginación para la siguiente solicitud
            $after = isset($data['paging']['cursors']['after']) ? $data['paging']['cursors']['after'] : null;
        } while ($after !== null && count($videos) < $limit);


        return array_slice($videos, 0, $limit); 

    }

    public function getTheMostRequested(Request $request){
          // Obtener las imágenes de la base de datos o cualquier otra fuente de datos
          //$images = Image::all();

          if($request->input('type') == 0){
            $images = [
                [
                    'url' => '/images/home/pollos/pollos1.jpeg',
                    'alt' => 'Descripción de la imagen 1',
                    'media_type' => 'image'
                ],
                [
                    'url' => 'images/home/pollos/pollos2.jpeg',
                    'alt' => 'Descripción de la imagen 2',
                    'media_type' => 'image'
                ],
                [
                    'url' => 'images/home/pollos/pollos3.jpeg',
                    'alt' => 'Descripción de la imagen 3',
                    'media_type' => 'image'
                ]
            ];
          }

          if($request->input('type') == 1){
            $images = [
                [
                    'url' => '/images/home/carnes/carnesHome.jpg',
                    'alt' => 'Descripción de la imagen 1',
                    'media_type' => 'image'
                ],
                [
                    'url' => 'images/home/carnes/carnesHome.webp',
                    'alt' => 'Descripción de la imagen 2',
                    'media_type' => 'image'
                ]
               
            ];
          }

          if($request->input('type') == 2){
            $images = [
                [
                    'url' => '/images/home/gastronomia/gastronomia0.mp4',
                    'alt' => 'Descripción de la imagen 1',
                    'media_type' => 'video'
                    //order => 1 // cmapos en BD
                ],
                [
                    'url' => '/images/home/gastronomia/gastronomia1.jpeg',
                    'alt' => 'Descripción de la imagen 1',
                    'media_type' => 'image'
                ],
                [
                    'url' => '/images/home/gastronomia/gastronomia2.jpeg',
                    'alt' => 'Descripción de la imagen 2',
                    'media_type' => 'image'
                ],
                [
                    'url' => '/images/home/gastronomia/gastronomia3.jpeg',
                    'alt' => 'Descripción de la imagen 2',
                    'media_type' => 'image'
                ],
                [
                    'url' => '/images/home/gastronomia/gastronomia4.jpeg',
                    'alt' => 'Descripción de la imagen 2',
                    'media_type' => 'image'
                ],
                [
                    'url' => '/images/home/gastronomia/gastronomia5.jpeg',
                    'alt' => 'Descripción de la imagen 2',
                    'media_type' => 'image'
                ],
                [
                    'url' => '/images/home/gastronomia/gastronomia6.jpeg',
                    'alt' => 'Descripción de la imagen 2',
                    'media_type' => 'image'
                ],
                [
                    'url' => '/images/home/gastronomia/gastronomia7.jpeg',
                    'alt' => 'Descripción de la imagen 2',
                    'media_type' => 'image'
                ],
                [
                    'url' => '/images/home/gastronomia/gastronomia8.jpeg',
                    'alt' => 'Descripción de la imagen 2',
                    'media_type' => 'image'
                ],
                [
                    'url' => '/images/home/gastronomia/gastronomia9.jpeg',
                    'alt' => 'Descripción de la imagen 2',
                    'media_type' => 'image'
                ],
                [
                    'url' => '/images/home/gastronomia/gastronomia10.jpeg',
                    'alt' => 'Descripción de la imagen 2',
                    'media_type' => 'image'
                ]
               
            ];
          }

        // Array de imágenes
        

        // Convertir el array a JSON
       // $jsonResponse = json_encode($images);

          // Devolver las imágenes en formato JSON
        return response()->json($images);
    }

    public function event(){
        return Inertia::render('Events');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
