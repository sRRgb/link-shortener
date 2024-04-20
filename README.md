## Link Shortener

NOTE: Images are relevant to run on APPLE M1-2-3 processors (if u will try run on other machine, u will need probably to change the images)
- install docker
- go to the project folder
- docker-compose up -d --build
- docker-compose exec app php artisan migrate
- connect to DB, u could check .env
- docker-compose exec app php artisan optimize
- Run postman, POST localhost:8000/api/shortener with body {"url": "https://example.com"}
- Get the response short_code
- Run postman, GET localhost:8000/api/{short_code}
- You will be redirected to early provided url.
- Check the database, links table, you wil lbe able to see the short_code column, also counter of visits.

P.S. also will be better to do the custom requests with more validation, swagger, auth, etc. 
It's just a basic functionality.


