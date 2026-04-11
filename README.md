    # 📦 ISMD Midterm Exam System

![Laravel](https://img.shields.io/badge/Laravel-10.x-red?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.x-blue?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange?style=for-the-badge&logo=mysql)
![Node.js](https://img.shields.io/badge/Node.js-18+-green?style=for-the-badge&logo=node.js)
![License](https://img.shields.io/badge/License-MIT-lightgrey?style=for-the-badge)

> A multi-role Laravel system for managing users, roles, and shop operations for the ISMD Midterm Exam project.

---

## 🚀 Project Setup Guide

### 📥 1. Clone the Repository

```bash
git clone <repository-url>
    
    
    step need to  follow on howto set up this system 

    1st step: copy  the codein the repo.
    2nd step: clone it tin the VS Studio and locate it in drivec/laragon/www
    3rd step: bash command  composer intall, to fix the error in the code.
    if thier is error like this In Filesystem.php line 
    913:                
    file_put_contents(C:/laragon/www/ISMD-Midterm-Exam-Repo/vendor/composer/installed.php): Failed to open stream: Resource temporarily unavailable  
    bash composer update  in the terminal

    4th step: set up env
    bash  the following command
    copy  .env.example .env to copy the  env.example  for env  file

    5th step:  run  migration  and   seeder by bash a 

    command php  artisan migrate --seed and type  yes
    and bash   php artisan key:generate

    6th step:  installing preline by  bash the command  npm i preline  or npm install preline  and npm run  build  to generate the ui.

    7th step: serving tothe local  host   by running hte command  php artisan serve.

    9th step:  you can access the admin dashboard   by the default email  and  password

    email:admin@gmail.com
    password:password123

    step:10 register user and thier is a default role as a owner and add employee.


    
---

If you want next upgrade, I can also:
- Add **project architecture diagram (ERD + DFD section)**
- Add **Laravel folder structure explanation**
- Or make a **professional PDF documentation for submission**

Just tell me 👍


