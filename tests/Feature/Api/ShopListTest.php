<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShopListTest extends TestCase
{
    use RefreshDatabase;
    
    private function seeding()
    {
    $product1 = ['product_name' => 'chocolate'] ;
    $product2 = ['product_name' =>'milk'];
    $product3 = ['product_name' => 'bread'];
        $this->post(route('apiStore'), $product1);
        $this->post(route('apiStore'), $product2);
        $this->post(route('apiStore'), $product3);
    }
    
    public function test_can_get_shop_list(): void
    {
        $this->seeding();
        $this->get(route('apiIndex'))
            ->assertStatus(200);
    }

    public function test_can_show_shop_list(){
        $this->seeding();
        $this->get(route('apiShow', 1))
            ->assertStatus(200);
    }
    public function test_can_create_shop_list(): void
    {
        $data = [
            'product_name' => 'chocolate',
        ];

        $this->post(route('apiStore'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }
    public function test_can_Update_shop_list(){
        $this->seeding();

        $this->put(route('apiUpdate', 1), ['product_name' => 'coco'])
            ->assertStatus(200);
    }
    
    public function test_can_delete_shop_list(){
        $this->seeding();
        $this->delete(route('apiDestroy', 1))
            ->assertJson([]);
    }
}
