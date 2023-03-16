<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @param  ObjectManager  $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $book = new Book();
            $book->setTitle('Book ' . ($i + 1));
            $book->setAuthor('Author ' . ($i + 1));
            $book->setPublisher('Publisher ' . ($i + 1));
            $book->setGenre('Genre ' . ($i + 1));
            $book->setPublicationDate(new \DateTime('now'));
            $book->setWordCount(10000 * ($i + 1));
            $book->setPrice(10 * ($i + 1));
            $manager->persist($book);
        }

        $manager->flush();
    }
}
