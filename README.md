# Priyansu Shrestha — Portfolio

A redesigned personal portfolio built around a "drafting table" theme —
blueprint grid, sheet numbers, dimension lines and a revision-history
table — that ties Priyansu's Civil Engineering background into the visual
language of the site, on top of a PHP/MySQL backend with a working admin panel.

## What's included

- `index.php`, `about.php`, `projects.php`, `contact.php` — public site
- `config/database.php` — single place to set your DB credentials
- `includes/header.php`, `includes/footer.php` — shared layout
- `assets/css/style.css` — the full design system
- `assets/js/script.js` — typing effect, mobile nav, scroll reveal
- `assets/images/profile.jpg` — your photo (already added)
- `portfolio.sql` — database schema (admins, projects, contacts, skills, education, experience, social_links)
- `admin/` — password-protected admin panel

## Setup (XAMPP / local)

1. Copy this whole folder into `htdocs/` (e.g. `htdocs/portfolio`).
2. Start Apache and MySQL in XAMPP.
3. Open phpMyAdmin and import `portfolio.sql` — this creates the `portfolio_db` database and tables.
4. Check `config/database.php` — defaults (`root` / no password) match a stock XAMPP install. Edit if yours differs.
5. Visit `http://localhost/portfolio/admin/create_admin.php` **once** in your browser and create your admin username/password. This safely hashes your password with bcrypt.
6. **Delete `admin/create_admin.php`** after that — it's a setup-only file and shouldn't stay on a live site.
7. Log in at `http://localhost/portfolio/admin/login.php`.
8. Visit the site at `http://localhost/portfolio/`.

## Admin panel

From the dashboard you can:
- View and delete contact form submissions
- Add new projects (title, description, tech tags, GitHub/live links)
- Delete existing projects

The public **Projects** page and homepage's "Selected work" section read directly from the `projects` table, so anything you add shows up immediately.

## Notes

- The contact form on `contact.php` writes straight into the `contacts` table via a prepared statement.
- Replace the placeholder email (`hello@priyansu.dev`) and social links in `contact.php` and `includes/footer.php`/`about.php` with your real ones.
- Add a real `assets/cv.pdf` for the "Download résumé" button to work.
- All database queries use PDO with prepared statements, and admin passwords are hashed with bcrypt — no plaintext passwords anywhere.
