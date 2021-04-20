<?php

namespace Tests\Feature;

use App\User;
use App\RequestReply;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RequestReplySubmitApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        factory(User::class, 2)->create();
        $this->user1 = User::find(1);
        $this->user2 = User::find(2);
        $request_data = [
            'title' => 'Request Test',
            'contents' => '猫のイラストが欲しいです。',
        ];
        $this->request = $this->actingAs($this->user1)->json('POST', route('materialrequest.create'), $request_data);
        $product_data = [
            'productname' => 'test product',
            'alldot' => 100,
            'linedot' => 10,
            'uniquekey' => '202101011341568q452RN9',
            'ispublished' => false
        ];
        $this->product = $this->actingAs($this->user2)->json('POST', route('product.create'), $product_data);
    }

    /**
     * @test
     */
    public function submitRequestReply()
    {
        $opponent = 1;
        $request_id = $this->request->data->id;
        $product_id = $this->product->data->id;
        $response = $this->actingAs($this->user2)
            ->json('POST', route('request.reply', [
                'opponent_id' => $opponent,
                'request_id' => $request_id,
                'product_id' => $product_id,
                'comment' => '猫の絵です。どうぞ'
            ]),);
        $response->assertStatus(200)
            ->assertJsonFragment(["opponent_id" => $opponent]);
    }
}
