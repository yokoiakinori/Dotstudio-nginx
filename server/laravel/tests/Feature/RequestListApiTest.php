<?php

namespace Tests\Feature;

use App\MaterialRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RequestListApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function AllRequestsListReturn()
    {
        factory(MaterialRequest::class, 5)->create();

        $response = $this->json('GET', route('materialrequest.all'));

        $material_requests = MaterialRequest::with('user')->orderBy('created_at', 'desc')->get();

        $expected_data = $material_requests->map(function ($material_request) {
            return [
                'title' => $material_request->title,
                'contents' => $material_request->contents,
                'user' => [
                    'name' => $material_request->user->name
                ],
            ];
        })
            ->all();

        $response->assertStatus(200)
            ->assertJsonCount(5, $expected_data);
    }
}
