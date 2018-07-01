<?php

namespace Tests\Feature;

use Faker\Factory;
use Tests\TestCase;

class EntriesApiTest extends TestCase
{
    /**
     * Test All entries
     */
    public function testGetAllEntries()
    {
        $response = $this->json('Get', '/api/entries');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'results' => [
                    [
                        "id",
                        "name",
                        "email",
                        "message",
                        "created_at",
                        "updated_at",
                    ],
                ],
            ]);
    }

    /**
     * create an entry
     */
    public function testCreateEntry()
    {
        $faker = Factory::create();

        $body = [
            'name' => $faker->name,
            'email' => $faker->email,
            'message' => $faker->text,
        ];

        $response = $this->json('post', '/api/entries', $body);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'results' => [
                    "name",
                    "email",
                    "message",
                    "created_at",
                    "updated_at",
                    "id",
                ],
            ]);
    }
}
