@echo off

echo Starting Frontend...
cd frontend
start cmd /k "npm run dev"

cd ..

echo Starting Backend...
cd backend
start cmd /k "php artisan serve"

cd ..

echo Both services started.
pause