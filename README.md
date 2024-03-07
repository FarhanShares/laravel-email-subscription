## Implementation
* Migrations, seeders, factories, models, controllers all are in their respective places
* Requests are used for dealing with user inputs and validations
* Queue / Jobs, Command, Event, Listeners, Cache has been used.

* Maybe MAIL_MAILER=log or Mailtrap config can be used to test it quickly.
* The command should be running in each minute as a cron job: "php artisan posts:notify-new"

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
