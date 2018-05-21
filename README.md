Demo symfony app based on compo-plan app with docker / built for compo programmers / dev env
=========

Docker and docker-compose required to be installed

https://docs.docker.com/install/linux/docker-ce/ubuntu/#install-docker-ce

https://docs.docker.com/compose/install/#install-compose

**Install**

`git clone git@github.com:comporu/compo-plan.git`

**Install dependencies**

`composer install`

**Start up containers**

Better in new terminal

rights of the **var/** directory must be 777 before

`docker-compose up`

**Create DB**

`
docker container exec compo-plan-php php bin/console doctrine:schema:update --force
`


**Create super user**

`docker container exec compo-plan-php php bin/console fos:user:create root --super-admin test@test.ru 11111111`

this command will create super user with login **root** and password **11111111**

**Welcome**

Type http://localhost:8585/app_dev.php in browser address bar

Dashboard login/pass is as you created on previous step:

login: root
pass: 11111111

***Notes***

**parameters.yml.dist**

`parameters.yml.dist` has been configured for working with docker mysql container

Leave default database parameters while installing dependencies with composer

**Rights**

var/cache
var/sessions
var/logs folders required to have 777 rights

**Docker**

start up containers 

`docker-compose up`

`docker-compose up --build`

shut down containers 

`docker-compose down`

delete all containers with cache and networks 

`docker system prune -a`

**Console commands**

Since we are in docker containers, we need to run console commands in php container.

So ours lovely command `php bin/console <whatever>` must be turned to 

`docker container exec compo-plan-php php bin/console <whatever>` 

**compo-plan-php** is an alias for ours php container. see docker-compose.yml
