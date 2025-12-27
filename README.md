# Student Result Management System

A full-featured **Student Result Management System** built with **Laravel** (PHP framework) to manage student records, results, and admin operations for schools or colleges.

This system provides a user-friendly dashboard for administration tasks, student management, result entry, and printing reports.

---

##  Features

 Admin authentication and secure login  
 Dashboard with summary statistics  
 Add, update, delete student records  
 Add and manage exam results  
 View student details and result history  
 Print or preview student results  
 Organized using Laravel Blade templates

---

## Tech Stack

 **Backend:** Laravel (PHP)  
 **Frontend:** Blade, Bootstrap CSS  
 **Database:** MySQL  
 **Templating:** Laravel Blade  
 **AJAX:** For dynamic updates (e.g., billing or inline updates)


---

##  Setup & Installation

### 1. Clone the repository

```bash
git clone https://github.com/rankmeet7/StudentResult-Management-System.git

cd StudentResult-Management-System
```
### 2. Install dependencies
```bash
composer install
npm install
```
### 3. Environment setup
Create a copy of .env.example:

```bash
cp .env.example .env
```
Update the database configuration in .env:
```bash
DB_DATABASE=your_database
DB_USERNAME=your_user
DB_PASSWORD=your_password
```
Generate Laravel app key:

```bash
php artisan key:generate
```
### 4. Database
Create a MySQL database, then run:

```bash

php artisan migrate
php artisan db:seed
```

### Running the Application
Start the Laravel development server:

```bash

php artisan serve
```
