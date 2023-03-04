install:
	composer install

brain-even:
	./bin/brain-even

brain-games:
	./bin/brain-games

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

validate:
	composer validate
