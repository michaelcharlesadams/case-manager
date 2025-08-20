# Client & Matter Management System

A sample application built with **Laravel** to demonstrate clean architecture, CRUD operations, API endpoints, authentication, and professional development practices.  

This project is intended as a code sample for prospective employers and showcases real-world Laravel capabilities.  

---

## 🚀 Features
- User authentication (Laravel Breeze)  
- Client management (create, view, update, delete clients)  
- Matter management (link matters to clients, assign statuses: `open`, `on_hold`, `closed`)  
- REST API endpoints for clients and matters (`/api/clients`, `/api/matters`)  
- Eloquent relationships (`Client hasMany Matters`)  
- Form validation with custom error handling  
- Database migrations, seeders, and factories  
- Feature & unit tests (run via `php artisan test`)  
- Blade views styled with Tailwind CSS  

---

## 🛠️ Tech Stack
- **Backend:** Laravel 11 (PHP 8.2+)  
- **Frontend:** Blade + TailwindCSS  
- **Database:** MySQL (default)  
- **API Auth:** Laravel Sanctum (for secure endpoints)  
- **Testing:** PHPUnit & Laravel test utilities  

