FROM debian:bookworm

RUN apt update -y; \
    apt install -y \
    php \
    php-cli \
    php-mysql \
    php-json \
    nginx \
    php-fpm \
    mariadb-client;

CMD ["tail", "-f", "/dev/null"]
