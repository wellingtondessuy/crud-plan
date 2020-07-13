# crud-plan
Esse projeto foi realizado para avaliação em oportunidade no Grupo Plan Marketing.

Para teste do projeto siga os seguintes passos:

1 - Clone o repositório

2 - Dentro da pasta do repositório execute:
    
    git submodule add https://github.com/Laradock/laradock.git
    cp laradock.env laradock/.env
    cd laradock && docker-compose up -d nginx mysql
    docker-compose exec workspace bash

    Já dentro do container execute: 

    composer install

    Saia do container com o comando `exit`.

3 - Acesse http://localhost.

