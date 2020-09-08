<?php

namespace Tests\Feature;

use App\Genre;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GenreTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function unauth_cant_see_create_genre_button(){
        $this->get(route('genre.index'))
            ->assertStatus(200)
            ->assertDontSee('Create Genre');
    }

    /** @test */
    public function auth_user_can_see_create_genre_button(){
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        $this->get(route('genre.index'))
            ->assertStatus(200)
            ->assertSee('Create Genre');
    }

    /** @test */
    public function unauth_user_cant_see_create_genre_page(){
        $this->get(route('genre.create'))
            ->assertRedirect('/login');
    }

    /** @test */
    public function auth_user_can_see_create_genre_page(){
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        $this->get(route('genre.store'))
            ->assertStatus(200);
    }

    /** @test */
    public function unauth_user_cant_post_genre(){
        $this->post(route('genre.store'), factory(Genre::class)->raw())
            ->assertStatus(302);
    }

    /** @test */
    public function auth_user_can_post_genre(){
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        $this->post(route('genre.store'), factory(Genre::class)->raw())
            ->assertRedirect(route('genre.index'));
    }

    /** @test */
    public function genre_has_validation(){
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        $this->post(route('genre.store'), [])
            ->assertSessionHasErrors('name');

        $this->post(route('genre.store'), factory(Genre::class)->raw())
            ->assertRedirect(route('genre.index'));
    }
}
