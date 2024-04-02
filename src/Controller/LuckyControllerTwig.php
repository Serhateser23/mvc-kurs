<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerTwig extends AbstractController
{
    #[Route("/lucky", name: "lucky_number")]
    public function number(): Response
    {
        $number = random_int(0, 100);

        $images = [
            'build//images/january.jpg',
            'build//images/february.jpg',
            'build//images/march.jpg',
            'build//images/april.jpg',
            'build//images/may.jpg',
            'build//images/june.jpg',
            'build//images/july.jpg',
            'build//images/august.jpg',
            'build//images/september.jpg',
            'build//images/october.jpg',
            'build//images/november.jpg',
            'build//images/december.jpg'
        ];

        $randomImage = $images[array_rand($images)];

        $data = [
            'number' => $number,
            'randomImage' => $randomImage
        ];

        return $this->render('lucky_number.html.twig', $data);
    }
    #[Route("/", name: "home")]
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }

    #[Route("/about", name: "about")]
    public function about(): Response
    {
        return $this->render('about.html.twig');
    }
    #[Route("/redovisning", name: "redovisning")]
    public function redovisning(): Response
    {
        return $this->render('redovisning.html.twig');
    }
    
}