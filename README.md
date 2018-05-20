Compo-plan demo with docker 
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
`docker-compose up`

**Create DB**

`
docker container exec compo-plan-php php bin/console doctrine:schema:update --force
`


**Create super user**

`docker container exec compo-plan-php php bin/console fos:user:create root --super-admin`

**Welcome**

Type http://localhost:8585/ in browser address bar

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