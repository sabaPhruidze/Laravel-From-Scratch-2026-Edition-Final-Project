<?php

use App\Models\User;

it('creates a new idea', function () {
    $this->actingAs($user = User::factory()->create());
    visit('/ideas')
        ->click('@create-idea-button')
        ->fill('title', 'Some example Title')
        ->click('@button-status-completed')
        ->fill('description', 'An example description')
        ->click('Create')
        ->assertPathIs('/ideas');

    $idea = $user->ideas()->first();

    expect($idea)->not->toBeNull();
    expect($idea->title)->toBe('Some Example Title');
    expect($idea->status->value)->toBe('completed');
    expect($idea->description)->toBe('An example description');
});
