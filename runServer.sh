#!/bin/bash

echo "Definindo permissoes da pasta de código-fonte..."
docker container exec super-gestao-laravel chmod 777 -R /root
sleep 1

echo "Iniciando o servidor..."
docker container exec -it super-gestao-laravel bash -c "cd /root/app_super_gestao/public; php -S 0.0.0.0:8080;"
