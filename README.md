# Train Tickets Booking System

A simple Laravel-based train booking application with user registration, login, train management, and a polished UI.

## Features

- User registration and authentication
- Train listing with route, departure, arrival, base price, and class fare details
- Admin-style train creation page
- Responsive shared stylesheet with modern UI
- Seedable dummy train data with class prices

## Installation

1. Clone the repository:
   ```bash
   git clone <repo-url> Train_Tickets
   cd Train_Tickets
   ```
2. Install dependencies:
   ```bash
   composer install
   ```
3. Copy environment file and set up database:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Configure database settings in `.env`
5. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```
6. Start the development server:
   ```bash
   php artisan serve
   ```

## Available Routes

- `GET /homepage` – Home page
- `GET /about` – About page
- `GET /contact-us` – Contact page
- `GET /login` – Login page
- `POST /login` – Authenticate user
- `GET /register` – Registration page
- `POST /register` – Register a new user
- `GET /trains` – Train list page
- `GET /add-train` – Add train form
- `POST /add-train` – Save a new train

## Database

The project includes:

- `users` table for registered users
- `add_trains` table for train data

### Factory

The train factory generates dummy trains with:

- `train_name`
- `train_number`
- `origin`
- `destination`
- `departure_time`
- `arrival_time`
- `price`
- `classes` prices for `first_class`, `sleeper`, and `economy`

## Styling

Styles are centralized in `public/css/site.css` for a consistent, modern interface across login, register, train listing, add train, and main pages.

## Notes

- If you want to refresh the database and reseed sample trains, use:
  ```bash
  php artisan migrate:fresh --seed
  ```
- The login route name is defined on the GET `/login` page so `route('login')` resolves correctly.

## License

This project is provided under the MIT License.
