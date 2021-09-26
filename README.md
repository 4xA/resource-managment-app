# Resource Management App

## Local Environemnt Requirments

You will only need to have **Docker** installed. I built this app using **Docker** version: `20.10.8`.

## Deployment Instruction:

 1. run `./vendor/bin/sail up`
 2. copy `.env.example` and rename to `.env`
 3. run `./vendor/bin/sail composer install`
 4. run `./vendor/bin/sail artisan migrate`
 5. (optional) run `./vendor/bin/sail artisan db:seed` if you want to seed the app with random data
 6. run `./vendor/bin/sail artisan storage:link`
 7. (optional / have issues with frontend) run `./vendor/bin/sail npm run prod`
 8. make sure `.env` has the following variables set to the correct url:
    ```
    APP_URL=http://localhost
    MIX_APP_URL=http://localhost
    MIX_API_URL=http://localhost/api/v1
    ```
 9. open browser on [http://localhost/admin](http://localhost/admin) for admin page to create resources
 10. open browser on [http://localhost/](http://localhost/) for visitor page to view resources
