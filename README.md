# TLIST – Trends in Libraries, Information Science and Technology

A Laravel + Livewire web application for the Nigeria Library Association Enugu State Chapter's academic journal. The app serves as a public-facing portal where visitors can browse journal volumes and articles, view article metadata, and download PDFs. Authenticated administrators can create, edit, and delete volumes and articles through a clean admin interface built directly into the site.

## Setup

The project uses Laravel 12, Livewire 3, and Tailwind CSS 4, with SQLite as the default database.

```bash
composer install
npm install

cp .env.example .env
php artisan key:generate

# Run migrations and seed the database (creates admin user + sample volume)
php artisan migrate --seed

npm run build

composer run dev
```

The database seeder creates an admin account you can use to log in at `/login`:

Email: admin@nla.com
Password: password
