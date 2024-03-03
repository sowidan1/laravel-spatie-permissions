# Laravel Spatie Permissions - Multi-Guard Authentication and Authorization

[![License](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)

## Overview

laravel-spatie-permissions is a Laravel project that utilizes the Spatie Permissions package for implementing multi-guard authentication and authorization. This project is designed to provide a secure and flexible authentication and authorization system for both admin and user APIs.

## Features

- Multi-guard authentication for admins and users
- Role-based access control using Spatie Permissions
- API endpoints for user and admin functionalities

## Requirements

- PHP >= 7.4
- Laravel >= 10
- Composer installed

## Installation

1. Clone the repository:

   ```bash
   git clone [[repository_url](https://github.com/sowidan1/laravel-spatie-permissions)]
   
Install dependencies:
composer install

Configure your environment variables:
cp .env.example .env
php artisan key:generate
Update the .env file with your database credentials, and other configuration settings.

Run migrations and seed the database:
php artisan migrate --seed


Feel free to customize this template based on your project's specific requirements and structure.
