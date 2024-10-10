# Design-Thinking-Hackathon

In this repo you will find all the Information regarding the Bili Hackathon 2024 of Group 3 (Noemi, Dominik and Laura).

We are working on case 2 "Smart Homes" and focusing on the problem that many people don't have a lot of time for household chores and have problems remembering all the things they have to do.

Our solution is a scanner that can be attached to your fridge. You can scan products when you want to add them to your grocery list (e.g., if you notice your milk is running low, you scan it, and it gets added to the list). In the grocery list app, you can also order all the items from your preferred store.

With this scanner, it becomes easier to directly add items to your grocery list, so you don’t forget them while doing something else. The ability to order items directly from the list also saves a lot of time, whether grocery shopping or placing the order yourself.

You can find all the products and important info in the [wiki](https://github.com/lauraboro/Design-Thinking-Hackathon/wiki)

## Info
start the database with : docker compose up -d

install dependencies: composer install

apply the migrations to the db with : php artisan migrate

start the application with : php artisan serve

## Api Endpoint Overview

Get all products (GET): http://localhost:8000/api/getProducts/{listId} -> returns array of products like this [{"product_name":"test","product_barcode":"dfghjk","product_quantity":1,"product_image":null},{"product_name":"brot","product_barcode":"adsfg","product_quantity":1,"product_image":null}]

Delete product (DELETE): http://localhost:8000/api/deleteProduct/{productName}/{listId}

Register new User (POST): http://localhost:8000/api/register -> send username and password as body

Login existing User (POST): http://localhost:8000/api/login -> send username and password as body

Scan product (POST): http://localhost:8000/api/scan/{barcode}/{scannerId} The product then gets automatically added to the list

## Scanner Setup
This project enables you to run a scanner script on any device that can run Python3 and supports a standard USB webcam.
While developing the prototype a Raspbery Pi 5 was used in combination with a regular webcam.

### Requirements
- Python3 is installed
- The following Python3 Libraries are installed: cv2, pyzbar, imutils, time, requests
- USB Webcam

### Setup Instructions
1. Copy the script onto the device
2. Navigate to the script directory (cd path/to/your/directory)
3. Run the script (python scanner.py)
4. Enter Scanner ID (After running the script, you will be prompted to input the Scanner ID. Currently, only one scanner is registered in the backend with the ID 1. Please enter 1 to proceed.)

Now you should be able to scan any product with your webcam. 

### Backend Connectivity
The connection to the scanner-backend is needed to send the decoded barcode to the backend, that will handle getting the product name of the "Open Food Facts API" and add it to the grocery list of the user.
There are two possibilities, to connect to the backend, depending on where the backend is hosted:

1. If the backend is running on the same Raspberry Pi, ensure that line 30 of scanner.py is configured as follows: url = f"http://localhost:8000/api/scan/{data}/{scannerId}"
2. If the backend is hosted on a different device, replace <IP of the backend device> with the actual IP address of the device running the backend: url = f"http://<IP of the backend device>:8000/api/scan/{data}/{scannerId}"
