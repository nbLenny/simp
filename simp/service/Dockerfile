# ---- START AREA THAT CAN BE MODIFIED
FROM ubuntu:18.04

ENV TZ=Asia/Saigon

ENV LANG C.UTF-8

ENV PYTHONIOENCODING=UTF-8



RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN sed -i 's|http://archive.ubuntu.com|http://vn.archive.ubuntu.com|g' /etc/apt/sources.list

RUN apt-get update && apt-get install -y python python-pip nginx php-fpm php-mysql mysql-server 
#RUN echo "phpmyadmin phpmyadmin/internal/skip-preseed boolean true" | debconf-set-selections
#RUN echo "phpmyadmin phpmyadmin/reconfigure-webserver multiselect" | debconf-set-selections
#RUN echo "phpmyadmin phpmyadmin/dbconfig-install boolean false" | debconf-set-selections



RUN pip install mysql-connector

COPY web.sql /docker-entrypoint-initdb.d
ADD web.sql /docker-entrypoint-initdb.d
RUN mkdir /usr/sql
RUN chmod 644 /usr/sql
ADD ["web.sql", "/usr/sql/web.sql"]
RUN service mysql stop

RUN service nginx start
#RUN sed -i "s|bind-address|#bind-address |g" /etc/mysql/mysql.conf.d/mysqld.cnf 
#RUN mysql  --port 3306 --protocol=tcp -u root
RUN service mysql start && sleep 10 && \
mysql -e "USE mysql;" && \
 mysql -e "CREATE USER 'out_test'@'%' IDENTIFIED BY '123456';GRANT ALL PRIVILEGES ON *.* TO 'out_test'@'%';" &&\
 mysql -e "CREATE DATABASE web;" && \
 mysql web < /usr/sql/web.sql

RUN ln -s /usr/share/phpmyadmin /var/www/html

#CUSTOMIZE YOUR CONTAINER TO RUN THE SCRIPTS HERE!
RUN service php7.2-fpm stop
RUN sed -i "s|cgi.fix_pathinfo=1|cgi.fix_pathinfo=0 |g" /etc/php/7.2/cli/php.ini
RUN service php7.2-fpm start && sleep 10

#RUN   echo "    location ~ \.php$ {" >> /etc/nginx/sites-available/default
#RUN   echo "            include snippets/fastcgi-php.conf;" >> /etc/nginx/sites-available/default
#RUN   echo "            fastcgi_pass unix:/run/php/php7.2-fpm.sock;" >> /etc/nginx/sites-available/default
#RUN   echo "    }" >> /etc/nginx/sites-available/default

RUN service nginx start

