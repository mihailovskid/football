## Darko Mihailovski - Laravel Football Application


To test this application it is necessary to install the application by typing the command:

`composer install`

In the .env file you need to enter your information from the database

```
- DB_CONNECTION=
- DB_HOST=
- DB_PORT=
- DB_DATABASE=
- DB_USERNAME=
- DB_PASSWORD=
```

Run the next command to create the database tables:

`php artisan migrate`

To fill the database run the next command:

`php artisan db:seed`

To login to the application use the next credentials:

### Administrator:
```
Username: admin
Password: admin1234
```

### Regular User:
```
Username: user
Password: user1234
```
### Cron job
To test the cron job, it is necessary in app\Console\Kernel.php to change the function

 `daily(); in everyMinute();`
 
  and type the command in the terminal

`php artisan schedule:run`

will add results to all matches that were played on yesterday's and today's date.
