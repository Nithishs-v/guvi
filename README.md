# Guvi Internship Task

it is a internship task to create a simple login,register and user profile.
## Tech Stack
- **HTML**
- **CSS** 
- **JAVA SCRIPT**
- **PHP**
- **MYsql**
- **MONGODB**
# SCREEENSHOT
![home](https://github.com/user-attachments/assets/e9f72d8a-75ad-48d8-83eb-a876e9ae6141)
![login](https://github.com/user-attachments/assets/00010fc5-01e9-4a3e-b1b7-ceda3a07506e)
![register](https://github.com/user-attachments/assets/34c40738-be4b-47d9-a208-fe3e727236bf)
![profile](https://github.com/user-attachments/assets/46fefdd2-a7a1-4e09-8361-9f08ee35b25f)
![profiledata](https://github.com/user-attachments/assets/db895b7c-3dff-4c9c-ae1e-f4182a70269c)


![sqldb](https://github.com/user-attachments/assets/5a48efeb-1d2e-45e5-85dc-c65d10beb7be)
![mongodb](https://github.com/user-attachments/assets/b5c7e1d6-38c2-418d-8471-7595b20c4398)
## Installation
- **MongoDb** 
- **Redis**
- **Xampp**
  ##  Install MongoDB PHP Extension  For Windows
Step 1: Install MongoDB PHP Extension
Before using MongoDB with PHP, you need to install the MongoDB PHP extension.
Download the appropriate .dll file from PECL: MongoDB.
Place it in the ext folder of your PHP installation.
Add the following line to your php.ini file:

Step 2: Install MongoDB Driver via Composer
Once the PHP extension is installed, install the MongoDB driver using Composer:
```bash
   extension=mongodb
```
```bash
   composer require mongodb/mongodb
```
## Install Redis PHP Extension For Windows
Step 1: Install PHP Redis Extension
Download the correct Redis extension for your PHP version from PECL: PHP Redis Extension.

Step 2:Place the downloaded .dll file into the ext directory of your PHP installation.
Edit your php.ini file and add:
ini
Copy
Edit


```bash
   extension=redis

```
Step 3:
Open Command Prompt and run
```bash
   redis-server
```
```bash
   redis-cli

```
If you see 127.0.0.1:6379>, Redis is running.
## DataBase
In this task, I can use two different databases: MySQL and MongoDB.
- **MYSql:** used in Register Page and Login Page. 
-  Database - new
-  Table  -users
- **MongoDb:** used  in user Profile page to add and update  the data
- Collection - Guvi
- Documents -profile
  ```bash
   use guvi
  
  ```
 ```bash
 db["profile"].find()
```
