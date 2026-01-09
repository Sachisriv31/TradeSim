# TradeSim
Overview

TradeSim is a simulated trading platform developed to demonstrate backend API design and basic trading workflows such as placing orders, executing trades, and managing portfolio holdings.

No real market or live APIs are used.

🎯 Objective

To assess understanding of:

REST-style API design

Basic trading concepts

Order lifecycle & portfolio logic

🛠 Tech Stack

Frontend: HTML, CSS, JavaScript

Backend: PHP

Database: MySQL

Server: Apache (XAMPP/WAMP)

📂 Project Structure
index.php        → Trading UI
style.css        → UI styling
db.php           → DB connection
instruments.php  → Fetch instruments
place_order.php  → Place orders
orders.php       → Order status
trades.php       → Executed trades
portfolio.php    → Portfolio holdings

🔧 Features

View tradable instruments

Place BUY/SELL orders (MARKET & LIMIT)

Track order status

View executed trades

View portfolio holdings

🌐 API Endpoints
GET  /instruments.php
POST /place_order.php
GET  /orders.php
GET  /trades.php
GET  /portfolio.php
