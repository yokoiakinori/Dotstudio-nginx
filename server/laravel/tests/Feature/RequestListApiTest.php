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
        $request_count = 5;
        factory(MaterialRequest::class, $request_count)->create();

        $response = $this->json('GET', route('materialrequest.all'));

        $response->assertStatus(200)
            ->assertJsonCount($request_count, 'data');
    }
}
