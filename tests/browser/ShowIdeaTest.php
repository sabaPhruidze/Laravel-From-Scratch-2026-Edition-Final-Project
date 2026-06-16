<?php

use App\Models\Idea;
use App\Models\User;

it('requires authentification',function(){
    $idea = Idea::factory()->create();
    $this->get(route('ideas.show',$idea))->assertRedirectToRoute('login');
});
it('disallows accessing an idea you do not create',function(){
     $user = User::facotry()->create();
     $idea = Idea::factory()->create();
     $this->get(route('ideas.show',$idea))->assertForbidden();
});