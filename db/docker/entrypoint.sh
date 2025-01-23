#!/bin/bash

if [ ! -d "/var/lib/mysql/mysql" ]; then
  mariadb-install-db --user=mysql --datadir=/var/lib/mysql --skip-test-db
  service mariadb start
  sleep 5

  mysql << EOF
ALTER USER 'root'@'localhost' IDENTIFIED BY '${DB_ROOT_PASSWD}';
CREATE DATABASE \`${DB_NAME}\`;
GRANT ALL ON *.* TO 'root'@'localhost' WITH GRANT OPTION;
CREATE USER '${DB_ADMIN}'@'%' IDENTIFIED BY '${DB_ADMIN_PASSWD}';
GRANT ALL ON \`${DB_NAME}\`.* TO '${DB_ADMIN}'@'%';
FLUSH PRIVILEGES;
EOF

  mariadb-admin -p${DB_ROOT_PASSWD} shutdown
fi

exec "$@"
