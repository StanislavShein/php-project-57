start:
	php artisan serve

install:
	composer install

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 app routes tests

test-coverage:
	composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml