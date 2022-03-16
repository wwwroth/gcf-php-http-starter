test:
	./vendor/bin/phpunit --testdox tests

server:
	FUNCTION_TARGET=execute php -S localhost:8080 vendor/bin/router.php