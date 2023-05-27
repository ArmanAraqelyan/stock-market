## Configuration

1. Clone the project and go to the root dir
   ```
   git clone https://github.com/ArmanAraqelyan/stock-market.git 
   ```
2. Make directory for docker storage:
   ```
   mkdir src/storage/docker
   ```
3. Run docker services
   ```
   docker-compose up -d --build
   ```
4. Install composer dependencies
   ```
   docker-compose exec app composer install
   ```
5. Run npm commands
    ```
   docker-compose exec app npm install
   docker-compose exec app npm run dev
   ```
   
6. Copy .env.example to .env

7. Generate app key

8. ```
   docker-compose exec app php artisan key:generate
   ```
   
Don't forget to add a key for RAPIDAPI_KEY