# Laravel Sample - Intermediate Task List
This sample project is based on [Intermediate Task List Tutorial](https://laravel.com/docs/5.2/quickstart-intermediate) with slight modification. This project provides an intermediate introduction to the Laravel framework and includes content on the following concepts:
- database migrations with foreign key constraints,
- the Eloquent ORM with relationship, 
- routing using HTTP verb,
- controller,
- authentication using Laravel authentication scaffolding,
- authorization using policies,
- input validation,
- dependency injection,
- simple repository pattern,
- pagination, and
- views using Blade templates.

This project sample a basic selection of Laravel features through simple task list application which we can use to track all of the tasks we want to accomplish. This typical "to-do" list example demonstrates how to do simple CRUD using Laravel and allow users to create accounts and authenticate with the application.

<kbd>
    <img alt="Preview" src="https://preview.ibb.co/hef0Ea/Fire_Shot_Capture_5_Laravel_Sample_Intermed_http_laravelsampleintermediatetasklist_dev_tasks.png" />
</kbd>

## Quick Installation
First, clone repo and install all dependencies.
```sh
$ git clone https://github.com/haryasa/laravel-sample-intermediate-task-list.git intermediate-task-list
$ cd intermediate-task-list
$ composer install
```
After that, setting up database config in `.env` file and then run migrate command.
```sh
$ php artisan migrate
```
You're ready to go! :)

## Other Laravel Sample
Check out also [Laravel Sample - Basic Task List](https://github.com/haryasa/laravel-sample-basic-task-list) repository for a basic introduction to the Laravel framework.