
CCDI STUDENT PORTAL - QUICK SETUP



1. Install dependencies
   composer install
   npm install

2. Create the environment file
   - Copy the contents of `.env.example` into a new file named `.env`.
   - Update the database settings.
   - If your MySQL has no password, leave `DB_PASSWORD=` empty.


3. Generate application key
   php artisan key:generate

4. Configure the database
   - Create a MySQL database named:
     student_portal
   - Update the DB settings in the .env file.

5. Run migrations and seeders
   php artisan migrate --seed

6. Link storage
   php artisan storage:link

7. Build frontend assets
   npm run build

8. Start the server
   php artisan serve

Open:
http://127.0.0.1:8000
