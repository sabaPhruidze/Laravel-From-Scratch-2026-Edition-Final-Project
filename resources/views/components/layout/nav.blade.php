<nav class="border-b border-border px-6">
    <div class="max-w-7xl mx-auto h-16 flex items-center justify-between">
        <div>
            <a href="/">
                <img src="images/logo.png" alt="logo" width="150" class="rounded-xl">
            </a>
        </div>
        <div class="flex gap-3 items-center">
            @auth
            <a href="/profile/edit">Edit Profile</a>
                <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Logout</button>
                </form>
            @endauth
            @guest
                <a href="/login">Sign in</a>
                <a href="/register" class="btn">Register</a>
            @endguest
        </div>
    </div>
</nav>