[README.md](https://github.com/user-attachments/files/25687693/README.md)
# TransManager 🚛

> A freight shipment planning web application built with Laravel, integrating Google Maps and Google Calendar to streamline logistics operations. This was my final project in college.

---

## Table of Contents

- [About the Project](#about-the-project)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Environment Variables](#environment-variables)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Roadmap](#roadmap)
- [License](#license)

---

## About the Project

TransManager is a web application designed to simplify daily operations for logistics and freight companies. It allows employees to plan and manage cargo shipments, visualise routes on a map, and sync shipment schedules directly with Google Calendar — accessible from any device.

The goal of this project is to reduce manual planning overhead and give logistics teams a clear, centralised view of all active and upcoming shipments.

---

## Features

- 📦 **Shipment Management** — Create, view, update, and delete freight shipments
- 🗺️ **Google Maps Integration** — Visualise the planned route for each shipment on an interactive map
- 📅 **Google Calendar Sync** — Automatically push shipment schedules to Google Calendar, accessible from any device
- 🔐 **User Authentication** — Secure login and access control for employees

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP, Laravel |
| Frontend | HTML, CSS, JavaScript, Vue.js |
| Database | MySQL |
| Mapping | Google Maps JavaScript API |
| Scheduling | Google Calendar API |
| Build Tool | Webpack (via Laravel Mix) |

---

## Getting Started

### Prerequisites

Ensure you have the following installed on your machine:

- PHP >= 7.x
- [Composer](https://getcomposer.org/)
- Node.js & npm
- MySQL
- A [Google Cloud](https://console.cloud.google.com/) account with the following APIs enabled:
  - Maps JavaScript API
  - Google Calendar API

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/KristapsRezgalis/transmanager.git
   cd transmanager
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Copy the environment file**
   ```bash
   cp .env.example .env
   ```

5. **Generate the application key**
   ```bash
   php artisan key:generate
   ```

6. **Run database migrations**
   ```bash
   php artisan migrate
   ```

7. **Build frontend assets**
   ```bash
   npm run dev
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

The application will be available at `http://localhost:8000`.

---

### Environment Variables

Open the `.env` file and configure the following values:

```env
APP_NAME=TransManager
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=transmanager
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password

GOOGLE_MAPS_API_KEY=your_google_maps_api_key
GOOGLE_CALENDAR_API_KEY=your_google_calendar_api_key
```

> ⚠️ Never commit your `.env` file or expose your API keys in version control.

---

## Usage

Once running, employees can:

1. **Log in** to the application with their credentials
2. **Create a shipment** by entering origin, destination, cargo details, and scheduled date
3. **View the route** on the embedded Google Map for each shipment
4. **Check the calendar** — shipments are synced to Google Calendar and visible on any device

---

## Project Structure

```
transmanager/
├── app/                  # Core application logic (Models, Controllers, Middleware)
├── bootstrap/            # Framework bootstrapping
├── config/               # Application configuration files
├── database/             # Migrations and seeders
├── public/               # Publicly accessible assets (entry point)
├── resources/            # Views (Blade templates), CSS, and JS source files
├── routes/               # Web and API route definitions
├── storage/              # Logs, cache, and uploaded files
├── tests/                # Automated tests
├── .env.example          # Example environment configuration
├── artisan               # Laravel CLI tool
├── composer.json         # PHP dependencies
├── package.json          # Node.js dependencies
└── webpack.mix.js        # Asset compilation configuration
```

---

## Roadmap

- [x] Shipment CRUD operations
- [x] Google Maps route visualisation
- [x] Google Calendar integration
- [ ] Google Drive integration for transport document storage
- [ ] Email notifications for shipment updates
- [ ] Role-based access control (Admin / Driver / Dispatcher)
- [ ] Mobile-responsive design improvements

---

## License

This project is open source and available under the [MIT License](LICENSE).

---

*Built by [Kristaps Rezgalis](https://github.com/KristapsRezgalis)*
