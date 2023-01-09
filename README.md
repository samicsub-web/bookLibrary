

## About Samic Book Rental

-- It is a book rental app

## Instructions
1. run composer install to generate depedencies in vendor folder
2. change .env.example to .env
3. run php artisan key:generate
4. configure .env
5. Add your db credentials



## Note
1. Please check your environment as this project uses laravel 9 

2.  You might get this error 'Vite manifest not found at:' 
   1. Run npm install

   2. npm run dev --> this will create the vite manifest

   3. php artisan serve

3. You can create a user from the registration page and login
4. Make sure you use 'php artisan serve' so that your domain is 'http://127.0.0.1:8000/' because of the payment redirection works.


## Credentials

   ## Admin
   - Email: admin@example.com
   - Password: password

   ## User
   - Email: user@example.com
   - Password:Password

## Features
1. Gates for role
2. Registration creates users
3. User can only view book details after it has been approved
4. User cannot request a book already requested.