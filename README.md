# projeto_crm

# documento de requisitos- sistema de central de atendimento:

### objetivo:

- criar um sistema de utilizando a linguagem PHP para criação da pagina de cadastro da central de atendimento.
- o sistema deverá permitir o usuario a se cadastrar, listar e pesquisar clientes, alem de realizar calculos financeiros e apresentar um relatório final com informaçoes gerais de contrato.

- o prjeto deve **obrigatóriamente** utilizar as funções da linguagem de PHP, validações, arrays, estruturas condicionais, o `foreach`, passagem por referencias e organização entre o processamento e apresentação.

## organização de dados do cliente:

- Os dados que o cliente deverá possuir no minimo são: `nome`, `CPF`,  `E-mail`, `valor de contrato` e `situação de contrato`.

 
 - ***Exemplo***:
 
- nome: joão Silva
- CPF: 145.694.333-12
- Email: silvajoao147@gmail.com
- valor de contrato: R$ 2.500,00
situação: ativo.

**obs**: a situação pode ser: `ativo` ou `inativo`
___

## requisitos funcionais
1- listagem do cliente

- o sistema deve apresentar todos os clientes cadastrados. A listagem deverá ser feita obrigatoriamente utilizando `foreach`. para cada cliente, apresentar seus devidos dados.

## busca por nome 

o sistema deve conter uma barra de pesquisa para buscas de nomes de clientes.
a busca deverá receber o nome informado pelo usuario, remover espasços desnecessários, comparar o nome pesquisado com os clientes cadastrados, exibir os dados dos cliente encontrados, informar uma mensagem caso nenhum cliente seja encontrado.

#### **Exemplo**:

pesquisa: Adriana Ferreira 
 - cliente: 
 
 Nome: adriana ferreira silva 
 
CPF: 12345678900 
 
E-mail: silvaferreira@gmail.com 
 
Contrato: R$ 2.500,00 
 
Situação: Ativo

caso não encontre: cliente nao encontrado.

___

## cadastro do cliente

- o sistema deverá permitir inserir ou simular o cadastro de um novo cliente.

**antes de adicionar o cliente, o sistema deverá realizar as validaçoes**:

1- Não pode estar vazio;

2- Deve possuir um tamanho adequado; 

3- espaços desnessarios ser removidos.

4- deve possuir formato valido.

5-  Caracteres de formatação deverão ser removidos.

6- Deve possuir a quantidade esperada de números.

7- Deve ser informado.

8- Deve possuir valor maior que zero.

## Limpeza e padronização dos dados

- o sistema deverá limpar os dados recebidos antes de armazena-los.

## nome

utilizar `trim()` para remover espaços desnecessários.

- o nome deverá ser apresentado de forma padronizada.

## CPF :

Caracteres de formatação deverão ser removidos.

exemplo: 123.456.789-00
deverá ser armazenado como: 12345678900

para isso será usado a função:

```php
str_replace()
```

## Formatação dos valores 
 
 os valores dos contratos deverão ser apresentados utilizando o padrão de moeda brasileira
 Exemplo:

2500

Deverá aparecer como:

R$ 2.500,00

Deverá ser utilizada a função:
```php
number_format()
```

## Resumo financeiro

o sistema deve apresentar um resumo financeiro dos contratos. exemplo:

Contrato 1: R$ 2.000,00 — Ativo Contrato 2: R$ 3.000,00 — Ativo Contrato 3: R$ 1.500,00 — Inativo

Total de contratos ativos: R$ 5.000,00.

# 4. Requisitos técnicos obrigatórios

## o projeto de ve contes as funções:

```php
declare(strict_types=1);
```

```php
function calcularMedia(array $clientes): float
```

```php
function exibirMensagem(string $mensagem): void
```

```php
function validarEmail(string $email): bool
```

```php
function buscarCliente(string $nome, array $clientes): ?array
```

```php
count() 
strlen() 
str_replace() 
trim() 
number_format()
```
## Estruturas condicionais

As validações deverão utilizar:

- if,
elseif, 
else ,

# Passagem por referência

Deverá existir pelo menos uma função utilizando & para modificar diretamente o valor original de uma variável.

Exemplo:

function reajustarContrato(float &$valor, float $percentual):


