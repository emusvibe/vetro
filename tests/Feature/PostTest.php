<?php

namespace Tests\Feature;
use Tests\TestCase;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    use RefreshDatabase;

   
     /** @test */
    public function a_post_requires_a_title_and_body()
     {        
       $user = User::factory()->create();
       $this->actingAs($user); 
       $post = Post::factory()->raw(['title' => '', 'body' => '']);
       
       $this->post('/posts', $post)->assertSessionHasErrors('title', 'body');
     }

    /** @test */
    public function a_post_can_be_added()
    {      
      $this->withExceptionHandling();
      $user = User::factory()->create();
      $this->actingAs($user);      

      $response = $this->post('/posts', [
        'title' => 'Title 1',
        'body' => 'Title 2'
      ]);

      $this->assertTrue(count(Post::all()) > 0);      
    }
    
    /** @test */
    public function posts_can_be_viewed()
    {      
      $user = User::factory()->create();
      $this->actingAs($user);
      $response = $this->get('/posts');
      $response->assertStatus(200);             
    }

    /** @test **/     
    public function a_post_can_be_updated()
   {  
      $user = User::factory()->create();
      $this->actingAs($user);    

        $response = $this->post('/posts', [
          'title' => 'Title 1',
          'body' => 'Title 2'
                                  ]); 
        $post = Post::first()->update([
              'title' => 'New title',
              'body' => 'New body'
          ]);
    $this->assertEquals('New title', Post::first()->title);  
    $this->assertEquals('New body', Post::first()->body);   
 }    

  /** @test **/    
 public function a_post_can_be_deleted()
 {    
  $user = User::factory()->create();
  $this->actingAs($user);      

  $response = $this->post('/posts', [
    'title' => 'Title 1',
    'body' => 'Title 2'
  ]);

    $post = Post::first()->delete();    
    $this->assertCount(0, Post::all());  
 }
}
