start:
	php artisan serve --host=0.0.0.0 --port=$(PORT)

setup:
	cp -n .env.example .env || true
	composer install
	php artisan key:generate
	make migrate

migrate:
	php artisan migrate:fresh --force --seed

install:
	composer install

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 app routes tests

lint-fix:
	composer exec phpcbf -- --standard=PSR12 app routes tests

test:
	php artisan test

test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover build/logs/clover.xml