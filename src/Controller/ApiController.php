<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api/', name: 'api_index')]
    public function index(): Response
    {
        $routes = [
            'Quote of the Day' => '/api/quote',
            // Lägg till fler API-routes här som key => value par
        ];
        $data = [
            'routes' => $routes
        ];

        return $this->render('api/index.html.twig', $data);
    }
    #[Route('/api/quote', name: 'api_quote')]
    public function quote(): JsonResponse
    {
        $quotes = [
            "Livet är vad som händer när du är upptagen med att göra andra planer." => "John Lennon",
            "Inte alla som vandrar är vilse." => "J.R.R. Tolkien",
            "Det bästa sättet att förutsäga framtiden är att uppfinna den." => "Alan Kay",
        ];
        $keys = array_keys($quotes);
        $randomKey = $keys[array_rand($keys)];
        $quote = [
            'quote' => $randomKey,
            'author' => $quotes[$randomKey]
        ];

        $response = [
            'quote' => $quote,
            'date' => date('Y-m-d'),
            'timestamp' => date('H:i:s')
        ];

        return new JsonResponse($response);

    }

}