<?php

use App\Models\Idea;
use App\Models\User;

it('shows the initial input state',function(){
      $this->actingAs($user = User::factory()->create());
    $idea = Idea::factory()->for($user)->create();
     visit(route('ideas.show',$idea))
     ->click('@edit-idea-button')
     ->assertValue('title',$idea->title)
     ->assertValue('description',$idea->description)
     ->assertValue('status',$idea->status);
});

it('creates a new idea', function (): void {
    $this->actingAs($user = User::factory()->create());
    $idea = Idea::factory()->for($user)->create();
    visit('/ideas')
        ->click('@create-idea-button')
        ->fill('title', 'Some example Title')
        ->click('@button-status-completed')
        ->fill('description', 'An example description')
        ->fill('@new-link', 'https://laracasts.com')
        ->click('@submit-new-link-button')
        ->fill('@new-step', 'Do a thing')
        ->click('@submit-new-link-button')
        ->fill('@new-step', 'Do a thing')
        ->click('@submit-new-link-button')
        ->click('Create')
        ->assertPathIs('ideas/show', [$idea]);

    $idea = $user->ideas()->first();

    expect($idea)->not->toBeNull();
    expect($idea->title)->toBe('Some Example Title');
    expect($idea->status->value)->toBe('completed');
    expect($idea->description)->toBe('An example description');
    expect($idea->link)->toBe(['https://laracasts.com', 'https://laravel.com']);
    expect($idea->steps)->toHaveCount(2);
});
