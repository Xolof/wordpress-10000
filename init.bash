#!/usr/bin/env bash

docker-compose up -d

sleep 3

echo "Restoring database from mysqldump."

workdir=${PWD##*/}

image="${workdir}_db_1"

docker cp ./uploads ${image}:/wp-content/

docker cp ./migrate.sql ${image}:/

docker exec -it ${image} bash -c "mysql -uroot -ppass exampledb < migrate.sql"

echo "Done."
