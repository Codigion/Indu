
mkdir Assets/admin/models/versions/
mkdir Assets/uploads/
mkdir Assets/uploads/COW_Picture/
mkdir Assets/uploads/COW_Picture/muzzle/



chown -R www-data:www-data cow-identifier/
chmod -R 750 cow-identifier/




server {
    client_max_body_size 628M;

    # Increase timeouts
    proxy_connect_timeout 600;
    proxy_send_timeout 600;
    proxy_read_timeout 600;
    send_timeout 600;
    ...
}
sudo nano /etc/php/7.4/fpm/pool.d/srv_chr.conf

php_value[post_max_size] = 628M
php_value[upload_max_filesize] = 628M

sudo nano /etc/php/7.4/fpm/php.ini

post_max_size = 628M
upload_max_filesize = 628M


apt install sudo



apt update
apt install python3-pip

sudo apt-get install libgl1-mesa-glx

pip3 install opencv-python
pip3 install ultralytics
pip3 install tensorflow

Config .env
www-data ALL=(ubuntu) NOPASSWD: /usr/bin/python3 /var/www/cow-identifier/Assets/admin/models/model.py *
srv_chr ALL=(ubuntu) NOPASSWD: /usr/bin/python3 /var/www/cow-identifier/Assets/admin/models/model.py *


Create process.log
and increase 




  systemctl restart nginx

  systemctl restart php7.4-fpm



# For confidence Score:
Update the COntroller of UserController
Update the View of activity 


Push all prject folder


server {
    root /var/www/cow-identifier;
    index index.php index.html;
    server_name cow-identifier.codigion.com;

    client_max_body_size 628M;

    # Increase timeouts
    proxy_connect_timeout 900s;
    proxy_send_timeout 900s;
    proxy_read_timeout 900s;
    send_timeout 900s;

    location / {
        rewrite ^/([^/]+)$ /?url=$1 last;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php7.4-fpm-srv_chr.sock;

        # Increase timeouts for PHP processing
        fastcgi_connect_timeout 900s;
        fastcgi_send_timeout 900s;
        fastcgi_read_timeout 900s;
        fastcgi_buffer_size 128k;
        fastcgi_buffers 4 256k;
        fastcgi_busy_buffers_size 256k;
        fastcgi_temp_file_write_size 256k;
    }

    location ~ /\.ht {
        deny all;
    }

    location ~ /\.git {
        deny all;
    }

    location ~* /\.(.+)/ {
        deny all;
    }

    location ~ /mail.py {
        deny all;
    }

    location ~ /THE_DATABASE_BACKUP.sql {
        return 404;
    }

