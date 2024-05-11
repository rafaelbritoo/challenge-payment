# challenge-payment
challenge to make a payment between customer and company


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
