<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SaveRecipeController extends Controller
{
    /**
     * @Route("/save-recipe", name="save-recipe")
     */
    public function saveRecipe(Request $request)
    {
        $recipe = new Recipe();

        $form = $this->createFormBuilder($recipe)
            ->add('title', TextType::class)
            ->add('ingredients', TextType::class)
            ->add('steps', TextType::class)
            ->add('prep_time', TextType::class)
            ->add('skill', TextType::class)
            ->add('method', TextType::class)
            ->add('catagory', TextType::class)
            ->add('meal', TextType::class)
            ->add('season', TextType::class)
            ->add('active', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Save'))
            ->getForm();

        $form->handleRequest($request);

        return $this->render('home/home.twig', array(
            'form' => $form->createView(),
        ));
    }
}
