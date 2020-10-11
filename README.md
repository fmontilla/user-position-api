# User Position API

API desenvolvida em Lumen versão 8.x

## Requisitos para rodar o projeto

Ter o docker instalado.

## Rodando o projeto

- Rodar o comando git clone com o caminho apresentado no github
- Entrar na pasta do projeto via terminal e rodar o comando docker-compose up -d
- Rodar o comando docker exec -it user-position-api_app_1 sh para acessar o container
- Rodar o comando composer install
- Rodar o comando cp .env.example .env
- Para o próximo passo, recomendo ter uma IDE de banco de dados. Para prosseguir, será necessário criar um banco de dados user_position_api ou com o nome que desejar, porém tendo que ser alterado no arquivo .env posteriormente
- Após criar a base de dados, rodar o comando php artisan migrate --seed dentro do container para criar as tabelas e registros de teste (Obs.: caso caia o container do banco de dados, sair do container do terminal digitando exit, verificar os containers de pé rodando docker ps, e caso o container do banco de dados não estiver de pé, rodar novamente docker-compose up -d)

## Rodando testes unitários

Para rodar testes unitário, entrar no container e digitar o comando ./vendor/bin/phpunit

## Arquitetura

Foi utilizado SOLID, TDD, arquitetura em 4 camadas utilizando Controller, Service, Repository, Validators.

## Documentação

https://documenter.getpostman.com/view/8920139/TVRkaTMr
