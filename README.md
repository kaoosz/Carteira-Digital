<p align="center">
  <br>
  <img alt="m2 logo" width="100" src="https://media-exp1.licdn.com/dms/image/C4D0BAQEpfZLcM71kcA/company-logo_200_200/0/1658944494977?e=1675900800&v=beta&t=WRtDITIbSR55p4FJNNm6Ms8z78eMLGruMa6uzEaP_mg"/>
  <br>
</p>

# Instruções

Após a cópia, clone o repositório localmente:
```
https://github.com/kaoosz/Carteira-Digital.git
```
Instale todas as dependências.
```
Composer install
```
Crie um aquivo .env para configuaração.
```
cp .env.example .env
```
Gere uma chave unica indentificadora.
```
php artisan key:generate
```


samcrum?

# Endpoints

Primeiro 'cadastrese' para receber 1 token de acesso.

## Post Cadastrar (POST)

> `http://127.0.0.1:8000/api/user?name=tonin&email=tonin@gmail.com&password=123`

## Post Loguin (POST)

> `http://127.0.0.1:8000/api/login?email=gui@gmail.com&password=123`

**Agora ultilize o Bearer Token para acessar todos endpoints.**

IMAGE AQUi.

## GET Listar (GET)

**Mostra todos usuarios do sistema.**

> `http://127.0.0.1:8000/api/user`

**Mostra todas as carteiras com relacionamento dono user_id e wallet transactions, todas as transações feitas** CORIGIR O PROTUGUÊS
> `http://127.0.0.1:8000/api/wallet`

**Mostra as transaçoes apenas e a carteira que fez a transação**

> `http://127.0.0.1:8000/api/transaction`

## POST Create (POST)

**Criar carteira "user/1/" é o usuario com id 1 cadastrado, que irá criar essa carteira.**

> `http://127.0.0.1:8000/api/user/1/wallet`

**Criar uma transação ultilizando "wallet/3", é o id da wallet 3 que irá criar essa transação**
> `http://127.0.0.1:8000/api/wallet/3/transaction?name=vendido`

**Logout irá desconectar você, e perdera todos seus tokens tera que fazer loguin novamente para acessar o sistema.**

> `http://127.0.0.1:8000/api/logout`

## Delete Excluir (DELETE)

**Irá deletar o usuario com id 2 do banco de dados, e todas suas carteiras e transações associadas.**

> `http://127.0.0.1:8000/api/user/2`


