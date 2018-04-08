<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
</p>

## Student Loop

Student Loop é uma aplicação simples (CRUD) desenvolvida como parte de um processo seletivo. O usuário pode inserir, deletar, editar e ver registros de alunos com os seguintes campos:
- Nome (100 caracteres)
- Data de Nascimento (Data válida)
- Série de Ingresso (1o ao 9o ano)
- CEP (CEP válido)
- Rua (120 caracteres)
- Número (Apenas números)
- Complemento (50 caracteres)
- Bairro (100 caracteres)
- Cidade (100 caracteres)
- Estado (2 caracteres)
- Nome da mãe (100 caracteres)
- CPF da mãe (CPF válido)
- Data preferencial para pagamento da mensalidade (Data válida)

Todos os campos possuem validação no front-end e no back-end. Os campos do endereço são preenchidos automaticamente a partir do CEP.

## Instalação

É necessário ter instalado o servidor Apache com PHP (a versao utilizada no desenvolvimento foi 7.1.16), MySQL e o Composer. Também é necessário criar um banco de dados. Depois disso, executar de dentro da pasta do Apache:

- git clone https://github.com/bordax/StudentLoop.git
- cd student-loop
- mv environment .env
- Preencher os campos DB_DATABASE, DB_USERNAME, DB_PASSWORD no arquivo .env
- composer install
- php artisan migrate --seed
- php artisan serve

Se tudo correr bem, basta acessar a aplicação em http://localhost:8000

