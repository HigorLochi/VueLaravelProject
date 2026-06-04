# Vue/Laravel Application

A full-stack application built with Vue.js and Laravel to practice and demonstrate general software development concepts and architecture.

This project is currently under development, and more details will be added as new features are implemented.

## Technologies Used

- Vue.js
- Laravel
- MySQL
- Vite
- XAMPP (development environment)

## Prerequisites

Before running the project, install:

1. Node.js and npm  
   https://nodejs.org/en/download

2. XAMPP  
   https://www.apachefriends.org/pt_br/download.html

3. Composer  
   https://getcomposer.org/download/

## Installation

### Backend (Laravel)

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve