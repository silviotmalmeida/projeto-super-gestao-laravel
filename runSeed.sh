#!/bin/bash

echo "Definindo permissoes da pasta de código-fonte..."
docker container exec super-gestao-laravel chmod 777 -R /root
sleep 1

echo "Executando o seed de dados de teste..."
docker container exec -it super-gestao-laravel bash -c "cd /root/app_super_gestao; php artisan db:seed;"
