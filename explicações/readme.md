Sistema de Gestão de Clientes — PHP
1. Estrutura do projeto

O projeto foi separado em três arquivos:

projeto/
│
├── index.php
├── utilitarios.php
└── style.css

index.php: responsável pela apresentação dos dados e pelo HTML.
utilitarios.php: contém as funções responsáveis pelo processamento.
style.css: responsável pela aparência da página.
2. declare(strict_types=1)

No início dos arquivos PHP utilizamos:

declare(strict_types=1);


Essa configuração faz o PHP trabalhar de forma mais rigorosa com os tipos de dados.

Por exemplo:

function validarEmail(string $email): bool


Essa função recebe uma string e deve retornar um bool.

3. require_once

No index.php utilizamos:

require_once "utilitarios.php";


O require_once importa o arquivo utilitarios.php.

Assim, podemos utilizar no index.php todas as funções que foram criadas nesse arquivo.

O once significa que o arquivo será incluído apenas uma vez.

4. Função exibirMensagem()
function exibirMensagem(string $mensagem): void
{
    echo $mensagem . PHP_EOL;
}


Essa função serve para exibir uma mensagem.

Parâmetro
string $mensagem


Significa que a função recebe um texto.

Retorno
:void


Significa que a função não retorna nenhum valor.

Exemplo
exibirMensagem("Cliente cadastrado com sucesso!");

5. Função validarNome()
function validarNome(string $nome): bool
{
    $nome = trim($nome);

    if ($nome === "") {
        return false;
    } elseif (strlen($nome) < 3) {
        return false;
    } else {
        return true;
    }
}


Essa função verifica se o nome informado é válido.

Ela retorna true quando o nome é válido e false quando é inválido.

trim()
trim($nome);


O trim() remove espaços desnecessários no começo e no final de um texto.

Por exemplo:

"   João da Silva   "


fica:

"João da Silva"

strlen()
strlen($nome);


O strlen() conta a quantidade de caracteres de uma string.

Exemplo:

strlen("João");


Retorna a quantidade de caracteres existentes no texto.

No projeto ele é utilizado para verificar se o nome possui pelo menos 3 caracteres:

elseif (strlen($nome) < 3)

6. Função validarEmail()
function validarEmail(string $email): bool
{
    $email = trim($email);

    if ($email === "") {
        return false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}


Essa função verifica se o e-mail está preenchido e se possui um formato válido.

O filter_var() é utilizado para validar o formato do e-mail.

Exemplo de e-mail válido:

joao@email.com


Exemplo inválido:

joao@email

7. Função validarCpf()
function validarCpf(string $cpf): bool
{
    $cpf = str_replace([".", "-"], "", trim($cpf));

    if ($cpf === "") {
        return false;
    } elseif (strlen($cpf) !== 11) {
        return false;
    } else {
        return true;
    }
}


Essa função verifica se o CPF possui 11 números.

str_replace()
str_replace([".", "-"], "", $cpf);


O str_replace() substitui caracteres dentro de um texto.

No projeto ele remove:

.
-


Por exemplo:

111.222.333-44


é transformado em:

11122233344


O CPF fica armazenado sem os caracteres de formatação.

8. Função validarContrato()
function validarContrato(float $contrato): bool
{
    if ($contrato <= 0) {
        return false;
    } elseif ($contrato > 1000000) {
        return false;
    } else {
        return true;
    }
}


Essa função verifica se o valor do contrato é válido.

O contrato:

Não pode ser menor ou igual a zero.
Não pode ultrapassar R$ 1.000.000,00.

Ela retorna true ou false.

9. if, elseif e else

O projeto utiliza estruturas condicionais para realizar as validações.

Exemplo:

if ($contrato <= 0) {
    return false;
} elseif ($contrato > 1000000) {
    return false;
} else {
    return true;
}

if

Verifica a primeira condição.

elseif

Verifica outra condição caso a primeira não seja verdadeira.

else

Executa quando nenhuma das condições anteriores foi satisfeita.

10. Função cadastrarCliente()
function cadastrarCliente(
    array &$clientes,
    string $nome,
    string $email,
    string $cpf,
    float $contrato
): ?array


Essa é a função responsável por cadastrar um novo cliente.

Ela recebe:

Nome.
E-mail.
CPF.
Valor do contrato.
Lista de clientes.

Primeiro os dados são tratados:

$nome = trim($nome);
$nome = ucwords(strtolower($nome));

$email = trim($email);

$cpf = str_replace([".", "-"], "", trim($cpf));


Depois são realizadas as validações.

Se algum dado for inválido:

return null;


Se tudo estiver correto, o cliente é criado:

$cliente = [
    "nome" => $nome,
    "cpf" => $cpf,
    "email" => $email,
    "contrato" => $contrato,
    "ativo" => true
];


Depois ele é adicionado à lista:

$clientes[] = $cliente;


E a função retorna o novo cliente:

return $cliente;

11. O que significa ?array?

Na função:

function cadastrarCliente(...): ?array


o ?array significa que a função pode retornar:

array


ou:

null


Por isso podemos fazer:

if ($novoCliente !== null) {
    // Cadastro realizado
} else {
    // Cadastro não realizado
}

12. Passagem por referência com &

Na função de cadastro temos:

array &$clientes


O & significa que o array original será passado para a função.

Isso permite modificar o array original.

Por exemplo:

$clientes[] = $cliente;


O novo cliente realmente será adicionado à variável $clientes que está no index.php.

Sem o &, a função trabalharia com uma cópia do array.

13. Função buscarCliente()
function buscarCliente(string $nome, array $clientes): ?array
{
    $nome = trim($nome);

    foreach ($clientes as $cliente) {

        if (strtolower(trim($cliente["nome"])) === strtolower($nome)) {
            return $cliente;
        }
    }

    return null;
}


Essa função pesquisa um cliente pelo nome.

Ela recebe:

string $nome


e:

array $clientes


Ela retorna:

?array


Ou seja:

Retorna o cliente se encontrar.
Retorna null se não encontrar.
14. foreach

O foreach serve para percorrer todos os elementos de um array.

No projeto:

foreach ($clientes as $cliente) {


Significa:

Para cada cliente existente dentro de $clientes, coloque os dados na variável $cliente.

Assim podemos verificar cada cliente individualmente.

Exemplo:

foreach ($clientes as $cliente) {
    echo $cliente["nome"];
}


Isso exibiria o nome de cada cliente.

15. strtolower()

Na pesquisa utilizamos:

strtolower($nome)


O strtolower() transforma o texto em letras minúsculas.

Isso ajuda a fazer uma pesquisa que não diferencia letras maiúsculas e minúsculas.

Por exemplo:

VICTOR MATHEUS


e:

victor matheus


podem ser comparados como:

victor matheus

16. Função calcularMedia()
function calcularMedia(array $clientes): float
{
    if (count($clientes) === 0) {
        return 0.0;
    }

    $soma = 0.0;

    foreach ($clientes as $cliente) {
        $soma += $cliente["contrato"];
    }

    return $soma / count($clientes);
}


Essa função calcula a média dos valores dos contratos.

Primeiro verificamos se existem clientes:

if (count($clientes) === 0)


Depois os contratos são somados:

foreach ($clientes as $cliente) {
    $soma += $cliente["contrato"];
}


Finalmente:

return $soma / count($clientes);


A soma é dividida pela quantidade de clientes.

17. count()

O count() conta quantos elementos existem em um array.

Exemplo:

count($clientes);


Se existirem 5 clientes, o resultado será:

5


No projeto ele é usado para:

Contar clientes.
Calcular a média.
Verificar se o array está vazio.
18. Função somaContratosAtivos()
function somaContratosAtivos(array $clientes): float
{
    $soma = 0.0;

    foreach ($clientes as $cliente) {

        if ($cliente["ativo"] === true) {
            $soma += $cliente["contrato"];
        }
    }

    return $soma;
}


Essa função soma somente os contratos dos clientes ativos.

Ela verifica:

$cliente["ativo"] === true


Se o cliente estiver ativo, seu contrato é adicionado à soma.

19. Função aplicarReajuste()
function aplicarReajuste(
    array &$cliente,
    float $percentual
): void {

    $cliente["contrato"] +=
        $cliente["contrato"] * ($percentual / 100);
}


Essa função aplica um reajuste percentual no contrato.

Ela utiliza &:

array &$cliente


Isso permite alterar o cliente original.

Por exemplo:

aplicarReajuste($cliente, 10);


Um contrato de:

R$ 2.500,00


passa para:

R$ 2.750,00

20. Função quantidadeTotalClientes()
function quantidadeTotalClientes(array $clientes): int
{
    return count($clientes);
}


Essa função retorna a quantidade total de clientes cadastrados.

Ela utiliza:

count($clientes)

21. Função quantidadeClientesAtivos()
function quantidadeClientesAtivos(array $clientes): int
{
    $quantidade = 0;

    foreach ($clientes as $cliente) {

        if ($cliente["ativo"] === true) {
            $quantidade++;
        }
    }

    return $quantidade;
}


Essa função conta somente os clientes ativos.

A variável:

$quantidade


começa com:

0


Quando encontra um cliente ativo:

$quantidade++;


a quantidade aumenta em 1.

22. Função maiorContrato()
function maiorContrato(array $clientes): float
{
    if (count($clientes) === 0) {
        return 0.0;
    }

    $maior = $clientes[0]["contrato"];

    foreach ($clientes as $cliente) {

        if ($cliente["contrato"] > $maior) {
            $maior = $cliente["contrato"];
        }
    }

    return $maior;
}


Essa função encontra o maior contrato cadastrado.

Primeiro ela considera o contrato do primeiro cliente como o maior:

$maior = $clientes[0]["contrato"];


Depois percorre todos os clientes.

Se encontrar um contrato maior:

if ($cliente["contrato"] > $maior)


o valor de $maior é atualizado.

23. number_format()

O number_format() é utilizado para formatar números.

No projeto:

number_format(
    $valor,
    2,
    ",",
    "."
)


Significa:

2 → duas casas decimais.
"," → vírgula como separador decimal.
"." → ponto como separador de milhares.

Por exemplo:

number_format(1500.50, 2, ",", ".");


Resultado:

1.500,50


Com R$:

R$ 1.500,50

24. trim() + str_replace() + strlen()

Essas três funções são utilizadas principalmente no tratamento e validação dos dados.

trim()

Remove espaços no começo e no final.

trim($nome);

str_replace()

Substitui ou remove caracteres.

str_replace([".", "-"], "", $cpf);

strlen()

Conta os caracteres.

strlen($cpf);


Essas funções ajudam a deixar os dados mais padronizados antes de serem armazenados.

25. ucwords() e strtolower()

Para padronizar nomes:

$nome = ucwords(strtolower($nome));


Primeiro:

strtolower($nome)


transforma tudo em minúsculas.

Depois:

ucwords($nome)


coloca a primeira letra de cada palavra em maiúscula.

Por exemplo:

"   JOÃO DA SILVA   "


fica:

"João Da Silva"

26. htmlspecialchars()

No index.php, utilizamos:

htmlspecialchars($cliente["nome"])


Essa função transforma caracteres especiais em uma forma segura para serem exibidos no HTML.

Ela é importante quando dados fornecidos pelo usuário são mostrados na página.

27. if / else na apresentação

O HTML utiliza condições para mostrar informações diferentes.

Exemplo:

<?php if ($cliente["ativo"]): ?>

    <span class="ativo">
        Ativo
    </span>

<?php else: ?>

    <span class="inativo">
        Inativo
    </span>

<?php endif; ?>


Se o cliente estiver ativo, aparece:

Ativo


Caso contrário:

Inativo

28. Resumo das funções
Função	O que faz	Retorno
exibirMensagem()	Exibe uma mensagem	void
validarNome()	Valida o nome	bool
validarEmail()	Valida o e-mail	bool
validarCpf()	Valida o CPF	bool
validarContrato()	Valida o contrato	bool
cadastrarCliente()	Cadastra um cliente	?array
buscarCliente()	Pesquisa cliente pelo nome	?array
calcularMedia()	Calcula média dos contratos	float
somaContratosAtivos()	Soma contratos ativos	float
aplicarReajuste()	Aplica reajuste percentual	void
quantidadeTotalClientes()	Conta todos os clientes	int
quantidadeClientesAtivos()	Conta clientes ativos	int
maiorContrato()	Encontra o maior contrato	float
29. Funções e recursos obrigatórios

O projeto utiliza todos os recursos solicitados:

declare(strict_types=1);


Funções com parâmetros tipados:

function validarEmail(string $email): bool


Função com retorno void:

function exibirMensagem(string $mensagem): void


Função com retorno bool:

function validarEmail(string $email): bool


Função com retorno ?array:

function buscarCliente(string $nome, array $clientes): ?array


Percorrer clientes:

foreach ($clientes as $cliente)


Contagem:

count($clientes)


Quantidade de caracteres:

strlen($nome)


Remoção/substituição de caracteres:

str_replace([".", "-"], "", $cpf)


Remoção de espaços:

trim($nome)


Formatação de moeda:

number_format($valor, 2, ",", ".")


Passagem por referência:

array &$cliente


Importação do arquivo:

require_once "utilitarios.php";

30. Separação do projeto

O principal objetivo da separação é evitar colocar todas as responsabilidades em um único arquivo.

index.php
    ↓
Apresentação
HTML
Tabelas
Cards
Resultados


utilitarios.php
    ↓
Processamento
Validações
Cadastro
Pesquisa
Cálculos
Reajuste


style.css
    ↓
Visual
Cores
Tamanhos
Espaçamentos
Layout


Dessa maneira, o projeto fica mais organizado, fácil de entender e mais fácil de modificar posteriormente.