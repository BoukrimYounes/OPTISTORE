<h1 align="center">
	<img
		width="300"
		alt="OPTISTORE"
		src="https://github.com/BoukrimYounes/OPTISTORE/blob/master/resources/js/public/icon.png">
</h1>

<h3 align="center">
	OPTISTORE– eCommerce application
</h3>

## 📖 Table of Contents
<details>
<summary>Click to expand</summary>

- [📖 Table of Contents](#-table-of-contents)
- [📷 Demo](#-demo)
- [⛓ Description](#-description)
  - [User Authentication](#user-authentication)
  - [Product & Cart Management](#product--cart-management)
  - [Admin Panel](#admin-panel)
  - [Responsive Design](#responsive-design)
- [🔨 Development](#-development)
  - [Tech Stack](#tech-stack)
- [☑️ Installation](#-installation)
  - [Prerequisites](#prerequisites)
  - [Backend Setup (Laravel)](#backend-setup-laravel)
  - [Frontend Setup (React)](#frontend-setup-react)
- [📦 Usage](#-usage)
- [🤝 Collaborators](#-collaborators)

</details>

# 📷 Demo


# ⛓ Description

<p align="center">
	<b>OptiStore</b> is a sleek and modern eCommerce platform designed for selling high-quality eyewear. From men’s eyeglasses to women’s sunglasses, users can easily browse by category, add items to their cart, and securely place orders.
</p>

## 1️⃣ User Authentication
- Registration and login required for placing orders.
- Authenticated users can browse, add to cart, and proceed to checkout.

## 2️⃣ Product & Cart Management
- View products by category.
- Add glasses to cart (requires login).
- View cart, update quantity, remove items.
- Checkout and view order summary.


## 3️⃣ Admin Panel
- Add, update, and delete products.
- Manage product categories and stock.
- View and manage customer orders.

## 4️⃣ Real-Time Updates
- When a task’s type/status is updated, the changes are instantly reflected in the dashboards of all assigned users.

## 6️⃣ Fully Responsive
- Designed with Tailwind CSS for a clean, modern look on desktop, tablet, and mobile devices.

---

# 🔨 Development

## 🛠 Tech Stack

- Backend: [![Laravel](https://img.shields.io/badge/Laravel-11-red?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com/)
- Frontend: [![React](https://img.shields.io/badge/React-18-blue?style=flat-square&logo=react&logoColor=white)](https://reactjs.org/)
- Routing & Inertia: [![Inertia.js](https://img.shields.io/badge/Inertia.js-SPA-lightgrey?style=flat-square)](https://inertiajs.com/)
- Database: [![MySQL](https://img.shields.io/badge/MySQL-Database-orange?style=flat-square&logo=mysql&logoColor=white)](https://www.mysql.com/)
- Styling: [![Tailwind CSS](https://img.shields.io/badge/TailwindCSS-Styling-teal?style=flat-square&logo=tailwindcss&logoColor=white)](https://tailwindcss.com/)

---

# ☑️ Installation

## Prerequisites
- PHP >= 8.2.12
- Composer
- Node.js >= 22.13
- MySQL or compatible database

## Backend Setup (Laravel)

```bash
git clone https://github.com/Chaimaa101/OPTISTORE.git
cd OPTISTORE
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link
php artisan serve
```
## Frontend Setup (React)
```bash
cd resources/js
npm install
npm run dev
```

## 📦 Usage

1. **Register a new account** or **log in** if you already have one.
2. Browse the product catalog by category.
3. Add items to your cart and proceed to checkout.
4. Admin users can access the dashboard to manage:
- Products
- Categories
- Orders
5. Mobile-friendly and easy to navigate!

# 🤝 Collaborators

We collaborated to develop **OPTISTORE**, each contributing to different aspects of the project:

| Name                | GitHub Profile                                      | Role                                                |
|-------------------- |---------------------------------------------------- |---------------------------------------------------- |
| **Younes BOUKRIM**  | [BoukrimYounes](https://github.com/BoukrimYounes)   | UI/UX Designer, Frontend Developer (React)          |
| **Chaimaa AFKIR**   | [Chaimaa101](https://github.com/Chaimaa101)         | Backend Developer , API Tester                      |



