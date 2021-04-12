# About Marketplace

Marketplace.com is a basic online selling platform powered by [Laravel](https://laravel.com/) at the back engine, [VueJs](https://vuejs.org/) at the front office and [TailwindCss](https://tailwindcss.com)

# Features

##### Login and Registration

Auth is powered by [Laravel Sanctum](https://laravel.com/docs/8.x/sanctum) which provides a featherweight authentication for Single Page Applications (SPAs).

##### Create Ads
This feature allow authenticated users to post Ads on the system

##### Search Ads
This feature allow user to search for ads by category e.g furniture or by title e.g sofa

## Local Installation
1. Clone this repo  
`git clone https://github.com/DesmondThema/laravel-vue-marketplace.git`
2. cd into project  
`cd laravel-vue-ecommerce`
3. Install composer  
`composer install`
4. Install NPM Dependencies  
`npm install`
5. Copy the .env.example file and rename it into the .env file  
`copy .env.example .env` 
6. Generate application key  
`php artisan key:generate  
`
7. Create database. 
Create an empty database for your project using the database tools you prefer (My favorite is SequelPro for mac). In the .env file fill in your database credentials
8. Migrate the database  
`php artisan migrate:fresh` 
9. Link Storage  
`php artisan storage:link` 
10. Create images folder 
In public directory, there's a new folder called storage, in storage folder create a new folder called `images`
11. Seed the database 
`php artisan db:seed` 
this will fill the database with dummy data for testing 
12. Build assets. 
12. `npm run dev`
13. Run the application  
`php artisan serve`  

## Uploading Ads 
- Click on `Post Free Ad` button, first time you will be redirected to login page, after you are logged in you can now post an add


## Extra Features
- Auth Login with Laravel Sanctum
- Ability to upload images
- Tailwind Purge Css
