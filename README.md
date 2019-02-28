# Test task: simple user management app

### Brief description of the solution:
* Task was implemented using Yii2 framework. It's good for fast creating prototypes, but sometimes it doesn't follow few good OOP principles (such as Single responsibility)
* I did not create tests because it will take few more hours
* MySQL dump can be found in the /db folder, DB model in file db/database_schema.JPG
* Config files are under version control to show you the configuration. In actual development configs must be added to the .gitignore
* I did not implement authorization logic, login and logout, all functions are available even for guest user

### Domain model
* Application implements MVC pattern.
* Entry script for app initialization: /web/index.php
* User requests processed in controller classes located in the controllers folder
* Business logic and work with DB encapsulated in models (models folder)
* Interface elements are in the views folder

### Requirements
* PHP 7.1+
* MySQL 5.7
* Composer

### Installation
* Clone project from the repository
* Set up your local web server, document root must be the /web folder
* Create a database and import the dump from the /db folder
* Load dependencies using `composer install`
* Update config/db.php according to your database credentials

### How to use classes

You can easily operate entities in system because they extend Yii ActiveRecord class

```
// create and save a user
$user = new User();
$user->name = 'JohnDow';
$user->save();

// validating user attributes
$user->name = 'Hacker_'; // '_' symbol not allowed
$user->validate();
var_dump($user->getErrors()); // shows validation errors

// Query user from DB
// returns an object or NULL
$user = User::findOne(12); // by primary key
$user2 = User::find(['name' => 'Michael'])->one();

// deleting user
$anotherUser->delete();

// get an array of user's groups
$groups = $user->groups; // Yii shortcut for $user->getGroups()

// set groups for user
$user->groupIds = [1, 3]; // TODO: make a setter method
$user->save();

// creating a group
$newGroup = new UserGroup();
$newGroup->name = 'Superheroes';
$newGroup->save();

// get group's members
$users = $someGroup->users; // or $someGroup->getUsers()

// get members count
$membersCount = $someGroup->usersCount();
```