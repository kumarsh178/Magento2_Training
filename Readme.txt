After add Docker file and docker-compose.yml run below command
docker compose down
docker compose up -d --build

after that run shell command to run magento command:-
docker exec -it magento_web bash

then dowbload package:-
composer create-project \
--repository-url=https://repo.magento.com/ \
magento/project-community-edition=2.4.8 .

run below command to install :-
php -d memory_limit=-1 bin/magento setup:install \
--base-url=http://localhost:8080/ \
--db-host=db \
--db-name=magento \
--db-user=magento \
--db-password=magento \
--admin-firstname=Admin \
--admin-lastname=User \
--admin-email=admin@example.com \
--admin-user=admin \
--admin-password=Admin123! \
--backend-frontname=admin \
--language=en_US \
--currency=USD \
--timezone=UTC \
--use-rewrites=1 \
--search-engine=opensearch \
--opensearch-host=search \
--opensearch-port=9200


run below command to write permission:-
chown -R www-data:www-data .
find var generated vendor pub/static pub/media app/etc -type f -exec chmod 664 {} \;
find var generated vendor pub/static pub/media app/etc -type d -exec chmod 775 {} \;
