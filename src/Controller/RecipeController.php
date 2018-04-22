<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Recipe;
use App\Repository\RecipeRepository;

class RecipeController extends Controller
{
    /**
     * @Route("/recipe", name="recipe")
     */
    public function recipe()
    {
        $recipeId = 0;


        $recipes = $this->getDoctrine()
        ->getRepository(Recipe::class)
        ->findAll();

        return $this->render('recipe/recipe.twig', [
            'recipe_name' => $recipes[$recipeId]['title'] ,
            'recipe_ingredients' => json_decode($recipes[$recipeId]['ingredients']),
            'recipe_steps' => $recipes[$recipeId]['steps'] ,
            'recipe_method' => $recipes[$recipeId]['method'] ,

        ]);
    }
 /**
     * @Route("/recipe", name="recipe")
    //  */
    // public function index()
    // {
    //       // you can fetch the EntityManager via $this->getDoctrine()
    //     // or you can add an argument to your action: index(EntityManagerInterface $entityManager
    //     $entityManager = $this->getDoctrine()->getManager();

    //     $recipe = new Recipe();
    //     $recipe->setTitle('Keyboard');
    //     $recipe->setIngredients('Keyboard');
    //     $recipe->setSteps('Keyboard');
    //     $recipe->setPrepTime(30);
    //     $recipe->setMethod('Keyboard');
    //     $recipe->setCatagory('Keyboard');
    //     $recipe->setMeal('Keyboard');
    //     $recipe->setSeason('Keyboard');
    //     $recipe->setActive(1);

    //     // tell Doctrine you want to (eventually) save the Product (no queries yet)
    //     $entityManager->persist($recipe);
       
    //     // actually executes the queries (i.e. the INSERT query)
    //     $entityManager->flush();

    //     return $this->render('recipe/recipe.twig', [
    //         'controller_name' => 'RecipeController',
    //     ]);
    // }
    /**
 * @Route("/recipe/{id}", name="recipe_show")
 */
public function showAction($id)
{
    $recipe = $this->getDoctrine()
        ->getRepository(Recipe::class)
        ->find($id);

    if (!$recipe) {
        throw $this->createNotFoundException(
            'No recipe found for id '.$id
        );
    }

    return $this->render('recipe/recipe.twig', [
        'Title' =>  $recipe->getTitle,
    ]);

    // or render a template
    // in the template, print things with {{ product.name }}
    // return $this->render('product/show.html.twig', ['product' => $product]);
}
}
