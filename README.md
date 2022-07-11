# REC Automação Industrial
## _RECMES_

[![](https://img.shields.io/badge/DOCKER-1.0-blue.svg)](
    schemes://recmes/docker-1.0.html)

# Instalação

Instale o Docker seguindo a documentação oficial - [Docker](https://docs.docker.com/install/).

Logo após, instale o Docker-compose seguindo a documentação oficial - [Docker-compose](https://docs.docker.com/compose/install/).

Verifique se o Docker e o Docker-compose estão instalados corretamente.

    docker --version
    docker-compose --version

Após concluir o processo de instalação, faça login no Docker Hub.
```
    docker login
```	


# Organizando a aplicação na sua máquina

Crie um diretório chamado `recmes` e coloque o arquivo `docker-compose.yml`, `Dockerfile` e crie um diretório chamado `src`.

# Imagem
O nome da imagem é sempre baseado nesse modelo:
```
<usuario>/<nome-do-projeto>:<versão>
```
no nosso caso, o nome da imagem será:
```
recautomacao/recmes:1.0
```

# Diretório: src
O diretório `src` contém o código fonte da aplicação.


# Dockerfile

```
FROM php:7.4-apache

COPY ./src /var/www/html

RUN docker-php-ext-install pdo pdo_mysql
```
Voce está usando o Dockerfile para criar um container que rode o PHP 7.4 com o Apache. \
Caso queira usar o PHP 8.0, basta substituir o `php:7.4-apache` por `php:8.0-apache`. 

## Explicando o Dockerfile
No comando: 
```
FROM php:7.4-apache
``` 
Usamos a imagem `php:7.4-apache` para criar o container.\
A imagem `php:7.4-apache` é uma imagem do Docker que roda o PHP 7.4 com o Apache.

No comando: 
```
COPY ./src /var/www/html
```
Copiamos o diretório `src` para o diretório `/var/www/html` \
O diretório `/var/www/html` é o diretório onde o Apache está instalado.\
O diretório `src` é o diretório onde estão os arquivos do código fonte.\
Dessa forma o nosso codigo fonte está copiado dentro do diretório `/var/www/html` que esta dentro do container.\

No comando: 
```
RUN docker-php-ext-install pdo pdo_mysql
```
Esse comando instala o módulo `pdo` e `pdo_mysql` no container.\
Usamos esse comando para acessar o banco de dados.
Dessa forma podemos acessar um banco externo ao container.

## Rodando o Dockerfile
No terminal, dentro do diretótio, execute o comando:
```
docker build -t recautomacao/recmes:1.0 . 
``` 
Lembre-se de que o nome do container é `recautomacao/recmes:1.0` mas você pode mudar isso. \
O comando `docker build` cria um container que roda o código fonte da aplicação com o Docker.
Após o comando `docker build`, você pode executar o comando `docker push` para publicar o container no Docker Hub.\
Comando:
```
docker push recautomacao/recmes:1.0
```



# docker-compose.yml

```
services:

  app:

    image: recautomacao/sistema-proposta:1.0
    restart: always
    ports:
      - 80:80
    
    
```
O docker-compose.yml é um arquivo de configuração que define os containers que serão criados.\
## app
No serviço `app`, definimos a imagem que será executada.\
Nós criamos um container chamado `app` que roda o código fonte da aplicação.\
## image
A imagem deve ser alterada para a imagem que você deseja rodar.\
No caso, nós criamos um container que roda o código fonte da aplicação.\
## restart
O comando `restart` define se o container será reiniciado quando ocorrer um erro.\
No caso, o container será reiniciado sempre que ocorrer um erro.\
## ports
O comando `ports` define as portas que o container deve escutar.\
No caso, o container escutará a porta 80.\
Você pode definir várias portas, por exemplo:
```
ports:
  - 80:80
  - 443:443
```

## Rodando o docker-compose.yml
No terminal, dentro do diretório, execute o comando:
```
docker-compose up 
```
ou
```
docker-compose up -d
```
O comando `up` inicia o container e o comando `up -d` inicia o container e o mantém rodando. \
Agora é só acessar o ip na porta 80. \
O ip é o ip da máquina que está rodando o Docker. \
Você pode acessar o ip da máquina que está rodando o Docker através do comando `docker-machine ip`.\


## Comando docker run
No terminal, execute o comando:
```
docker run -p 80:80 recautomacao/recmes:1.0
```
O comando `docker run` inicia o container.\
O comando `-p` define a porta que o container deve escutar.\
No caso, o container escutará a porta 80.\
O comando `recautomacao/recmes:1.0` é o nome do container que será executado.\
Mas caso voce queira rodar dois containers, você pode criar um comando como:
```
docker run -p 443:443 recautomacao/recmes:1.0
docker run -p 80:80 recautomacao/recmes:1.0
```
Dessa forma, dois container serão executados em duas portas. \
Essa configuração é muito útil para testar o sistema.\
Onde na primeira porta você pode deixar o container rodando e na segunda porta você pode testar o sistema em outro container.