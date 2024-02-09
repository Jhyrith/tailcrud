# Laravel CRUD Demo using Tailwind/Blade/Breeze

This is a quick demo of CRUD functionality in Laravel

## Table of Contents

- [Laravel CRUD Demo using Tailwind/Blade/Breeze](#laravel-crud-demo-using-tailwindbladebreeze)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
  - [Usage](#usage)

## Installation

This repo uses Herd on PHP 8.1, so first we need to clone it to your Herd directory. 

```sh
cd ~/Herd;
git clone https://github.com/Jhyrith/tailcrud;
cd tailcrud;
composer install;
npm install;
cp .env.example .env
```

I've created a command to create the database for you automatically so now run 

```sh
php artisan db:create;
npm run build;
php artisan serve;
```
Basic testing available using
```sh
php artisan test
```
## Usage

Access the site at http://127.0.0.1:8000 (the link will be in the terminal)
