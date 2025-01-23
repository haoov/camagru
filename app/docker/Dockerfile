FROM debian:bookworm

RUN apt update -y; \
    apt upgrade -y; \
    apt install -y \
    nginx;

RUN rm /etc/nginx/sites-enabled/default

COPY server.conf /etc/nginx/conf.d/default.conf

CMD ["nginx", "-g", "daemon off;"]
