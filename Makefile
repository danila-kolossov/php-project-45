install:
	composer install

brain-calc:
	./bin/brain-calc

brain-even:
	./bin/brain-even

brain-games:
	./bin/brain-games

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

validate:
	composer validate
