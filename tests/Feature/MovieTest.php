<?php

namespace Tests\Feature;

use App\Movie;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function unauth_cant_see_create_movie_button(){
        $this->get('/')
            ->assertStatus(200)
            ->assertDontSee('Create Movie');
    }

    /** @test */
    public function auth_user_can_see_create_movie_button(){
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        $this->get('/')
            ->assertStatus(200)
            ->assertSee('Create Movie');
    }

    /** @test */
    public function unauth_user_cant_see_create_movie_page(){
        $this->get('/movie/create')
            ->assertRedirect('/login');
    }

    /** @test */
    public function auth_user_can_see_create_movie_page(){
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        $this->get('/movie/create')
            ->assertStatus(200);
    }

    /** @test */
    public function unauth_user_cant_post_movie(){
        $this->post('movie', factory(Movie::class)->raw())
            ->assertStatus(302);
    }

    /** @test */
    public function auth_user_can_post_movie(){
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        $this->post('movie', factory(Movie::class)->raw())
            ->assertRedirect(route('movie.index'));
    }

    /** @test */
    public function movie_has_validation(){
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        $this->post('movie', [])
            ->assertSessionHasErrors('name');

        $this->post('movie', factory(Movie::class)->raw())
            ->assertRedirect(route('movie.index'));
    }
}
