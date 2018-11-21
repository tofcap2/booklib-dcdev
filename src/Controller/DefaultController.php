<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Book;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 * @Route("/default")
 */
class DefaultController extends BaseController
{
    /**
     * @Route("/{nom}", name="default", methods={"GET"})
     */
    public function index(string $nom, Request $request)
    {
        $author = $this->getDoctrine()->getRepository(Author::class)->findOneBy(["lastname" => $nom]);

        if(!$author){
            throw $this->createNotFoundException("Auteur introuvable!");
        }

        return $this->render("default/index.html.twig", ["author" => $author]);
    }
    /**
     * @Route("/book/{slug}", name="show-book")
     */
    public function showBook(Book $book)
    {
        return new Response($book->getTitle());
    }
}
