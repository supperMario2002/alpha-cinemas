<p align="center"><a href="#g" target="_blank"><img src="./public/image/logo/logoFull.png" width="400" alt="Alpha Cinemas Logo"></a></p>


## About Alpha Cinemas

This web application enables users to easily book movie tickets online. Built using the Laravel framework for the backend and Vue.js for the frontend, the application comprises two main sections: a user-facing page for ticket booking and an admin page for managing bookings and movie information.

## Features
### User Page
1. **Browse Movies:** Users can view a list of available movies, including details such as title, genre, and showtimes.
2. **Seat Selection:** Users can choose their preferred seats for a particular showtime.
3. **User Authentication:** Secure user authentication ensures the protection of personal information.
4. **User Registration:** New users can register accounts to access personalized features and store their booking history.
5. **Booking Confirmation:** Users receive a confirmation of their booking, including details of the selected seats and ticket information.
6. **Payment Integration:** Users can securely pay for their booked tickets using various payment methods, such as credit cards, debit cards, or digital wallets.
7. **User profile:** Users can view and edit their profile information, including name, email, and password.
8. **Booking History:** Users have access to their booking history, allowing them to review past and upcoming bookings.

### Admin Page

1. **Movie Management:** Admin can add, edit, or delete movie information such as title, genre, and showtimes.
2. **Booking Management:** Admin has the authority to view and manage user bookings, including details of booked tickets and seat information.
3. **Room Management:** Admin can add, edit, or delete information about cinema rooms, including seating capacity.
4. **Showtime Management:** Admin can manage movie showtimes, including adding, editing, or deleting showtimes for each movie.
5. **Account Management:** Admin can view and manage user accounts, including the ability to reset passwords or deactivate accounts.

## Installation Guide

1. **System Requirements:**
- PHP 7.4
- Composer
- Node.js and npm
- MySQL

2. **Install Laravel:**
```sh
 composer install
 cp .env.example .env
 php artisan key:generate
 php artisan migrate
```

3. **Install Vue.js:**
``` sh
 npm install
```


## License

This project is licensed under the [MIT license](https://opensource.org/licenses/MIT).
