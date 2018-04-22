<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Recipe;
use App\Repository\RecipeRepository;

class ResultsController extends Controller
{
    /**
     * @Route("/results", name="results")
     */
    public function results(Request $request)
    {
        $searchTerm = $request->query->get('search');

        $searchResults = $this->getDoctrine()
        ->getRepository(Recipe::class)
        ->findAllByNameOrIngredient($searchTerm);

        return $this->render('results/results.twig', [
            'results' => $searchResults,
        ]);
    }
}
