Hello...

To run project

    1- php artisan migrate:fresh --seed

    2- Update .env

        QUEUE_CONNECTION=database

        MAIL_DRIVER=smtp
        MAIL_HOST=smtp.mailtrap.io
        MAIL_PORT=2525
        MAIL_USERNAME=533c5d498c200d
        MAIL_PASSWORD=93f092ae764e85
        MAIL_ENCRYPTION=TLS

    3- crontab -e

        * * * * * cd /var/www/html/project-name && php artisan schedule:run >> /dev/null 2>&1

    in localhost

        - php artisan serve

    to test sending of Email

        - php artisan queue:work

    to test sending of Email every hour
        - php artisan send:email
    
    To Browse Task
    
        goto -> http://127.0.0.1:8000
    
