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


foreach ($clientes as $clientes) {
    echo "\nNome: " . $clientes["nome"];
    echo "\nCPF: " . $clientes["cpf"];
    echo "\nE-mail: " . $clientes["email"];
    echo "\nValor do contrato: " . $clientes["contrato"];
    echo "\nEstá ativo: " . $clientes["ativo"];
}
?>