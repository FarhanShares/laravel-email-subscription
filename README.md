## Development
* I've used Laravel Herd along with DBngin for the local development.
* Please copy the example environment file first: cp .env.example .env
* Then connect with the database, please ensure the database table exists.
* I've attached a postman collection at root directory "./postman.json"
* Maybe MAIL_MAILER=log or Mailtrap config can be used to test it quickly.

## Implementation
* Migrations, seeders, factories, models, controllers all are in their respective places.
* Requests are used for dealing with user inputs and validations.
* Queue / Jobs, Command, Events, Listeners, Cache has been used.

## Command
* The command that sends new posts notification email to the subscribers only once is: "php artisan posts:notify-new"
* This command is also added to laravel scheduler (app/Console/Kernel.php), laravel scheduler should be running as a cron job or in local server: php artisan schedule:work

## Routes: only API routes are available
* Authentication or Authorization wasn't a requirement, skipped it entirely.
* That's why none of the routes are neither protected nor requires authorization.
* Related references: /routes/api.php


## Queued Notification
* PostCreated event is dispatched.
* SendNotificationForPost listens to the event.
* A job is queued to send the notifications to the subscribers.

* "SendNotificationsForNewPosts" will check for any posts that hasn't yet queued for sending notifications ($post->notified_at === null).
* Each new posts will be sent to the subscriber's email which are also queued in the background.

* The command is set to run every minute in the laravel scheduler (app/Console/Kernel.php)

* That's why the queue should be configured properly, and the cron job for the scheduler should be running.
