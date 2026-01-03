**Laravel Based e-commerce System**

This is a Laravel based ecommerce system with basic functions as adding products to cart, lising products, checking out and order management. It is built using **Laravel 11+, Jetstream (Livewire + Alpine), Tailwind CSS** and responsive navigation.

**Features**

- Authentication (Login, Register, Password Reset, Profile)
- Responsive Navigation (Desktop + Mobile/Hamburger menu)
- Dashboard
- Product Listing page 
- Shopping Cart 
- User Orders history
- Team management (optional – Jetstream feature)
- Profile photo support
- Clean Tailwind + Alpine.js mobile-first design
**Tech Stack**
- **PHP** 8.2+
- **Laravel** 11.x
- **Laravel Jetstream** (Livewire stack)
- **Tailwind CSS** 3.x
- **Alpine.js**
- **Laravel Breeze** components style (nav-links, dropdowns)
- MySQL / PostgreSQL / SQLite (configurable)
- 
**Installation**
  
  **1. Clone Repository**
  
  `git clone https://github.com/kimwebi/webimart.git`
  
 `cd webimart`
  
** 2. Install Dependencies**
  
  `composer install`
  `npm install && npm run dev`
  
**3. Copy environment file and configure **

  `cp .env.example .env`
  
  Edit .env with your database credentials
**4. Generate application key**

  `php artisan key:generate`
  
**5. Run database migrations and seed (optional)**

  `php artisan migrate --seed`
  
**6. (Optional) Install Jetsream Teams if you want Teams Feature**

  `php artisan jetstream:install livewire --teams`
  
**7. Start Development Server**

  `php artisan serve`
**Contributions**

  Feel free to contribute to the project as it is open source


    
                                                                     Made with 😍 by KimWebi
