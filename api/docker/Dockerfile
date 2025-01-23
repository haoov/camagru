FROM debian:bookworm

ARG DB_HOSTNAME
ARG DB_NAME
ARG DB_ADMIN
ARG DB_ADMIN_PASSWD

RUN apt update -y; \
    apt install -y \
    php \
    php-cli \
    php-mysql \
    php-json \
    nginx \
    php-fpm \
    mariadb-client \
	netcat-openbsd;

RUN mkdir /api;

RUN sed -i -E 's/^(listen\s=\s).*/\10.0.0.0:9000/' /etc/php/8.2/fpm/pool.d/www.conf;

RUN	echo "env[DB_HOSTNAME] = $DB_HOSTNAME" >> /etc/php/8.2/fpm/pool.d/www.conf; \
	echo "env[DB_NAME] = $DB_NAME" >> /etc/php/8.2/fpm/pool.d/www.conf; \
	echo "env[DB_ADMIN] = $DB_ADMIN" >> /etc/php/8.2/fpm/pool.d/www.conf; \
	echo "env[DB_ADMIN_PASSWD] = $DB_ADMIN_PASSWD" >> /etc/php/8.2/fpm/pool.d/www.conf;

CMD ["php-fpm8.2", "-F"]
