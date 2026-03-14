# Treinamento horus
![PHP](https://img.shields.io/badge/PHP-8.4-787CB4)
![MySQL](https://img.shields.io/badge/MySQL-Database-00618A)
![Status](https://img.shields.io/badge/status-concluído-green)

Este projeto implementa um CRUD de pessoas utilizando PHP procedural,
com separação simples entre camada de dados, templates HTML e scripts
de controle.

O objetivo foi praticar conceitos apresentados no livro *PHP Programação orientada a objeto: 4ª Edição Pablo Dall’Oglio* como um desafio do treinamento da [Hórus Sistemas](https://www.horussistemas.com/).

## Documentação
- [Banco de Dados](/document/db.md)


## Tecnologias utilizadas
- PHP
- MySQL
- HTML
- CSS
- JavaScript
- Apache

## Funcionalidades

- Cadastro de pessoas
- Edição de registros
- Exclusão de registros
- Listagem de pessoas
- Associação de pessoas a cidades
- Associação de cidades a estados

## Diagrama do projeto

```
📦treinamento_horus_php
┣ 📂classes
┃ ┣ 📜Cidade.php
┃ ┣ 📜Pessoa.php
┃ ┣ 📜PessoaForm.php
┃ ┗ 📜PessoaList.php
┣ 📂config
┃ ┣ 📜apache2.conf
┃ ┗ 📜livro.ini
┣ 📂css
┃ ┣ 📜form.css
┃ ┗ 📜list.css
┣ 📂db
┃ ┗ 📜pessoa_db.php
┣ 📂html
┃ ┣ 📜form.html
┃ ┣ 📜item.html
┃ ┗ 📜list.html
┣ 📂javascript
┃ ┗ 📜form.js
┣ 📂temp
┃ ┗ 📜lista_combo_cidades.php
┣ 📜README.md
┣ 📜index.php
┗ 📜treinamento.sql

```

## Estrutura do projeto

- **classes/** → lógica de aplicação
- **db/** → acesso ao banco de dados
- **html/** → templates HTML
- **css/** → estilos da interface
- **javascript/** → scripts do frontend
- **config/** → arquivos de configuração

## Funcionalidades

- Cadastro de pessoas
- Edição de registros
- Exclusão de registros
- Listagem de pessoas
- Associação de pessoas a cidades
- Associação de cidades a estados

---
## Como executar

1. Clone o repositório
```bash
git clone https://github.com/seu-usuario/treinamento_horus
```
2. Importe o banco de dados e o 
```bash
mysql -u < seu usuario > -p < db/treinamento.sql
mysql -u < seu usuario > -p < db/insert.sql
```
4. Inicie um servidor PHP
```bash
php -S localhost:8000
```

5. Acesse
```bash
http://localhost:8000/
```
## Progresso
- [X] Level 1
- [X] Level 2
- [X] Level 3
- [X] Level 4
- [X] Level 5
- [X] Level 6
- [X] Level 7