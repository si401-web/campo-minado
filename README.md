# Campo minado

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

#### Login
- [Mateus](https://github.com/promateusy)
- [ ] Logar usuário se já existir
- [ ] Criar session do PHP "username" com o username de quem se logou

#### Logout
- [Mateus](https://github.com/promateusy)
- [ ] Limpar session do PHP "username"

#### Cadastro
- [João](https://github.com/JoaoPortuense)
- [ ] Criar usuário na tabela User
- [ ] Logar usuário em seguida
- [ ] Criar session do PHP "username" com o username de quem se logou

#### Nova partida
- [Karlos](https://github.com/konkah)
- [ ] Não pode acessar se não estiver logado
- [ ] Pegar usuário pelo username na Session do PHP "username"
- [ ] Criar um jogo novo na tabela Game
- [ ] Redirecionar para o jogo

#### Jogo
- [Karlos](https://github.com/konkah)
- [ ] Não pode acessar se não estiver logado
- [ ] Pegar usuário pelo username na Session do PHP "username"
- [ ] Abrir o jogo da tabela Game
- [ ] Salvar jogo como já iniciado
- [ ] Guardar o resultado e tempo usando AJAX

#### Histórico
- [Kallynne](https://github.com/Kallynne-Rosa)
- [ ] Não pode acessar se não estiver logado
- [ ] Pegar usuário pelo username na Session do PHP "username"
- [ ] Listar os jogos do usuário logado

#### Ranking
- [Thomaz](https://github.com/Thomaz-Maques-Padovani)
- [ ] Não pode acessar se não estiver logado
- [ ] Listar os jogos dos 10 maiores tabuleiros
- [ ] Ordenar por menor tempo que conseguiu vencer

#### Editar cadastro
- [João](https://github.com/JoaoPortuense)
- [ ] Não pode acessar se não estiver logado
- [ ] Pegar usuário pelo username na Session do PHP "username"
- [ ] Alterar dados de usuário
- [ ] Campos data, cpf e username não são editáveis (query só altera esses dados no backend)

### Script da criação do banco
- [ ] Criar tabela User
    - [ ] ID
    - [ ] Name
    - [ ] Birthday
    - [ ] CPF
    - [ ] Phone
    - [ ] Email
    - [ ] Username
    - [ ] Password
- [ ] Criar tabela Game
    - [ ] ID
    - [ ] Mode
    - [ ] Columns
    - [ ] Rows
    - [ ] Bombs
    - [ ] Result
    - [ ] Start
    - [ ] End

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
