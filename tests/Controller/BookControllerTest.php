<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @coversDefaultClass \App\Controller\BookController
 */
class BookControllerTest extends WebTestCase
{
    /**
     * @covers ::index
     */
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/v1/books');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * @covers ::create
     */
    public function testCreate(): void
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/v1/books',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'title' => 'The Great Gatsby',
                'publisher' => 'Scribner',
                'author' => 'F. Scott Fitzgerald',
                'genre' => 'Novel',
                'publication_date' => '1925-04-10',
                'word_count' => 47000,
                'price' => 12.99,
            ])
        );

        $this->assertEquals(201, $client->getResponse()->getStatusCode());
    }

    /**
     * @covers ::show
     */
    public function testShow(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/v1/books/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * @covers ::update
     */
    public function testUpdate(): void
    {
        $client = static::createClient();
        $client->request(
            'PUT',
            '/api/v1/books/1',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'title' => 'The Great Gatsby',
                'publisher' => 'Scribner',
                'author' => 'F. Scott Fitzgerald',
                'genre' => 'Novel',
                'publication_date' => '1925-04-10',
                'word_count' => 47000,
                'price' => 14.99,
            ], JSON_THROW_ON_ERROR)
        );

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * @covers ::delete
     */
    public function testDelete(): void
    {
        $client = static::createClient();
        $client->request('DELETE', '/api/v1/books/1');

        $this->assertEquals(204, $client->getResponse()->getStatusCode());
    }
}
