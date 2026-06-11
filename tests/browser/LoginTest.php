
it('logs in a user',function(){
    $user = User::factory()->create(['password' => 'password123']);
    
    visit('/login')
    ->fill('email','john@example.com')
    ->fill('password','password123')
    ->click('@login-button')
    ->assertPathIs('/');

    $this->assertAuthenticated();
    expect(Auth::user())->toMatchArray([
        'name' => 'John doe',
        'email' => 'john@example.com'
    ]);

});