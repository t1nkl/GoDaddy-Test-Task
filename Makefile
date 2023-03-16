PROJECT_NAME?=godaddy_test

DOCKER_COMPOSE_FILE=.docker/docker-compose.yml

run:
	docker network create godaddy_test_network || echo 'godaddy_test_network network exists'
	docker network create godaddy_test_db || echo 'godaddy_test_db network exists'
	@test -f ${DOCKER_COMPOSE_FILE} && docker-compose -p ${PROJECT_NAME} -f ${DOCKER_COMPOSE_FILE} up -d

stop:
	@test -f ${DOCKER_COMPOSE_FILE} && docker-compose -p ${PROJECT_NAME} -f ${DOCKER_COMPOSE_FILE} stop -t 0

rm: stop
	@test -f ${DOCKER_COMPOSE_FILE} && docker-compose -p ${PROJECT_NAME} -f ${DOCKER_COMPOSE_FILE} rm -fv

restart: rm run

logs:
	@test -f ${DOCKER_COMPOSE_FILE} && docker-compose -p ${PROJECT_NAME} -f ${DOCKER_COMPOSE_FILE} logs -ft --tail=500 ${SERVICE}

ps:
	@test -f ${DOCKER_COMPOSE_FILE} && docker-compose -p ${PROJECT_NAME} -f ${DOCKER_COMPOSE_FILE} ps

ssh:
	docker exec -it ${PROJECT_NAME}_fpm bash
