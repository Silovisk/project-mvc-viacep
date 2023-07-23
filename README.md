# Projeto Laravel 10 - Formulário com CEP

Este é um projeto em Laravel 10 que utiliza o template engine Blade para criar um formulário que permite aos usuários registrar informações de endereço a partir de um CEP, utilizando a API ViaCEP. Os dados fornecidos serão armazenados no banco de dados e exibidos em uma página de listagem.

## Requisitos

Certifique-se de ter os seguintes requisitos instalados em sua máquina:

- PHP (versão 7.4 ou superior)
- Composer
- Banco de dados (por exemplo, MySQL ou PostgreSQL)

## Configuração

1. Clone o repositório do projeto:

```bash
git clone https://github.com/seu-usuario/seu-projeto.git
```

2. Navegue até o diretório do projeto:

```bash
cd seu-projeto
```

3. Instale as dependências do projeto usando o Composer:

```bash
composer install
```

4. Copie o arquivo `.env.example` para `.env`:

```bash
cp .env.example .env
```

5. Gere a chave de aplicação:

```bash
php artisan key:generate
```

6. Configure o banco de dados no arquivo `.env`. Por exemplo, se estiver usando MySQL:

```
DB_CONNECTION=mysql
DB_HOST=seu_host
DB_PORT=seu_porta
DB_DATABASE=seu_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

7. Execute as migrações para criar as tabelas do banco de dados:

```bash
php artisan migrate
```

8. O projeto está configurado e pronto para ser executado. Inicie o servidor web local:

```bash
php artisan serve
```

9. Acesse o projeto em seu navegador, normalmente em `http://localhost:8000`.

## Funcionalidades

### Formulário de Cadastro

O projeto possui um formulário que permite ao usuário inserir um CEP válido. Quando o usuário envia o formulário, o sistema utiliza a API ViaCEP para buscar informações de endereço relacionadas ao CEP informado. Os dados de endereço são armazenados no banco de dados.

### Listagem de Dados

Além do formulário de cadastro, o projeto possui uma página de listagem que exibe todos os registros de endereço presentes no banco de dados. A lista é exibida em formato de tabela, com os campos relevantes, como logradouro, bairro, cidade e estado.

## Estrutura MVC

O projeto utiliza a arquitetura Modelo-Visão-Controlador (MVC), que organiza a aplicação em três componentes principais:

- Modelo (Model): Responsável pela manipulação dos dados, incluindo acesso ao banco de dados e regras de negócio.

- Visão (View): Responsável pela exibição dos dados para o usuário, utilizando o template engine Blade para gerar as páginas HTML.

- Controlador (Controller): Responsável por intermediar as requisições do usuário e coordenar as ações do modelo e da visão.

A estrutura de diretórios do projeto segue a convenção do Laravel para manter a organização do código.

## Script para busca de CEP

Para que o formulário de cadastro funcione corretamente, é necessário adicionar o seguinte script no final da página, antes do fechamento da tag `</body>`. Esse script utiliza jQuery para realizar uma requisição AJAX à API ViaCEP e preencher automaticamente os campos de endereço com base no CEP fornecido pelo usuário:

```html
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#InputZip").keyup(function () {
            var cep = $(this).val().replace(/\D/g, '');
            if (cep.length === 8) {
                $.ajax({
                    url: "https://viacep.com.br/ws/" + cep + "/json/",
                    type: "GET",
                    success: function (data) {
                        if (data.erro) {
                            // mensagem de cep não encontrado
                            return;
                        }
                        $("#inputAddress").val(data.logradouro);
                        $("#InputCity").val(data.localidade);
                        $("#InputState").val(data.uf);
                    },
                    error: function () {
                        // mensagem de erro ao buscar o cep
                    }
                });
            }
        });
    });
</script>
```

Certifique-se de que o campo de entrada do CEP no formulário tenha o ID `InputZip` e que os campos de logradouro, cidade e estado tenham os IDs `inputAddress`, `InputCity` e `InputState`, respectivamente. Caso esses IDs já estejam sendo usados em sua implementação, ajuste o script conforme necessário.

## Contribuindo

Se desejar contribuir com o projeto, sinta-se à vontade para criar uma *issue* ou enviar um *pull request*.

Esperamos que este projeto seja útil e que você possa aprender com ele!

## Agradecimentos

Agradecemos à comunidade do Laravel e também à plataforma DIO e aos mantenedores da API ViaCEP por disponibilizarem suas ferramentas e recursos que tornaram possível o desenvolvimento deste projeto.
