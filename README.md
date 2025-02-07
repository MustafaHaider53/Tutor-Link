# Tutor Link

Tutor Link is a platform designed to connect tutors with students seeking tuition. It offers features such as tutor registration, student registration, tuition listings, and user authentication.

## Project Overview

Tutor Link simplifies the process of finding and hiring tutors for students and parents. Key features include:
- Separate registration for tutors and students.
- Hourly rate management for tutors.
- Tuition listings with tutor information retrieved from the database.
- Role-based authentication for Admins, Teachers, and Students using Laravel's built-in functionality.

## Setup Instructions

### Prerequisites

- PHP (Version 8.0 or above)
- Composer
- XAMPP or any MySQL-compatible database
- Node.js (For frontend assets)
- Laravel Passport

### Steps to Set Up

Clone the repository:
```
git clone https://github.com/yourusername/tutorlink.git
```
```
cd tutorlink
```
Install dependencies:

```
 
composer install
npm install && npm run dev
Configure the environment:

```bash
 
cp .env.example .env
Update the .env file with your database credentials:

makefile
 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tutorlink
DB_USERNAME=root
DB_PASSWORD=yourpassword
Generate the application key:

```bash
 
php artisan key:generate
Run migrations and seed the database:

```bash
 
php artisan migrate --seed
Install Laravel Passport:

```bash
 
php artisan passport:install
Start the development server:

```bash
 
php artisan serve
Open your browser and visit:

```bash
 
http://127.0.0.1:8000


Usage Guide
Login and Registration
Students, Tutors, and Admins can register and log in using role-based buttons available on the homepage.
Each user type is redirected to a dashboard tailored to their role.
Tuition Listings
Tutors can add their profiles, including hourly rates.
Students can browse available tutors from the tuition listings page.
Admin Panel
Admins can manage students, tutors, and tuitions through the admin panel.
Key Features in Development
Improved search and filtering options for tuitions.
Integration of payment gateways for secure transactions.
Contributing
We welcome contributions! Please follow the steps below:

Fork the repository:

```bash
 
git clone https://github.com/yourusername/tutorlink.git
Create a feature branch:

```bash
 
git checkout -b feature-name
Commit your changes:

```bash
 
git commit -m 'Add feature-name'
Push to the branch:

```bash
 
git push origin feature-name
Open a pull request.

License
This project is licensed under the MIT License.

If you encounter any issues, feel free to open an issue in this repository.

vbnet
 

This version aligns with your preferred style. Let me know if you need further refinements!






