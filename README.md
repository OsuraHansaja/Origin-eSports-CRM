<p align="center"><a href="https://github.com/OsuraHansaja/Origin-eSports-CRM" target="_blank"><img src="https://github.com/OsuraHansaja/Origin-eSports-CRM/path-to-your-logo.png" width="400" alt="Origin Esports CRM Logo"></a></p>

<h1 align="center" style="font-family: 'Orbitron', sans-serif;">Origin Esports CRM</h1>

<p align="center">
  A powerful CRM platform for managing esports fans, merchandise sales, news, teams, and discussions, built with <b>Laravel 11</b> and <b>Tailwind CSS</b>.
</p>

---

## Features

- **Fan Management**: Keep track of fans, their interests, and engagement.
- **Merchandise Shop**: Sell and manage esports merchandise.
- **Forums and Discussions**: Engage with fans through interactive forums.
- **Team Pages**: Showcase information about your esports teams.
- **News and Updates**: Post and share the latest news and content with fans.
- **Sponsor Management**: Highlight team sponsors and their contributions.

---

## Tech Stack

- **Backend**: [Laravel 11](https://laravel.com/)
- **Frontend**: Tailwind CSS, Alpine.js
- **Database**: MySQL
- **Tools**: Jetstream, Livewire, Laravel Forge for hosting

---

## Screenshots

### Homepage
![Homepage](https://github.com/OsuraHansaja/Origin-eSports-CRM/path-to-your-screenshot1.png)

### Shop Section
![Shop Section](https://github.com/OsuraHansaja/Origin-eSports-CRM/path-to-your-screenshot2.png)

---

## Installation

```bash
git clone https://github.com/OsuraHansaja/Origin-eSports-CRM.git
cd Origin-eSports-CRM
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run dev
php artisan serve
