# Desafio de API feegow

## Project setup

```
git clone https://github.com/joaofds/feegow-api.git
```

## Navegar para o projeto

```
cd feegow-api
```

## Instalar as dependencias usando o composer

```
composer install
```

## Copiar o arquivo env-example e fazer os ajustes necessários

```
cp env-example .env
```

## Gerar nova chave de aplicação

```
php artisan key:generate
```

## Copiar a chave de acesso a api

```
FEEGOW_KEY=
```

## Rodar migration (**Setar conexão com o banco no .env antes de rodar**)

```
php artisan migrate
```

## Rodar servidor

```
php artisan serve --port 8088 (**O front-end espera a conexão nessa porta**)
```

## Acessar o endereço pelo navegador e verificar o retorno desse Json

```
{
    message: "api work fine... :)"
}
```

### Front-end desenvolvido para API

Veja aqui -> (https://github.com/joaofds/feegow-app).
