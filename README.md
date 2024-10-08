# Design-Thinking-Hackathon

In this repo you will find all the Information regarding the Bili Hackathon 2024 of Group 3 (Noemi, Dominik and Laura).

We are working on case 2 "Smart Homes" and focusing on the problem that many people don't have a lot of time for household chores and have problems remembering all the things they have to do.

Our solution is a scanner that can be attached to your fridge. You can scan products when you want to add them to your grocery list (e.g., if you notice your milk is running low, you scan it, and it gets added to the list). In the grocery list app, you can also order all the items from your preferred store.

With this scanner, it becomes easier to directly add items to your grocery list, so you don’t forget them while doing something else. The ability to order items directly from the list also saves a lot of time, whether grocery shopping or placing the order yourself.

You can find all the products and important info in the [wiki](https://github.com/lauraboro/Design-Thinking-Hackathon/wiki)

## Info
start the database with : docker compose up -d

apply the migrations to the db with : php artisan migrate

start the application with : php artisan serve

## Api Endpoint Overview

Get all products (GET): http://localhost:8000/api/getProducts/{listId} -> returns array of products like this [{"product_name":"test","product_barcode":"dfghjk","product_quantity":1,"product_image":null},{"product_name":"brot","product_barcode":"adsfg","product_quantity":1,"product_image":null}]

Delete product (DELETE): http://localhost:8000/api/deleteProduct/{productName}/{listId}

Register new User (POST): http://localhost:8000/api/register -> send username and password as body

Login existing User (POST): http://localhost:8000/api/login -> send username and password as body

Scan product (POST): http://localhost:8000/api/scan/{barcode} The product then gets automatically added to the list


