# Desafio Hacktools
Projeto realizado para o desafio da AgroTools.

## Requisitos para o teste

O desafio se dará da seguinte forma - Construir um sistema web responsivo, que deverá:

- Criar questionário (Visto que cada usuário pode configurar um ou mais questionários para serem respondidos)
- Responder um questionário
- Telas
- Ao clicar sobre o questionário respondido, listar as respectivas perguntas e respostas realizadas
- Tela de responder questionário
- Tela de criar um questionário

Observações:

- Criar o backend de ao menos uma rota. As demais chamadas podem ser utilizado mock
- Não é necessário realizar o acesso ao banco. Pode configurar um arquivo json (ou algo que o valha) para massa de dados de exemplo.
- Um questionário deverá apresentar apenas perguntas com respostas do tipo texto.
- Para o frontend, idealmente, não utilizar tecnologias como Vue.js React e outros.
- Estruturas a serem consideradas:
- Questionário: Título, Usuário, Data de cadastro
- Resposta: Resposta, Data de cadastro, Localização Atual - LAT e LONG

## Desenvolvimento
Seguindo a recomendação do desafio, dicidi não utlizar frameworks para o projeto. <br>
Desenvolvi utilzando a arquitetura MVC com as linguagens PHP, HTML, CSS e Javascript. <br>

## Testando o projeto
- Primeiro importe o arquivo **desafio_hacktools.sql** para configurar o banco de dados MySQL
- Acesse o diretório public
```bash
cd public
```
- Inicie o servidor do PHP na porta desejada
```bash
php -S localhost:8080
```
