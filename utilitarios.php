<?php
declare(strict_types=1);

$clientes = [
    [
        "nome" => "  ANA CLARA SILVA ",
        "cpf" => "123.456.789-00",
        "email" => "ana.clara@email.com",
        "contrato" => 1500.00,
        "ativo" => true
    ],
    [
        "nome" => "Carlos Souza",
        "cpf" => "987.654.321-00",
        "email" => "carlos.souza@email.com",
        "contrato" => 850.50,
        "ativo" => false
    ],
    [
        "nome" => "  Victor Matheus ",
        "cpf" => "865.432.109-00",
        "email" => "victor.matheus@email.com",
        "contrato" => 100.00,
        "ativo" => false
    ],
    [
        "nome" => "  maria jose ",
        "cpf" => "9635.432.109-00",
        "email" => "maria.jose@email.com",
        "contrato" => 15000.00,
        "ativo" => true
    ]
];

$nomePesquisa = "  Victor Matheus ";

function buscarCliente($clientes, $nomePesquisa): void {
    foreach ($clientes as $cliente) {
        if (strtolower($cliente["nome"]) === strtolower($nomePesquisa)) {
            echo "\nNome: " . $cliente["nome"];
            echo "\nCPF: " . $cliente["cpf"];
            echo "\nE-mail: " . $cliente["email"];
            echo "\nValor do contrato: " . $cliente["contrato"];
            echo "\nEstá ativo: " . $cliente["ativo"];

            return;
        }
    }

    echo "Cliente não encontrado";
}


buscarCliente($clientes, $nomePesquisa);








?>