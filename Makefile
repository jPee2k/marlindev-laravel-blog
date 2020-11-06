start:
	php artisan serve --host 0.0.0.0

heroku:
	heroku local -f Procfile.dev

clear:
	php artisan view:clear
	php artisan cache:clear
	php artisan config:clear
	php artisan clear

deploy:
	git push heroku master

install:
	composer install
	npm install

db-prepare:
	php artisan migrate --seed