## Front-End for BrandoID's Back-End API.

### Please follow steps below to use this front-end on your server.

Install all the packages needed using composer, if you haven't install composer, you can get it on https://getcomposer.org.

    composer install
    
Copy the `.env.example` file and paste it on the same folder, then rename it to `.env`.

Edit the `.env` file and change the value of `APP_NAME` and `APP_URL`, then you can change the rest of the variables' value according to your need.

After that, generate a new key for the application.

    php artisan key:generate
    
After you finish all of that stuff, you already can use the application as a user.
