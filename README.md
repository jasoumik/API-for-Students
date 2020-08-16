<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About This API

Hello,
The Task list is given below:

Created a simple web API using Laravel framework for the student course registration process where A student can successfully register courses and drop courses if he/she wants. Showed all students, courses and also show taken courses of a specific student. The application can also create students, courses and modify student information.


Used Tech:PHP, Laravel 6, Passport, Pivot(For Many to many Relationship)


Endpoints I have used:

For user Reg: http://127.0.0.1:8000/api/register 
User Login: http://127.0.0.1:8000/api/login

1.	API must have an endpoint to create a student=>http://127.0.0.1:8000/api/v1/students
2.	API must have an endpoint to view all students.=> http://127.0.0.1:8000/api/v1/students
3.	API must have an endpoint to update a student=>http://127.0.0.1:8000/api/v1/students/{id}.
4.	API must have an endpoint to create a course=>http://127.0.0.1:8000/api/v1/courses
5.	API must have an endpoint to view all courses.=> http://127.0.0.1:8000/api/v1/courses
6.	API must have an endpoint to register a course=>http://127.0.0.1:8000/api/v1/students/{id}/courses
7.	API must have an endpoint to drop a course=>http://127.0.0.1:8000/api/v1/students/{id}/courses
8.	API must have an endpoint to view taken courses of a specific student=>http://127.0.0.1:8000/api/v1/students/{id}/courses

