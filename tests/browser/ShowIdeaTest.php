<?php

use App\Models\Idea;
use App\Models\User;

it('requires authentification',function(){
    $idea = Idea::factory()->create();
    $this->get(route('ideas.show',$idea))->assertRedirectToRoute('login');
});
it('disallows accessing an idea you did not create', function (): void {
    $user = User::factory()->create();
    $owner = User::factory()->create();

    $idea = Idea::factory()->for($owner)->create();

    $this->actingAs($user)
        ->get(route('ideas.show', $idea))
        ->assertForbidden();
});