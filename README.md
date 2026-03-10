# treinamento_horus
Um crud estilisado usando php,html, csss e javascript

Este projeto foi feito com base no livro `PHP Programação orientada a objeto: 4ª Edição Pablo Dall’Oglio` como um desafio do treinamento da [horussistem](https://www.horussistemas.com/).

## tecnologias
* php 
* html
* css
* javascript
* Mysql 


## projeto
```
┣ classes            # classes de domínio
┃ ┗ pessoa.php
┣ db                 # acesso ao banco
┃ ┗ pessoa_db.php
┣ html               # templates
┃ ┣ form.html
┃ ┣ item.html
┃ ┗ list.html
┣ css
┃ ┗ form.css
┣ sobressalentes     # scripts auxiliares
┃ ┗ pessoa_delete.php

```

## Como executar

1. Clone o repositório
```bash
git clone https://github.com/seu-usuario/treinamento_horus
```
2. Importe o banco de dados
```bash
mysql -u root -p < treinamento.sql
```
4. Inicie um servidor PHP
```bash
php -S localhost:8000
```

5. Acesse
```bash
http://localhost:8000/pessoa_list.php
```
## Progresso
- [x] Level 1
- [x] Level 2
- [x] Level 3
- [x] Level 4
- [ ] Level 5
- [ ] Level 6
- [ ] Level 7