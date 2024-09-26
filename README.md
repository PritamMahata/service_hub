# Service Hub

*Service Hub* is a comprehensive web platform that connects users with a variety of home and personal service providers, from cleaning and automotive care to beauty and wellness. The platform offers seamless service booking. Providers can list their services, and clients can easily search, book, and review these services.

## Table of Contents

- [Service Hub](#service-hub)
  - [Table of Contents](#table-of-contents)
  - [Features](#features)
    - [For Service Providers](#for-service-providers)
    - [For Clients](#for-clients)
  - [Tech Stack](#tech-stack)
  - [Installation](#installation)
    - [Prerequisites](#prerequisites)
  - [Database Schema](#database-schema)
  - [Usage](#usage)
  - [Contributing](#contributing)
  - [License](#license)

## Features

- **Admin Management**: Allows the admin to manage users, service providers, and services.
- **User Dashboard**: Enables users to book services, monitor status, and provide reviews.
- **Provider Dashboard**: Allows providers to manage tasks, update profiles, and handle bookings.
- **Booking System**: Facilitates service bookings, availability checks, and confirmations.
- **Service Categories**: Services are organized into categories for easy browsing.
- **Authentication**: Secure login system for admins, users, and providers.
- **Reviews & Ratings**: Users can leave reviews and rate services upon completion.

### For Service Providers

- *Service Listing*: Providers can create, update, and delete their service listings.
- *Dashboard*: Providers can manage bookings, view earnings, and analyze performance.
- *Profile Management*: Providers can update their profiles and set availability.
- *Reviews and Ratings*: Providers can view client feedback and improve their services.

### For Clients

- *Service Search and Booking*: Clients can search for services, view details, and make bookings.
- *Booking History*: Clients can view their booking history and manage upcoming appointments.
- *Secure Payments*: Integrated payment gateway for safe and easy transactions.
- *Reviews and Feedback*: Clients can leave feedback and rate the services they receive.

## Tech Stack

- **Backend**: PHP
- **Frontend**: Blade, HTML5, CSS3, JavaScript
- **Database**: MariaDB/MySQL
- **Version Control**: Git
- **Web Server**: Apache

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/PritamMahata/service_hub.git
    ```

2. Navigate into the project directory:

    ```bash
    cd service-hub
    ```

3. Start `Apache server`

4. Access the app via [http://127.0.0.1/service_hub].

5. To create database
   1. Goto [http://127.0.0.1/service_hub/database/update.php]

   2. click on `Create database` and then `add data` button.

### Prerequisites

- PHP 8.x or higher
- MySQL 5.7 or higher

## Database Schema

Key tables in the database include:

- `users`: Stores user credentials and profile information.
- `admin`: Stores admin details.
- `provider`: Contains service provider profiles.
- `category`: Lists all service categories.
- `services`: Stores details of offered services.
- `bookings`: Manages user bookings and their status.

For the full schema, see the `database/service_hub.sql` file in the repository.

## Usage

- *For Providers*: Register, list your services, and manage bookings through the provider dashboard.
- *For Clients*: Search for services, book appointments, and manage your bookings easily.

## Contributing

We welcome contributions! To contribute:

1. Fork this repository.
2. Create a feature branch (`git checkout -b feature-name`).
3. Commit your changes.
4. Push your branch (`git push origin feature-name`).
5. Open a pull request targeting the `main` branch.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
