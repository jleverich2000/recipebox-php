<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Recipe;
use App\Repository\RecipeRepository;

namespace App\Service;

class RecipeService
{
  public function save(array $recipeData){
  $searchResults = $this->getDoctrine()
  ->getRepository(Recipe::class)
  ->saveStuff($recipeData);
  }
}