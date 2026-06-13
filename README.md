# SETUP

- forge.laravel.com registration for server
- > pint for fomratting
- "format":["vendor/bin/pint"],in script where it formats when written **npm run format**
- Rector is PHP automatic refactoring tools. we write code , it upgrades , by adding types. It is good for refactoring and upgrade
  installation : **composer require rector/rector --dev** => than I have to add configuration by running code _vendor/bin/rector_ and than write yes
- also we *https://github.com/driftingly/rector-laravel* install this **composer require --dev driftingly/rector-laravel** installed by this . This is a rector -laravel extenshion

1. ამატებს Type Hint-ებს (int, string, User)
2. ამატებს Return Type-ებს
3. ძველ Laravel/PHP კოდს ახალ სინტაქსზე გადაყავს
4. Laravel-ის ვერსიის განახლებისას საჭირო ცვლილებებს ავტომატურად აკეთებს
5. ზოგიერთ შემთხვევაში Facade-ებს Dependency Injection-ით ანაცვლებს
6. ზედმეტ dd() და dump()-ებს შლის

- pint makes visually better code
- rector changes the code and makes it new
  **composer run format** by this both code will run
- CodeRabbit არის AI code reviewer (priced)
- installed laravel boost

# Design Your Model Layer

- creating model Idea
- donwloaded mySQL database and connected to the project
- added comuns in ideas table
- configure global Eloquent model settings in AppServiceProvider
- Added Idea model casts for links and status, created an IdeaStatus enum to manage allowed status values safely, and added a label method to display readable status text in the UI.
- Added relationships to the Idea model so each idea belongs to one user and can have many steps.
- In idea factory wrote 4 columns fake values for test
- made a test using factory and added fifth column with initial status

# Tailwind Theme Setup And Initial UI

- created beforehand btn and form css as well as imported them in app.css
- created layout and nav bar
- wrote initial routes of register and login
- created register page
- refactored register page
- finished login page
- did validation on register
- Not writing bcrypt ,because in User model it is already written
- added middleware on login ,register and log out buttons
- wrote code for log out
- did validation on register

# Browser Testing Registration Forms With Pest

- **composer require pestphp/pest --dev --with-all-dependencies**
- **vendor\bin\pest --init**
- **composer require pestphp/pest-plugin-browser:^4.0 --dev**
- **npm install playwright@latest**
- **npx playwright install**
- By all this installed Pest and now testing code in RegisterTest
- php artisan test tests\Browser\RegisterTest.php checking here
- tested login , logout and register

# Flash Messaging and Interactivity with AlpineJS

- flash messages is a short message f.e you succesfully logged in or something like that. it only exists on **next request** so it will appeal only after login and on refresh it will dissapear
- Alpinejs is used for making message dissapear when necessary . React and vue is bigger than alpinejs . This is a javascript library better than jquery
- Added a session flash message after successful login. When the user logs in successfully, the application redirects them to the intended page and displays a one-time success message: "You are now logged in.
- **npm install alpinejs**
- did data banding using alpinejs
- using alpine.js the message will appeal immediatelly when someone logs in and will dissapear in 3 seconds

# Idea Cards

- corrected possible issues
- homepage what redireted to /idea page
- used middleware for pages that must be shown after authentification
- created Idea controller for index to display
- created card component and styled it
- learned how to add already created classes additional classes using .=

# Idea Filtering
