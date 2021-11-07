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
