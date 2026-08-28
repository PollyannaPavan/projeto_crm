<?php
declare(strict_types=1);


// Exibe uma mensagem
function exibirMensagem(string $mensagem): void
{
    echo $mensagem . PHP_EOL;
}


// Valida o e-mail
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


// Busca um cliente pelo nome
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


// Calcula a média dos contratos
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


// Valida o nome
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


// Valida o CPF
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


// Valida o contrato
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


// Cadastra um cliente
function cadastrarCliente(
    array &$clientes,
    string $nome,
    string $email,
    string $cpf,
    float $contrato
): ?array {

    $nome = trim($nome);
    $nome = ucwords(strtolower($nome));

    $email = trim($email);

    $cpf = str_replace([".", "-"], "", trim($cpf));

    if (!validarNome($nome)) {
        return null;
    } elseif (!validarEmail($email)) {
        return null;
    } elseif (!validarCpf($cpf)) {
        return null;
    } elseif (!validarContrato($contrato)) {
        return null;
    } else {

        $cliente = [
            "nome" => $nome,
            "cpf" => $cpf,
            "email" => $email,
            "contrato" => $contrato,
            "ativo" => true
        ];

        $clientes[] = $cliente;

        return $cliente;
    }
}


// Soma os contratos ativos
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


// Aplica reajuste usando passagem por referência
function aplicarReajuste(
    array &$cliente,
    float $percentual
): void {

    $cliente["contrato"] +=
        $cliente["contrato"] * ($percentual / 100);
}


// Quantidade total de clientes
function quantidadeTotalClientes(array $clientes): int
{
    return count($clientes);
}


// Quantidade de clientes ativos
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


// Maior contrato
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
?>