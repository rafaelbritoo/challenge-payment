# challenge-payment
challenge to make a payment between customer and company

# Setup Docker Para o projetos


### Passo a passo

Suba os containers do projeto
```sh
docker compose up -d --build
```


Acessar o container
```sh
docker compose exec app bash
```


Instalar as dependências do projeto
```sh
cd application/
composer install
```

Acessar o projeto
[http://localhost:8000](http://localhost:8989)

# Estrutura banco de dados

*Tables*

- Users:

    - id (Chave Primária) [INT]
    - full_name [VARCHAR(255)]
    - cpf (único) [VARCHAR(14)] (ou seja, 11 dígitos numéricos + 3 caracteres de formatação)
    - cnpj (único) [VARCHAR(18)] (ou seja, 14 dígitos numéricos + 4 caracteres de formatação)
    - email (único) [VARCHAR(255)]
    - password [VARCHAR(255)]
    - user_type [ENUM('comum', 'lojista')]

- Transfers:

    - id (Chave Primária) [INT]
    - payed_user_id (Chave Estrangeira referenciando UserID da tabela Users) [INT]
    - payee_user_id (Chave Estrangeira referenciando UserID da tabela Users) [INT]
    - amount [DECIMAL(10, 2)]
    - status [ENUM('pendente', 'autorizada', 'concluída', 'revertida')]
    - timestamp [TIMESTAMP]

- Wallet:
    - id (Chave primaria) [INT]
    - user_id (Chave Estrangeira referenciando UserID da tabela Users) [INT]
    - balance [DECIMAL(10, 2)]
