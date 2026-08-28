<?php
declare(strict_types=1);

require_once "utilitarios.php";


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


// ==========================================
// CADASTRO
// ==========================================

$novoCliente = cadastrarCliente(
    $clientes,
    "   JOÃO DA SILVA   ",
    "joao@email.com",
    "111.222.333-44",
    2500.00
);


exibirMensagem("===== CADASTRO =====");

if ($novoCliente !== null) {

    exibirMensagem("Cliente cadastrado com sucesso!");
    exibirMensagem("Nome: " . $novoCliente["nome"]);
    exibirMensagem("CPF: " . $novoCliente["cpf"]);
    exibirMensagem("E-mail: " . $novoCliente["email"]);

    exibirMensagem(
        "Contrato: R$ " .
        number_format(
            $novoCliente["contrato"],
            2,
            ",",
            "."
        )
    );

    exibirMensagem(
        "Ativo: " .
        ($novoCliente["ativo"] ? "Sim" : "Não")
    );

} else {

    exibirMensagem("Não foi possível cadastrar o cliente.");
}


// ==========================================
// PESQUISA
// ==========================================

$nomePesquisa = "Victor Matheus";

$clienteEncontrado = buscarCliente(
    $nomePesquisa,
    $clientes
);


exibirMensagem("");
exibirMensagem("===== PESQUISA =====");

if ($clienteEncontrado !== null) {

    exibirMensagem("Cliente encontrado!");
    exibirMensagem("Nome: " . $clienteEncontrado["nome"]);
    exibirMensagem("CPF: " . $clienteEncontrado["cpf"]);
    exibirMensagem("E-mail: " . $clienteEncontrado["email"]);

    exibirMensagem(
        "Contrato: R$ " .
        number_format(
            $clienteEncontrado["contrato"],
            2,
            ",",
            "."
        )
    );

} else {

    exibirMensagem("Cliente não encontrado.");
}


// ==========================================
// RESUMO DOS CONTRATOS
// ==========================================

$totalAtivos = somaContratosAtivos($clientes);
$media = calcularMedia($clientes);

exibirMensagem("");
exibirMensagem("===== RESUMO DOS CONTRATOS =====");

exibirMensagem(
    "Soma dos contratos ativos: R$ " .
    number_format(
        $totalAtivos,
        2,
        ",",
        "."
    )
);

exibirMensagem(
    "Média dos contratos: R$ " .
    number_format(
        $media,
        2,
        ",",
        "."
    )
);


// ==========================================
// REAJUSTE
// ==========================================

$clienteReajuste = $clientes[0];

exibirMensagem("");
exibirMensagem("===== REAJUSTE =====");

exibirMensagem(
    "Contrato original: R$ " .
    number_format(
        $clienteReajuste["contrato"],
        2,
        ",",
        "."
    )
);

aplicarReajuste($clienteReajuste, 10);

exibirMensagem(
    "Contrato reajustado: R$ " .
    number_format(
        $clienteReajuste["contrato"],
        2,
        ",",
        "."
    )
);


// ==========================================
// RESUMO DOS CLIENTES
// ==========================================

$totalClientes = quantidadeTotalClientes($clientes);
$totalClientesAtivos = quantidadeClientesAtivos($clientes);
$maior = maiorContrato($clientes);

exibirMensagem("");
exibirMensagem("===== RESUMO DOS CLIENTES =====");

exibirMensagem(
    "Total de clientes: " . $totalClientes
);

exibirMensagem(
    "Clientes ativos: " . $totalClientesAtivos
);

exibirMensagem(
    "Maior contrato: R$ " .
    number_format(
        $maior,
        2,
        ",",
        "."
    )
);
?>