# What is this project ?

HotelManager is a management web app that allow employees to to manage the reservation of rooms, restaurants, swimming pool, conference room, etc.

# Installation

## 1. Clone project

```bash
https://github.com/EdenSchoolFrance/hotelManagerLyon_2023/tree/main
```
## 2. Install Composer
```bash
composer install
/* Install all dependencies of the /vendor/ folder */
```
```bash
composer dumpt-autoload
/* Load all classes, run this command if you get the error 'require(vendor/autoload.php): failed to open stream' */
```

## 3. Start localhost
### Open a shell in /public/ folder
```bash
PHP -S localhost:8000
/* Or a non used port on your network */
```

