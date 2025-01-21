FROM debian:bookworm

RUN apt update -y; \
    apt upgrade -y; \
    apt install -y \
    nginx;

RUN rm -f /etc/nginx/sites-enabled/default

COPY reverse_proxy.conf /etc/nginx/conf.d/reverse_proxy.conf

CMD ["nginx", "-g", "daemon off;"]
