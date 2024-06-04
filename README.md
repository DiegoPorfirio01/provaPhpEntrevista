# Teste de conhecimentos PHP + Banco de dados

### 🚀 Docker Feature Adicionada!
Para rodar o projeto usaremos containers Docker. Os containers são nginx, mysql, php. Garanta que você tenha o Docker instalado em sua máquina.

1. 🛠️ **Acesse a pasta do projeto e execute:**
    ```sh
    docker-compose up -d
    ```
    Isso vai subir os containers necessários para a aplicação rodar.

2. 📂 **Após isso, acesse a pasta `www` e rode o comando:**
    ```sh
    docker-compose exec php php /www/migrateAndSeedScript.php
    ```
    Isso vai fazer com que as tabelas e dados iniciais sejam criados.

> 🔔 **Nota:** Esta é uma feature adicionada ao projeto original para facilitar o setup do ambiente.

---
# Teste de conhecimentos PHP + Banco de dados

##### Objetivo
Criar um Crud simples, totalmente desenvolvido em PHP, sem a utilização de frameworks, onde será possível Criar/Editar/Excluir/Listar usuários. O sistema também deve possuir a possibilidade de vincular/desvincular várias cores ao usuário.

##### Estrutura de banco de dados
A seguinte estrutura será utilizada para persistência dos dados, podendo ser alterada a qualquer momento para melhor funcionamento do sistema:

```sql
    tabela: users
        id      int not null auto_increment primary key
        name    varchar(100) not null
        email   varchar(100) not null
```
```sql
    tabela: colors
        id      int not null auto_increment primary key
        name    varchar(50) not null
```
```sql
    tabela: user_colors
        color_id  int
        user_id   int
```

##### Start
Este projeto conta com uma base sqlite com alguns registros já inseridos. Para início das atividades, use como base o arquivo `index.php`, este é apenas um arquivo exemplo onde é aberta conexão com o banco de dados e lista os usuários em uma tabela.

##### Pontos que serão levados em conta
- Funcionalidade
- Organização do código e projeto
- Apresentação da interface (Poderá usar frameworks CSS como Bootstrap, Material, Foundation etc)

##### Dicas
- Para utilizar o banco de dados contido na pasta `database/db.sqlite` é necessário que a sua instalação do php tenha a extensão do sqlite instalada e ativada
- O Php possui um servidor embutido, você consegue dar start ao projeto abrindo o terminal de comando na pasta baixada e executando `php -S 0.0.0.0:7070` e em seguida abrir o navegador em `http://localhost:7070`

##### Boa Sorte
Use seu conhecimento, consulte a documentação e o google, caso ainda houver dúvidas, nos pergunte :D. Boa sorte!
