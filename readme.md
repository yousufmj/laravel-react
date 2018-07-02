# Laravel React App

## Summary
This is a simple form that was built using Laravel as an API backend along with react as the front end view
*What was done*
- A simple form that posts to the api
- A view where all entries can be viewed
- Tests for the Api
- Simple validations on the API
- Validations are displayed on the front end form aswel

*What could be impoved*
- Authentication on the view page
    - Login / JWT etc to ensure only the right peple can view
- Improve DB - have a user table that links to an entry table
- Improve Validations and sanitisations - only relying on Eloquent

## Set Up
- Clone Repo
- Run `composer install`
- Run `NPM install`
- Amend the .env file with DB credentials
- Run `npm run dev` - this complies all the JS
- Run `php artisan migrate` - this updates and creates database tables
- Run `php artisan serve` - to start the laravel app

## API
GET /api/entries - Views all entries

POST /api/entries - creates a new contact entry

DELETE /api/entries/{id} - deletes specific entry based on id

GET /api/entries/{id} - get specific entry

## Front End
Main Form can be viewed on the first page

To view all entries got to /view