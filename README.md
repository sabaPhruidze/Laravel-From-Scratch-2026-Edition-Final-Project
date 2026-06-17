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

- added route through query to filter with status
- added revelant buttons for filter
- refactored index page to be written less code
- will add a counter of how many ideas is there by the status
- wrote logic for filtering and writing count of each status. especially what to show when concrete status has 0 idea
- in case status is something different from enum I wrote code for it

# Show A Single Idea

- created show page, for individual ideas
- added arrow icon
- added edit and delete button
- created form for delete button and relevant logic
- added all information on each page
- make sure it will display 2 or more links

# Create A Functional Modal With AlpineJS

- made one card in index to be button
- created modal and it open's on click
- using alpinejs make modal animated
- added removing of modal by clicking outside the modal or on esc
- before modal would pop up every start and on refresh only few milliseconds,it's corrected by writing **style="display:none"**
- refactored modal and added relevant attributes for accesability

# Construct The Idea Form

- create a route of idea store
- added form for adding ideas in index page
- added close icon
- designed the modal for creating
- added creating button and both close and create buttom works
- latest data will be shown on top

# Test The Create Idea Form

- add test attribute on 2 places and mainly will test index component
- added style and functionally working using alpinejs
- added link removing button
- tested in createIdeaTest how it works

# Actionable Steps

- copied the link part in index and wrote same for steps
- alpine.js devtools
- actions will be with an checkbox so done or not will be written there

# Upload Featured Images To Storage

- index: added uploading input
- image after uploading is saved in storage/app/ideas
- each image will have unique name
- shows in database that the image is added
- storage is not accessable by the public folder
- **php artisan storage:link** created sibling of storage in public folder
- displays image when we have in cards of idea ,on individual page
- displays image on cards list

# action classes

- goal is to make much readable the store part of ideacontroller
- create action folder inside the app folder where I created CreateIdea file and moved store logic to there
- wrote 2 versions of working the CreateIdea file
- corrected IdeaTest file so now it shows the error for actions

# Authorization Is A Requirement

- added gate in ideaController and wrote method of it in ideapolicy
- tried couple of ways how to write f.e using middleware

# The Edit Idea Modal

- IdeaTest file will consist code beforehand to check if there is an issue
- refactored modal part,because same has to be used in create and change path
- now in modal it correctly distingusish edit and create idea
- made sure that input will display the value from attribute on title, description and on status as well
- displayed on edit part the image and added remove button (problem how to use form inside the form)
- added gate on image path removing
- delete image works

# Update Idea Action

- corrected update test
- updated modal and in updateIdea when there is a new idea step we remove old's and add news again which is simplier than finding which to stay and which to remove
- moved ideaTest into new folder idea and created 2 similar idea test for create and for update

# Edit Your Profile

- created new route /profile/edit
- Moved register but changed few things
- Currently will display current values like current name and email
- password has to be done differently since it automatically uses hashing
- added update and edit methods and changed the rpoute
