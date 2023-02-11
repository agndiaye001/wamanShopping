<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;

class CategoryController extends AbstractController
{
    /**
     * @Route("/categories", name="app_category")
     */
    public function index(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/categories/{id}", name="categories_show")
     */
    public function show(int $id, CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->findOneById($id);

        return $this->render('category/show.html.twig', [
            'category' => $category,
        ]);
    }
}
