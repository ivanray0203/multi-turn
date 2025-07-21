# Laravel Multi-Turn Chatbot using OpenAI

This project is a **Laravel-based web application** that implements a **multi-turn chatbot** using the **OpenAI API**. The chatbot maintains context over multiple interactions, allowing for more natural and dynamic conversations.

---

## 🧰 Requirements

- PHP >= 8.1
- Composer
- Node.js & NPM
- Laravel
- An OpenAI API key

---

## 🚀 Getting Started

### 1. Clone the repository

```bash
git clone git@github.com:ivanray0203/multi-turn.git
cd your-repo-name
git checkout master

### 2. Install PHP and JavaScript dependencies

```bash
composer install
npm install

### 3.Set up environment configuration

```bash
cp .env.example .env
OPEN_AI_KEY=your-openai-api-key-here

### 4. Generate application key

```bash
php artisan key:generate

### 5. Run database migrations

```bash
php artisan migrate

### 6.Build front-end assets

```bash
npm run dev

### 7. Start the development server

```bash
php artisan serve
