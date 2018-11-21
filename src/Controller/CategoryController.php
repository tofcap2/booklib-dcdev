<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryController
 * @package App\Controller
 * @Route("/Category")
 */
class CategoryController extends BaseController
{
    /**
     * @Route("/show/{id}", name="category_show")
     */
    public function show(Category $category)
    {
        return $this->render('category/show.html.twig', ['category' => $category]);
    }
}
