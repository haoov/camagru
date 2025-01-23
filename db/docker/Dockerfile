FROM debian:bookworm

RUN apt update -y; \
    apt upgrade -y; \
    apt install default-mysql-server -y;

RUN rm -rf /var/lib/mysql; \
    mkdir -p /var/lib/mysql /var/run/mysqld; \
    chown -R mysql:mysql /var/lib/mysql /var/run/mysqld; \
    chmod 777 /var/run/mysqld;

COPY ./entrypoint.sh /entrypoint.sh

RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]

CMD ["mysqld", "--user=mysql", "--bind-address=0.0.0.0"]
