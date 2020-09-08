<?php

namespace Tests\Feature;

use App\Actor;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActorTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function unauth_cant_see_create_actor_button(){
        $this->get(route('actor.index'))
            ->assertStatus(200)
            ->assertDontSee('Create Actor');
    }

    /** @test */
    public function auth_user_can_see_create_actor_button(){
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        $this->get(route('actor.index'))
            ->assertStatus(200)
            ->assertSee('Create Actor');
    }

    /** @test */
    public function unauth_user_cant_see_create_actor_page(){
        $this->get(route('actor.create'))
            ->assertRedirect('/login');
    }

    /** @test */
    public function auth_user_can_see_create_actor_page(){
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        $this->get(route('actor.store'))
            ->assertStatus(200);
    }

    /** @test */
    public function unauth_user_cant_post_actor(){
        $this->post(route('actor.store'), factory(Actor::class)->raw())
            ->assertStatus(302);
    }

    /** @test */
    public function auth_user_can_post_actor(){
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        $this->post(route('actor.store'), factory(Actor::class)->raw())
            ->assertRedirect(route('actor.index'));
    }

    /** @test */
    public function actor_has_validation(){
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        $this->post(route('actor.store'), [])
            ->assertSessionHasErrors('name');

        $this->post(route('actor.store'), factory(Actor::class)->raw())
            ->assertRedirect(route('actor.index'));
    }
}
