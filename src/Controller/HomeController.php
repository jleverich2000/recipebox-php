<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use App\Entity\Search;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request)
    {
        $search = new Search();

        $form = $this->createFormBuilder($search)
            ->add('search', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Go'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        $search = $search->getSearch();
            return $this->redirectToRoute('results', array('search' => $search));
        }

        return $this->render('home/home.twig', array(
            'form' => $form->createView(),
        ));
    }
}
