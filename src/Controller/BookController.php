<?php

namespace App\Controller;

use App\Entity\Book;
use App\Service\BookService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    public function __construct(private readonly BookService $bookService)
    {
    }

    /**
     * @return JsonResponse
     */
    #[Route('/api/v1/books', name: 'api_v1_books_index', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $books = $this->bookService->findAll();

        return $this->json($books);
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     * @throws Exception
     */
    #[Route('/api/v1/books', name: 'api_v1_books_create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $book = $this->bookService->create($data);

        return $this->json($book);
    }

    /**
     * @param  Book  $book
     * @return JsonResponse
     */
    #[Route('/api/v1/books/{id}', name: 'api_v1_books_show', methods: ['GET'])]
    public function show(Book $book): JsonResponse
    {
        return $this->json($book);
    }

    /**
     * @param  Request  $request
     * @param  Book  $book
     * @return JsonResponse
     * @throws Exception
     */
    #[Route('/api/v1/books/{id}', name: 'api_v1_books_update', methods: ['PUT'])]
    public function update(Request $request, Book $book): JsonResponse
    {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $book = $this->bookService->update($book, $data);

        return $this->json($book);
    }

    /**
     * @param  Book  $book
     * @return Response
     */
    #[Route('/api/v1/books/{id}', name: 'api_v1_books_delete', methods: ['DELETE'])]
    public function delete(Book $book): Response
    {
        $this->bookService->delete($book);

        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
