# 🧩 **Product Requirements Document (PRD)**

## 📘 Project: Company Profile Website – CV Devgenfour

---

### 1. **General Information**

**Company Name:** CV Devgenfour
**Address:** Indramayu Regency, West Java, Indonesia
**Established:** 2022
**CEO:** Sofyan Maulana
**Business Type:** Software House (Web, Mobile, and IoT Development)
**Website Language:** Indonesian (English version optional for future release)

---

### 2. **Background**

CV Devgenfour is a technology company focused on **Web, Mobile, and IoT application development**.
Founded in 2022, the company is committed to delivering world-class digital solutions for businesses of all sizes — from startups to large enterprises — emphasizing **professionalism, integrity, and customer trust**.

This company profile website serves as Devgenfour’s official digital identity, designed to strengthen brand credibility, present services and portfolio, and provide an accessible channel for clients and partners to connect.

---

### 3. **Product Objectives**

1. Provide an official digital platform to represent CV Devgenfour online.
2. Present company information, services, and portfolio in a professional and engaging manner.
3. Serve as a direct communication channel for clients and partners.
4. Build brand awareness and trust through modern web presence.

---

### 4. **Scope**

**Included:**

* Public-facing company profile website.
* Laravel-based admin dashboard for content management.
* Contact form integration (Email / WhatsApp).
* SEO configuration using *Spatie* package.

**Excluded:**

* Online payment functionality.
* Automated multi-language translation (optional for future development).
* Client-side user authentication (non-admin users).

---

### 5. **Target Users**

| User Type                | Description                                               | Objective                            |
| ------------------------ | --------------------------------------------------------- | ------------------------------------ |
| **Potential Clients**    | Businesses or individuals seeking IT development services | Learn about Devgenfour’s offerings   |
| **Partners / Investors** | Organizations seeking collaboration or partnership        | Assess credibility and expertise     |
| **Job Seekers**          | Individuals exploring career opportunities                | Understand company culture and roles |
| **Internal Admins**      | Devgenfour’s management or content team                   | Manage and update website content    |

---

### 6. **Core Features**

#### **Frontend**

1. **Landing Page** – Hero banner, tagline, and call-to-action (CTA: “Contact Us”).
2. **About Us** – Company profile, vision, mission, and key values.
3. **Services** – Overview of Web, Mobile, and IoT development services.
4. **Portfolio** – Showcase of previous projects with details and visuals.
5. **Clients & Partners** – Display of partner logos and testimonials.
6. **Contact Page** – Integrated form linked to company email/WhatsApp.
7. **Blog / News (Optional)** – Technology insights and company updates.

#### **Backend (Admin Panel)**

1. **Dashboard Overview** – Displays metrics, contact messages, and recent updates.
2. **Page Management** – CRUD operations for content pages (About, Services, Blog).
3. **Portfolio Management** – CRUD for project data and image uploads.
4. **Team Management** – CRUD for team members (name, role, photo, social links).
5. **User Management** – Role and permission control using *Spatie*.
6. **SEO Management** – Per-page metadata for better search engine visibility.

---

### 7. **Conceptual Wireframe**

#### 🏠 **Home Page Layout**

```
+---------------------------------------------------+
| [Logo] [Menu: Home | About | Services | Portfolio | Contact] |
|---------------------------------------------------|
| Hero Section: Tagline, Background Image, CTA Button |
|---------------------------------------------------|
| About Section: Brief company intro, vision & mission |
|---------------------------------------------------|
| Services Section: 3 cards showcasing core services  |
|---------------------------------------------------|
| Portfolio Section: Slider/Gallery of past projects  |
|---------------------------------------------------|
| Testimonials & Clients Section                     |
|---------------------------------------------------|
| Contact Section: Form + Google Map                 |
|---------------------------------------------------|
| Footer: Copyright | Social Media | Email           |
+---------------------------------------------------+
```

#### ⚙️ **Admin Dashboard Layout**

```
Sidebar:
- Dashboard
- Pages
- Services
- Portfolio
- Team
- Blog
- Users
- Settings

Main Panel:
[Summary Cards: Total Projects | Visitors | Messages]
[Recent Messages Table]
[Traffic Chart Visualization]
```

---

### 8. **Design & Branding**

| Element              | Description                                             |
| -------------------- | ------------------------------------------------------- |
| **Primary Colors**   | Blue (#007BFF) and White (#FFFFFF)                      |
| **Secondary Colors** | Light Gray (#F8F9FA) and Dark Gray (#343A40)            |
| **Typography**       | Poppins / Inter (Google Fonts)                          |
| **Visual Style**     | Modern, professional, minimalistic, responsive          |
| **Logo**             | Official CV Devgenfour logo (PNG/SVG)                   |
| **Icons**            | Bootstrap Icons                                         |
| **Layout**           | Responsive grid with smooth animations using JavaScript |

---

### 9. **Technology Stack (Updated for Laragon v6)**

| Component                         | Technology / Tool                                  |
| --------------------------------- | -------------------------------------------------- |
| **Programming Language**          | PHP 8.3                                            |
| **Backend Framework**             | Laravel 12                                         |
| **Frontend Framework**            | Bootstrap 5, JavaScript                            |
| **Laravel Packages**              | Spatie (Role, Permission, SEO Tools)               |
| **Local Development Environment** | **Laragon v6** (PHP 8.3, MySQL, Apache)            |
| **Database Engine**               | MySQL (via Laragon)                                |
| **Version Control**               | GitHub                                             |
| **Web Server**                    | Apache (Laragon for local), Nginx (for production) |
| **Security**                      | HTTPS, CSRF Protection, Laravel Authentication     |
| **Deployment Target**             | VPS or Shared Hosting (cPanel / Plesk)             |
| **Operating System (Dev)**        | Windows 10/11 with Laragon stack                   |

---

### 10. **Conceptual Database Schema**

Database Name: `devgenfour_profile_db`
All migrations and seeding are managed through Laravel Artisan commands within the Laragon terminal.

```
TABLE users
- id
- name
- email
- password
- role_id
- created_at
- updated_at

TABLE roles
- id
- name
- description

TABLE services
- id
- title
- description
- icon
- created_at
- updated_at

TABLE portfolios
- id
- title
- description
- image
- client_name
- project_date
- created_at
- updated_at

TABLE team_members
- id
- name
- position
- photo
- linkedin_url
- created_at
- updated_at

TABLE blog_posts (optional)
- id
- title
- slug
- content
- author_id
- thumbnail
- created_at
- updated_at

TABLE messages
- id
- name
- email
- phone
- message
- created_at
```

---

### 🧰 **Development Environment Notes**

* All local development and hosting will run under **Laragon v6**, using its integrated Apache, PHP 8.3, and MySQL environment.
* Local testing can use virtual hosts such as `http://devgenfour.test`.
* Deployment configuration will use environment-specific `.env` files for local and production servers.

Example `.env` (Local Laragon):

```
APP_NAME=Devgenfour
APP_ENV=local
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxx
APP_DEBUG=true
APP_URL=http://devgenfour.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=devgenfour_profile_db
DB_USERNAME=root
DB_PASSWORD=
```

---

### 11. **Non-Functional Requirements**

| Aspect              | Specification                                                |
| ------------------- | ------------------------------------------------------------ |
| **Security**        | Password hashing (bcrypt), CSRF protection, input validation |
| **Performance**     | Page load time under 3 seconds                               |
| **SEO**             | Dynamic metadata and sitemap.xml                             |
| **Responsiveness**  | Fully adaptive on all devices                                |
| **Accessibility**   | WCAG 2.1 compliant color contrast                            |
| **Maintainability** | Follows PSR-12 Laravel coding standards                      |

---

### 12. **Development Timeline**

| Phase                        | Duration  | Deliverable                              |
| ---------------------------- | --------- | ---------------------------------------- |
| Analysis & Design            | 1 week    | Sitemap, wireframe, and style guide      |
| Backend Development          | 2 weeks   | Laravel structure, database, admin panel |
| Frontend Development         | 1 week    | Responsive UI and animations             |
| Integration & Testing        | 1 week    | QA, debugging, optimization              |
| Deployment                   | 2 days    | Website goes live                        |
| **Total Estimated Duration** | ± 5 weeks | Version 1.0 Launch                       |

---

### 13. **Success Criteria**

✅ Responsive and accessible on all devices
✅ Fully functional core modules (Profile, Services, Portfolio, Contact)
✅ Admin can manage content without developer assistance
✅ Indexed on Google within 2–4 weeks post-launch
✅ Professional and modern UI aligned with Devgenfour’s branding

---

### 14. **Future Enhancements**

* Multi-language support (Indonesian/English).
* Recruitment / Careers module.
* Client login dashboard for project tracking.
* API integration with Devgenfour’s internal CRM.

---

✨ **Document Status:** Final – Updated for Laragon v6 Environment
📅 **Date:** October 31, 2025
✍️ **Prepared by:** Andre Wibowo & ChatGPT (AI Assistant)

---