# Train Tickets Booking System

A comprehensive Laravel-based train ticket booking application featuring user authentication, train management, booking system, admin dashboard, and secure payments via Stripe.

## Features

- User registration, authentication, and profile management
- Train listing with detailed route, schedule, and class-based pricing
- Passenger information collection and booking management
- Secure payment processing with Stripe integration
- Admin dashboard for managing trains, bookings, and users
- Responsive UI with modern styling
- Seedable dummy data for testing

## Technologies Used

- **Framework**: Laravel 12
- **Language**: PHP 8.2+
- **Database**: MySQL/PostgreSQL (configurable)
- **Payment Gateway**: Stripe
- **Frontend**: Blade templates with CSS
- **Testing**: Pest PHP

## Installation

1. Clone the repository:
   ```bash
   git clone <repo-url> Train_Tickets
   cd Train_Tickets
   ```
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Install Node.js dependencies (for assets):
   ```bash
   npm install
   ```
4. Copy environment file and configure:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   - Set up your database credentials in `.env`
   - Configure Stripe keys: `STRIPE_KEY` and `STRIPE_SECRET`
5. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```
6. Build assets:
   ```bash
   npm run build
   ```
7. Start the development server:
   ```bash
   php artisan serve
   ```

## Available Routes

### Public Routes
- `GET /homepage` – Home page
- `GET /about` – About page
- `GET /contact-us` – Contact page
- `GET /login` – Login page
- `POST /login` – Authenticate user
- `GET /register` – Registration page
- `POST /register` – Register a new user
- `GET /trains` – Train listings
- `GET /payment-success` – Payment success page

### Authenticated User Routes
- `GET /profile/{user}` – User profile
- `GET /profile/{user}/edit` – Edit profile
- `PUT /profile/{user}` – Update profile
- `GET /users` – All users (admin view)
- `GET /passenger-info/{train}` – Passenger information form
- `POST /pay/{train}` – Process payment
- `GET /bookings` – User bookings
- `POST /logout` – Logout

### Admin Routes (Requires Admin Role)
- `GET /admin/dashboard` – Admin dashboard
- `GET /admin/trains` – Manage trains
- `POST /add-train` – Add new train (from admin)

## Database

The project includes the following tables:

- `users` – User accounts with roles (user/admin)
- `add_trains` – Train details
- `passengers` – Booking and passenger information

### Seeders

- `AddTrainSeeder` – Generates sample trains with pricing for different classes (first_class, sleeper, economy)

## Styling

Custom CSS in `public/css/site.css` provides a consistent, modern interface across all pages.

## Testing

Run tests with:
```bash
./vendor/bin/pest
```

## Future Features

- Real-time seat selection and mapping
- Loyalty or rewards program
- Multi-language and currency support
- Push notifications and reminders
- Advanced analytics for admins
- Waitlist and priority booking
- Integration with external APIs
- Mobile app companion
- Group bookings and corporate accounts
- Accessibility enhancements

## License

This project is licensed under the MIT License.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request.
