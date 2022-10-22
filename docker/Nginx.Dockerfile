FROM nginx
ADD ./nginx_conf/nginx.conf /etc/nginx/conf.d/default.conf
WORKDIR /var/www/laravel-docker