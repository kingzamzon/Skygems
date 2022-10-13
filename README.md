# Skygems

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

To work with API check [Documentation](DOCUMENTATION.md)
