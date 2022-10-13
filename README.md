# Skygems

Skygems is a bundle of professionally packaged excellence-driven test and tutorial kits. It has features such as:

-   _Study:_ All necessary topics needed to pass Nigerian Universities’ entrance examinations, from O-levels to A-levels.

-   _Book Tutor:_ Finding it hard to study on your on? book a tutor from our team of outstanding scholars.

-   _Past Questions:_ Practice questions of several years that will adequately prepare you for the exam that you are preparing for.

-   _Progress:_ Track how well you are faring in your preparation for your next exam. See your cumulative grade point.

-   _Smart Subscriptions:_ Easily subscribe with your debit card without leaving your location.

# Getting Started

1. clone the repo on your local drive.
2. cd(change directory) into the the project folder. i.e ulearn.
3. Run `composer install` (on your terminal) to install the vendor files.
4. Run `cp .env.example .env` to copy the cotent of `.env.example` to `.env`
5. Replace the database information in `.env` file a
6. Run `php artisan migrate --seed` to migrate and seed the database with data.
7. Run `php artisan passport:install` to migrate and seed the database with data.
8. Run `php artisan serve` (on your terminal) to run the project.
9. When you make changes to the project, push to remote repo.

To work with API check [Documentation](https://www.postman.com/collections/6cbaefb7631813211002)
