# Campo minado

## Instruções para iniciar um banco de dados para o site

No seu ambiente, crie as variáveis de ambiente com os seguintes nomes e valores:
- `DB_SERVER`: endereço do servidor mysql
- `DB_NAME`: nome da base de dados mysql criada vazia para o jogo
- `DB_USER`: usuário que tenha permissão de modificar a base de dados (inclusive criar tabelas)
- `DB_PASS`: senha do usuário

Após colocar os valores nessas variáveis de ambiente, é necessário apenas executar o arquiv db_inicia.php usando o php de sua máquina.

## Docker

Adicionado docker compose para facilitar rodar o projeto sem necessidade da instalação de PHP e instalação / criação de um banco de dados MySQL.

[Link de instruções de instalação do docker](https://docs.docker.com/engine/install/)

[Link de instruções de instalação do docker compose](https://docs.docker.com/compose/install/)

Para rodar o projeto, abra o terminal e digite:

```bash
docker-compose up -d
```

Após isso, acesse http://localhost:8008/, adicionando ao final o nome da página que deseja acessar (ex: http://localhost:8008/jogo.php).

## Back-end

### Telas

#### Login ([Mateus](https://github.com/promateusy)) :heavy_check_mark:
- [x] Logar usuário se já existir
- [x] Criar session do PHP "user_id" com o user_id de quem se logou

#### Logout ([Mateus](https://github.com/promateusy)) :heavy_check_mark:
- [x] Limpar session do PHP "user_id"

#### Cadastro ([João](https://github.com/JoaoPortuense))
- [ ] Criar usuário na tabela User
- [ ] Logar usuário em seguida
- [ ] Criar session do PHP "user_id" com o user_id de quem se logou

#### Nova partida ([Karlos](https://github.com/konkah)) :heavy_check_mark:
- [x] Não pode acessar se não estiver logado

#### Jogo ([Karlos](https://github.com/konkah)) :heavy_check_mark:
- [x] Não pode acessar se não estiver logado
- [x] Pegar usuário pelo user_id na Session do PHP "user_id"
- [x] Não permitir GET
- [x] Criar um jogo novo na tabela Game
- [x] Guardar o resultado e tempo usando AJAX

#### Histórico ([Kallynne](https://github.com/Kallynne-Rosa))
- [x] Não pode acessar se não estiver logado
- [x] Pegar usuário pelo user_id na Session do PHP "user_id"
- [x] Listar os jogos do usuário logado

#### Ranking ([Thomaz](https://github.com/Thomaz-Maques-Padovani))
- [x] Não pode acessar se não estiver logado
- [x] Listar os jogos dos 10 maiores tabuleiros
- [x] Ordenar por menor tempo que conseguiu vencer

#### Editar cadastro ([João](https://github.com/JoaoPortuense))
- [ ] Não pode acessar se não estiver logado
- [ ] Pegar usuário pelo user_id na Session do PHP "user_id"
- [ ] Alterar dados de usuário
- [ ] Campos data, cpf e username não são editáveis (query só altera esses dados no backend)

### Script da criação do banco
- [x] Criar tabela User
    - [x] ID
    - [x] Name
    - [x] Birthday
    - [x] CPF
    - [x] Phone
    - [x] Email
    - [x] Username
    - [x] Password
- [x] Criar tabela Game
    - [x] ID
    - [x] Mode
    - [x] Columns
    - [x] Lines
    - [x] Bombs
    - [x] Result
    - [x] Start
    - [x] End
    - [x] User_ID
- [x] Criar explicação de como rodar db_inicia.php e site para o professor

## Front-end

### Menu

Telas logadas:

- Ranking
- Editar cadastro
- Logout

### Telas

Informações necessárias em cada tela

#### Login :heavy_check_mark:
- [x] Usuário
- [x] Senha
- [x] Link cadastro

#### Cadastro :heavy_check_mark:
- [x] nome completo
- [x] data de nascimento
- [x] CPF
- [x] telefone
- [x] e-mail
- [x] usuário
- [x] senha

#### Nova partida :heavy_check_mark:
- [x] Dimensões
- [x] Número de bombas
- [x] Modalidade de Partida: clássica / Timer

#### Jogo :heavy_check_mark:
- [x] Tempo da partida
- [x] Dimensões
- [x] Número de bombas
- [x] Modalidade
- [x] Tempo restante
- [x] Botão trapaça
- [x] Tabuleiro

#### Histórico :heavy_check_mark:
- [x] nome
- [x] dimensões
- [x] bombas
- [x] modalidade
- [x] tempo
- [x] resultado
- [x] data/hora

#### Ranking :heavy_check_mark:
- [x] Username
- [x] Dados da partida (igual histórico)
- [x] 10 jogadores

#### Editar cadastro :heavy_check_mark:
- [x] Igual a criação de cadastro
- [x] Campos data, cpf e username não são editáveis
