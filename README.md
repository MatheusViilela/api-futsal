
<h1 align="center">Bem-vindo à API de Gerenciamento de Torneio de Futsal com Laravel</h1>


<p align="center">




Esta API foi desenvolvida para proporcionar uma solução abrangente no gerenciamento de jogadores, times, partidas e autenticação de usuários usando a tecnologia JWT. Uma ferramenta eficiente, projetada para administrar de maneira eficaz as informações relacionadas aos jogos de futsal.

## Recursos Destacados

- **Gerenciamento de Jogadores:** Cadastre e gerencie informações detalhadas de jogadores de futsal.
  
- **Gerenciamento de Times:** Organize equipes, atribua jogadores e mantenha dados atualizados.

- **Controle de Partidas:** Acompanhe e registre detalhes das partidas, incluindo resultados e estatísticas.

- **Autenticação Segura com JWT:** Garanta a segurança das operações com autenticação de usuários usando JSON Web Tokens.

- **Classificação Atualizada:** Acesse de maneira fácil e eficaz para acompanhar a posição líder e descobrir quem está na dianteira.

Esta API oferece uma solução completa para atender às necessidades específicas do gerenciamento de jogos de futsal, proporcionando eficácia e praticidade em um único ambiente. Explore e aproveite a potência dessa ferramenta para otimizar suas operações no mundo do futsal.

## Configuração Inicial:

Antes de iniciar a exploração da API Laravel, é essencial seguir as etapas abaixo para preparar o ambiente de maneira adequada:

## 1. Clonar o Repositório:

Para começar, utilize o comando `git clone` para obter uma cópia local do repositório:

```bash
git clone https://github.com/MatheusViilela/api-futsal.git
```

## 2. Instalar Dependências:

Execute o seguinte comando para instalar todas as dependências necessárias:

```bash
composer install
```
## 3. Configurar Variáveis de Ambiente:
Copie o arquivo `.env.example` para `.env` 
```bash
cp .env.example .env
```
Abra o arquivo .env em um editor de texto e configure as seguintes variáveis de ambiente:

`DB_HOST`: O host do banco de dados.<br>
`DB_POR`T: A porta do banco de dados.<br>
`DB_DATABASE`: O nome do banco de dados.<br>
`DB_USERNAME`: O nome de usuário do banco de dados.<br>
`DB_PASSWORD`: A senha do banco de dados.<br>
Certifique-se de preencher essas informações de acordo com as configurações do seu ambiente.<br>

## 4. Gerar a Chave de Acesso JWT:

Para habilitar a autenticação segura utilizando JWT, execute o seguinte comando:

```bash
php artisan jwt:secret
```
## 5. Executar Migrações:

Para criar as tabelas necessárias no banco de dados, execute o seguinte comando:

```bash
php artisan migrate
```

## 6. Iniciar o Servidor de Desenvolvimento:

Para testar e executar a API localmente, inicie o servidor de desenvolvimento com o comando:

```bash
php artisan serve
```
## Endpoints:

A API Laravel disponibiliza os seguintes endpoints para interação:
## Usuários:

- **POST /api/user:**
  - Cadastra um novo usuário.

## Autenticação:

- **POST /api/login:**
  - Realiza login utilizando autenticação JWT.

## Times:

- **POST /api/team:**
  - Cadastra um novo time.

- **GET /api/team:**
  - Lista todos os times cadastrados.
 
- **PUT /api/team:**
  - Atualiza dados de um time já registrado.

- **DELETE /api/team:**
  - Deleta um time cadastrado.

## Jogadores:
- **POST /api/player:**
  - Cadastra um novo jogador.

- **GET /api/player:**
  - Lista todos os jogadores registrados e seus respectivos times.

- **PUT /api/player:**
  - Atualiza informações de um jogador.

- **DELETE /api/player:**
  - Deleta um jogador cadastrado.

## Partidas:
- **POST /api/matches:**
  - Cadastra uma nova partida.
 
- **GET /api/matches:**
  - Lista todas partidas registradas.

- **PUT /api/matches:**
  - Atualiza dados de uma partida registrada.

- **DELETE /api/matches:**
  - Deleta uma partida cadastrada.

## Classificação:
- **GET /api/championships:**
  -Lista a classificação em ordem decrescente com base na pontuação de cada timne.

## Dúvidas?

Em caso de dúvidas ou para obter mais informações, consulte a documentação completa no Postman. Ela contém exemplos de requisições que podem facilitar seu entendimento.

[Documentação no Postman](https://documenter.getpostman.com/view/28581245/2s9YyvBfdS)

Não hesite em explorar os exemplos e entrar em contato caso precise de suporte adicional.





