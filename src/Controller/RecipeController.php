<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Recipe;
use App\Repository\RecipeRepository;

class RecipeController extends Controller
{
    /**
     * @Route("/recipe", name="recipe")
     */
    public function recipe(Request $request)
    {

        $recipeId = $request->query->get('recipeId');
        $recipes = $this->getDoctrine()
        ->getRepository(Recipe::class)
        ->findRecipeById($recipeId);

        return $this->render('recipe/recipe.twig', [
            'recipe_name' => $recipes[0]['title'] ,
            'recipe_ingredients' => json_decode($recipes[0]['ingredients']),
            'recipe_steps' => $recipes[0]['steps'] ,
            'recipe_method' => $recipes[0]['method'] ,


            // 'recipe_name' => $recipes[$recipeId]['title'] ,
            // 'recipe_ingredients' => json_decode($recipes[$recipeId]['ingredients']),
            // 'recipe_steps' => $recipes[$recipeId]['steps'] ,
            // 'recipe_method' => $recipes[$recipeId]['method'] ,

        ]);
    }
 
//     /**
//  * @Route("/recipe/{id}", name="recipe_show")
//  */
// public function showAction($id)
// {
//     $recipe = $this->getDoctrine()
//         ->getRepository(Recipe::class)
//         ->find($id);

//     if (!$recipe) {
//         throw $this->createNotFoundException(
//             'No recipe found for id '.$id
//         );
//     }

//     return $this->render('recipe/recipe.twig', [
//         'Title' =>  $recipe->getTitle,
//     ]);
// }
}
