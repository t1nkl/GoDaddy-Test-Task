<?php

namespace App\Service;

use App\Entity\Book;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

readonly class BookService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->entityManager->getRepository(Book::class)->findAll();
    }

    /**
     * @param  array  $data
     * @return Book
     * @throws Exception
     */
    public function create(array $data): Book
    {
        $book = new Book();
        $book->setTitle($data['title']);
        $book->setPublisher($data['publisher']);
        $book->setAuthor($data['author']);
        $book->setGenre($data['genre']);
        $book->setPublicationDate(new DateTime($data['publication_date']));
        $book->setWordCount($data['word_count']);
        $book->setPrice($data['price']);

        $this->entityManager->persist($book);
        $this->entityManager->flush();

        return $book;
    }

    /**
     * @param  int  $id
     * @return Book|null
     */
    public function find(int $id): ?Book
    {
        return $this->entityManager->getRepository(Book::class)->find($id);
    }

    /**
     * @param  Book  $book
     * @param  array  $data
     * @return Book
     * @throws Exception
     */
    public function update(Book $book, array $data): Book
    {
        $book->setTitle($data['title']);
        $book->setPublisher($data['publisher']);
        $book->setAuthor($data['author']);
        $book->setGenre($data['genre']);
        $book->setPublicationDate(new DateTime($data['publication_date']));
        $book->setWordCount($data['word_count']);
        $book->setPrice($data['price']);

        $this->entityManager->flush();

        return $book;
    }

    /**
     * @param  Book  $book
     * @return void
     */
    public function delete(Book $book): void
    {
        $this->entityManager->remove($book);
        $this->entityManager->flush();
    }
}
