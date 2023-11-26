<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\UserRepository;

class CountryController extends AbstractController
{
    #[Route('/country', name: 'app_country')]
    public function index(): Response
    {
        return $this->render('country/index.html.twig', [
            'controller_name' => 'CountryController',
        ]);
    }

     #[Route('/user-country', name: 'app_user_country_index', methods: ['GET'])]
    public function getUserCountry(UserRepository $userRepository): Response
    {
      
      // print_r($userRepository);

       return $this->json($userRepository->findCountryUserById(9));  
    }
}
