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

    /**
     * create an entry with incorrect email
     */
    public function testCreateEntryEmailValidation()
    {
        $faker = Factory::create();

        $body = [
            'name' => $faker->name,
            'email' => $faker->name,
            'message' => $faker->text,
        ];

        $response = $this->json('post', '/api/entries', $body);

        $response
            ->assertStatus(400)
            ->assertJsonStructure([
                'email',
            ])
            ->assertJson([
                'email' => ['The email must be a valid email address.'],
            ]);
    }

    /**
     * create an entry with mising field
     */
    public function testCreateEntryWithMissing()
    {
        $faker = Factory::create();

        $body = [
            'name' => $faker->name,
            'email' => $faker->email,
        ];

        $response = $this->json('post', '/api/entries', $body);

        $response
            ->assertStatus(400)
            ->assertJsonStructure([
                'message',
            ])
            ->assertJson([
                'message' => ['The message field is required.'],
            ]);
    }
}
