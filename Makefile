.PHONY: install qa lint lintfix phpstan tests coverage

install:
	composer update

qa: phpstan lint tests

lint:
	vendor/bin/phpcs --standard=ruleset.xml --encoding=utf-8 -np src tests

lintfix:
	vendor/bin/phpcbf --standard=ruleset.xml --encoding=utf-8 -np src tests

phpstan:
	vendor/bin/phpstan analyse -c phpstan.neon

tests:
	vendor/bin/tester -s -p php --colors 1 -C tests/Cases

coverage:
	vendor/bin/tester -s -p phpdbg --colors 1 -C --coverage coverage.html --coverage-src src tests/Cases

