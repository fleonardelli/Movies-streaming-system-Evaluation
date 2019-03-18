## Example of small distributed system about movies streaming.

The technology choosen for the BE is Laravel, because it supports *event driven architecture* and for its ease and speed for developing an API. FE will be separated from BE, and possibly it will be developed in Angular because it is a strong Framework that uses MVVC. 

## The whole system will include 3 microservices:

**Auth microservice:** CRUD of users. It will also work as a Middleware for authorisation.

**Subscription microservice:** CRUD of subscriptions for users. It will be the intermediate system, wich will be in charge of return wich movies could a user see depending of his plan and payment. 

**Movies microservice:** CRUD of movies. It will provide movies to the subscription microservice, but it could also provide an API for another microservice wich responsability is create, upload and delete movies. 

## DER

https://drive.google.com/file/d/1OMvxLsHgQj3mzX2TVHmtkbAQd8Wv8Te8/view?usp=sharing

We can see the scalability of the system, we can think about adding the *payment (billing) microservice* and/or a new feature could be *Series streaming* for wich we only need to add its own microservice, and it will use the subscriptions microservice. 
This system will only read the movies microservice, but, probably, another system will use the creation, update and delete actions.

On the other hand, **I limited the movies microservice** for find a movie saved in a path, but the best way is to have different servers provinding movies with a *load balancer* ahead. We should also have another microservice wich provides nationalities.

## RestFul API

All the request to the RestFul API are going to be filtered by the *Middleware*. It will check if the user is logged in, and if he is allowed to make the action. I will use HTTP status codes for responses.

### Movies API
As an example, in this project I will develop the movies microservice.

GET         |  localhost/api/movies    |   Get all movies

GET         |  localhost/api/movies/1  |   Get movie ID 1

POST        |  localhost/api/movies    |  Create movie

PUT         |  localhost/api/movies/1  |  Update movie ID 1

DELETE      |  localhost/api/movies/1  |  Delete (soft delete) movie ID 1.

GET         |  localhost/api/actors    |   Get all actors

GET         |  localhost/api/actors/1  |   Get actor ID 1

POST        |  localhost/api/actors    |  Create actor

PUT         |  localhost/api/actors/1  |  Update actor ID 1

DELETE      |  localhost/api/actors/1  |  Delete (soft delete) actor ID 1.

As an *event driven architecture*, we can see that when we create a new movie, an event starts and it has two listeners, one for sending an email to the users and another for adding the movie to a plan.


## Starting the project

1- Clone the repo

2- Run: service mysel stop AND service apache2 stop

3- Enter to the project folder

4- Run: composer install AND npm install

5- Run:  cp .env.example .env

6- Run: docker-compose up -d

7- Run: php artisan key:generate

8- The project should start in http://localhost

8.1- If you have permissions problems run: sudo chown www-data:www-data storage/ -R

9- Enter to the webserver container: docker-composer exec webserver bash

10- Run: php artisan migrate AND php artisan db:seed
