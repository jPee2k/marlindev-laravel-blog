start:
	php artisan serve --host 0.0.0.0

clear:
	php artisan view:clear
	php artisan cache:clear

tinker:
	php artisan tinker