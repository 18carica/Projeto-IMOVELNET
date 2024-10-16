# Projeto-IMOVELNET

Este é o repositório do projeto de desenvolvimento web para o **IMOVELNET**, um sistema de gerenciamento de imóveis desenvolvido como parte da disciplina de WEB3. O sistema permite o controle e gestão de clientes, funcionários, imóveis e financeiro em uma imobiliária, com navegação intuitiva e funcionalidades acessíveis através de um dashboard.

## Funcionalidades

O projeto **IMOVELNET** inclui as seguintes funcionalidades principais:

### Clientes
- **Listar Clientes**: Exibe uma lista completa dos clientes cadastrados.
- **Cadastrar Cliente**: Formulário para cadastro de novos clientes.
- **Pesquisar Cliente**: Pesquisa de clientes por CPF ou nome.

### Funcionários
- **Listar Funcionários**: Exibe uma lista dos funcionários da imobiliária.
- **Cadastrar Funcionário**: Formulário para cadastro de novos funcionários.
- **Pesquisar Funcionário**: Pesquisa de funcionários por CPF ou nome.

### Imóveis
- **Listar Imóveis**: Exibe todos os imóveis cadastrados no sistema.
- **Cadastrar Imóvel**: Formulário para cadastro de novos imóveis.
- **Pesquisar Imóvel**: Pesquisa por endereço ou código de imóvel.

### Financeiro
- **Gerenciamento Financeiro**: Controle de transações e fluxo de caixa da imobiliária.
- **Relatórios Financeiros**: Geração de relatórios mensais e anuais.

## Estrutura do Projeto

O projeto segue uma estrutura de pastas bem organizada para facilitar a navegação e o desenvolvimento:

```plaintext
Projeto-IMOVELNET/
│
├── central/
│   └── includes/
│       └── validar_sessao.php     # Validação de sessão e segurança
│       └── db_connection.php      # Conexão com o banco de dados
├── clientes/
│   └── index.php                  # Dashboard de clientes
│   └── cliente_listagem.php       # Listagem de clientes
│   └── cliente_cadastrar.php      # Formulário de cadastro de clientes
│   └── cliente_pesquisar.php      # Pesquisa de clientes por CPF ou nome
├── funcionarios/
│   └── index.php                  # Dashboard de funcionários
│   └── funcionario_listagem.php   # Listagem de funcionários
│   └── funcionario_cadastrar.php  # Formulário de cadastro de funcionários
│   └── funcionario_pesquisar.php  # Pesquisa de funcionários
├── imoveis/
│   └── index.php                  # Dashboard de imóveis
│   └── imovel_listagem.php        # Listagem de imóveis
│   └── imovel_cadastrar.php       # Formulário de cadastro de imóveis
│   └── imovel_pesquisar.php       # Pesquisa de imóveis
└── financeiro/
    └── index.php                  # Dashboard financeiro
    └── relatorios.php             # Relatórios financeiros
```

## Tecnologias Utilizadas

- **PHP**: Linguagem de backend usada para a lógica do servidor.
- **MySQL**: Banco de dados relacional utilizado para armazenar as informações de clientes, funcionários, imóveis e transações.
- **Bootstrap 5**: Framework CSS utilizado para estilizar o front-end e criar um layout responsivo.
- **JavaScript**: Scripts para interação com o usuário, como a pesquisa dinâmica.

## Requisitos

- **PHP 8.0+**
- **Servidor Apache ou WAMP/XAMPP**
- **MySQL 5.7+**

## Como Executar

1. **Configure o arquivo de conexão com o banco de dados em**:

   `/central/includes/db_connection.php`

2. **Execute o script SQL no banco de dados** para criar as tabelas necessárias.

3. **Inicie o servidor local (Apache/WAMP/XAMPP)** e acesse o sistema via navegador:

   ```bash
   http://localhost/Projeto-IMOVELNET
   ```

## Contribuições
Este é um projeto acadêmico, mas contribuições são bem-vindas. Sinta-se à vontade para enviar pull requests ou reportar problemas.

## Autor
**Leandro Torres Mocelin**  
Aluno de Análise e Desenvolvimento de Sistemas - IFSP, Campos do Jordão

---

© 2024 Imobiliária IMOVELNET - Todos os direitos reservados.