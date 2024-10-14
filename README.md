<h1 align="center" style="font-family: 'Orbitron', sans-serif;">Origin Esports CRM</h1>

<p align="center">
  A powerful CRM platform for managing esports fans, merchandise sales, news, teams, and discussions, built with <b>Laravel 11</b> and <b>Tailwind CSS</b>.
  The users for the system are mainly two sets: the fans of the esports organization and the administration staff running the platform. 
  Fans can either browse the platform, shopping catalog, view details about the org, and event details without signing up, or sign up to access more features. 
  The site management (administrator) users will manage the site, keep merchandise inventories updated, update the org details, view analytics, handle customer support tickets, and more.
</p>

---

## Features

- **Fan Management**: Keep track of fans, their interests, and engagement.
- **News and Updates**: Post and share the latest news and content with fans.
- **Team Pages**: Showcase information about your esports teams.
- **Forums and Discussions**: Engage with fans through interactive forums.
- **Merchandise Shop**: Sell and manage esports merchandise.
- **Shopping Cart**: Buy and save esports merchandise into personal carts.
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
![Homepage](public/images/readme screenshots/Home Page.png)
![Homepage - Part 2](public/images/readme screenshots/Home Page p2.png)

### Shop Section
![Shop Page](public/images/readme screenshots/Shop Page.png)
![Shop Item Page](public/images/readme screenshots/Shop Item Page.png)
![Shop Cart Page](public/images/readme screenshots/Shop Cart Page.png)

### Team Pages
![Team Page](public/images/readme screenshots/Team Page.png)

### News Section
![News Page](public/images/readme screenshots/News Page.png)

### Admin Dashboard
![Admin Dashboard](public/images/readme screenshots/admin dashboard.png)
![Admin Dashboard - Part 2](public/images/readme screenshots/admin dashboard p2.png)

### Admin Shop Management
![Admin Shop](public/images/readme screenshots/admin shop.png)

### Admin News Management
![Admin News](public/images/readme screenshots/admin news.png)
![Admin News Creation](public/images/readme screenshots/admin news create.png)

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
