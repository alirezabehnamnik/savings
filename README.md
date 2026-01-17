# 💰 Savings – Goal-Based Money Tracking (Laravel + Docker)

Savings is a Laravel-based application designed to help users define savings goals,
track monthly contributions, and monitor progress toward financial targets.

This project is fully Dockerized and can be run either with Docker or directly
on a local machine.

---

## ✨ Features

- Create and manage savings goals
- Add monthly or custom savings deposits
- Track progress toward each goal
- Clean Laravel MVC architecture
- Dockerized development environment
- Easy to extend (charts, reports, auth, etc.)

---

## 🧱 Tech Stack

- Laravel
- PHP
- MySQL
- Vite
- Docker & Docker Compose

---

## 📦 Requirements

### Option 1 – Docker (Recommended)

- Docker
- Docker Compose

### Option 2 – Without Docker

- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL or SQLite

---

## 🚀 Installation (Docker – Recommended)

### 1️⃣ Clone the repository

Clone the project for personal or internal use:

    git clone https://github.com/alirezabehnamnik/savings.git
    cd savings

---

### 2️⃣ Environment setup

Copy the example environment file:

    cp .env.example .env

---

### 3️⃣ Build and run Docker containers

Build and start all services:

    docker-compose up -d --build

This will start:

- PHP / Laravel container
- MySQL database container

---

### 4️⃣ Install Laravel dependencies (inside container)

Run Composer inside the app container:

    docker-compose exec app composer install

---

### 5️⃣ Generate application key

    docker-compose exec app php artisan key:generate

---

### 6️⃣ Run database migrations

    docker-compose exec app php artisan migrate

---

### 7️⃣ Install frontend dependencies

    docker-compose exec app npm install
    docker-compose exec app npm run build

---

### 8️⃣ Access the application

Open your browser and visit:

    http://localhost:8000

---

## 🐳 Useful Docker Commands

Stop containers:

    docker-compose down

Restart containers:

    docker-compose up -d

Run any Laravel command:

    docker-compose exec app php artisan <command>

Example:

    docker-compose exec app php artisan migrate:fresh --seed

---

## 🧪 Running Without Docker

### 1️⃣ Install backend dependencies

    composer install

---

### 2️⃣ Install frontend dependencies

    npm install
    npm run build

---

### 3️⃣ Setup environment

    cp .env.example .env
    php artisan key:generate

Configure database credentials inside `.env`.

---

### 4️⃣ Run migrations

    php artisan migrate

---

### 5️⃣ Run the application

    php artisan serve

Open:

    http://127.0.0.1:8000

---

## 🤝 Contributing

Contributions are welcome and encouraged.

- You may submit pull requests
- You may suggest features or improvements
- You may modify the code for personal or internal use

⚠️ Public forks or public redistribution are NOT allowed.
Please read the LICENSE file for details.

---

## 📄 License

This project uses a custom license.

- Free to use
- Free to contribute
- Forking for personal use is allowed
- Public forks or redistribution are NOT allowed

See the LICENSE file for full details.

---

## 👤 Author

Developed by **Alireza Behnamnik**

Built with ❤️ using Laravel and Docker
