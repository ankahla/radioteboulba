DOCKER_COMPOSE = docker-compose --file=containers/docker-compose.yml
EXEC_PHP       = $(DOCKER_COMPOSE) exec rt_php7.4
ARTISAN        = $(EXEC_PHP) php artisan
ENV            = dev
COMPOSER       = $(EXEC_PHP) composer
PWD            = $(shell pwd)

RED      = \033[0;31m
GREEN    = \033[0;32m
YELLOW   = \033[0;33m
BLUE     = \033[0;34m
PURPLE   = \033[0;35m
CYAN     = \033[0;36m
WHITE    = \033[0;37m
NO_COLOR = \033[m

B_GREEN  = \033[42m
B_YELLOW = \033[43m
B_BLUE   = \033[44m
B_PURPLE = \033[45m
B_CYAN   = \033[46m
B_WHITE  = \033[47m

start: ## Start the project
	@$(DOCKER_COMPOSE) up -d --remove-orphans --no-recreate

stop: ## Start the project
	@$(DOCKER_COMPOSE) stop

restart: ## Start the project
	make stop
	make start

clean:
	@$(ARTISAN) cache:clear
	@$(EXEC_PHP) chmod -R 777 public/upload storage

install:
	@$(EXEC_PHP) php composer install

all:
	make install
	make clean

cli:
	@$(EXEC_PHP) bash
