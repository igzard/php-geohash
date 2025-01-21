.PHONY: help
.DEFAULT_GOAL := help

help:
	@grep -h -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: composer-install
composer-install: ## install php packages
	php ./vendor/bin/composer install

.PHONY: phpunit
phpunit: ## Run phpunit
	php ./vendor/bin/phpunit --colors=always

.PHONY: php-cs-fixer
php-cs-fixer: ## Run php-cs-fixer
	php ./vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.php --diff --dry-run --verbose

.PHONY: php-cs-fixer-check
php-cs-fixer-check: ## Run php-cs-fixer-check
	php ./vendor/bin/php-cs-fixer fix --dry-run

.PHONY: phpstan
phpstan: ## Run phpstan
	php ./vendor/bin/phpstan

.PHONY: code-quality
code-quality: php-cs-fixer-check phpunit phpstan ## Run code quality checks