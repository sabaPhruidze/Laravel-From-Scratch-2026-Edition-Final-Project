<?php

use Illuminate\Support\Facades\Auth;

it('registers a user',function(){
    visit('/register')
    ->fill('name','John doe')
    ->fill('email','john@example.com')
    ->fill('password','password123')
   ->click('Create account')
   ->assertPathIs('/'); // რეგისტრაციის შემდეგ უნდა გადავიდეთ მთავარ გვერდზე
   $this->assertAuthenticated();

   expect(Auth::user())-> toMatchArray([
    'name' => 'John doe',
    'email' => 'john@example.com',
   ]);
});