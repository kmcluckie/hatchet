## Requirements

-   PHP 8.1
-   Mysql

## Setup (with Sail)

### Install composer packages

`composer install`

### Run Sail

`./vendor/bin/sail up -d`

### Migrate database

`sail artisan migrate`

### Seed database

`sail artisan db:seed`

### Compile assets

`sail npm run build`

## Usage

Navigate to `localhost` to use the frontend interface.

## Explanation

The two routes in use are the root (/) found in `routes/web.php` and the API endpoint (/locations), which is handled by the `LocationController`.

`LocationController` uses Laravel's pipelines to add filters to the DB query using parameters from the current request.

The UI is provided by the `App.vue` component, though it delegates table display to the `location-list` component.

To see the loading spinner adding a `sleep()` cal to the `LocationController` may be necessary.

Tests are available for the `LocationController`. Run with `sail artisan test`.

## Notes

-   I did not get to test my setup instructions from scratch. I hope they work!
-   Given how simple the task was, it would have been much simpler (and no great loss) to keep filter logic directly in the controller. However, I assumed that this would be a small part in a larger program, and so refactoring the filters to something more composable would be good. Given a little more time I would refactor the pipelines in the controller out to another class, so that the controller was not caring for that responsibility.
-   I would like to add some Vue tests but did not get time.
-   I added a 'Clear' button for UI completeness!
