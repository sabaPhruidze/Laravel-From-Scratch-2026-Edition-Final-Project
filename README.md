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
