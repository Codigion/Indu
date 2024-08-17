
mkdir Assets/admin/models/versions/
mkdir Assets/uploads/COW_Picture/muzzle/



chown -R srv_chr:www-data cow-identifier/
chmod -R 750 cow-identifier/



  systemctl restart nginx
root@ip-172-31-33-250:/var/www/cow-identifier#  systemctl restart php7.4-fpm

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


chown ubuntu model.py
chmod u+s model.py

chown ubuntu /opt/lampp/htdocs/indu/Assets/admin/models/model.py
chmod u+s /opt/lampp/htdocs/indu/Assets/admin/models/model.py


chmod -R 755 /var/www/cow-identifier/


apt update
apt install python3-pip

sudo apt-get install libgl1-mesa-glx

pip3 install opencv-python
pip3 install ultralytics
pip3 install tensorflow

Config .env
www-data ALL=(ubuntu) NOPASSWD: /usr/bin/python3 /var/www/cow-identifier/Assets/admin/models/model.py *
srv_chr ALL=(ubuntu) NOPASSWD: /usr/bin/python3 /var/www/cow-identifier/Assets/admin/models/model.py *


Create process.txt
and increase 