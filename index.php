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

$novoCliente = cadastrarCliente(
    $clientes,
    "   JOÃO DA SILVA   ",
    "joao@email.com",
    "111.222.333-44",
    2500.00
);

$nomePesquisa = "Victor Matheus";
$clienteEncontrado = buscarCliente($nomePesquisa, $clientes);

$totalClientes = quantidadeTotalClientes($clientes);
$totalAtivos = quantidadeClientesAtivos($clientes);
$somaAtivos = somaContratosAtivos($clientes);
$media = calcularMedia($clientes);
$maiorContrato = maiorContrato($clientes);

$clienteReajuste = $clientes[0];
$contratoOriginal = $clienteReajuste["contrato"];

aplicarReajuste($clienteReajuste, 10);

$contratoReajustado = $clienteReajuste["contrato"];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestão de Clientes</title>
    <link rel="stylesheet" href="style.css">


    <style>
        
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #EDC7E1;
        color: #330825;
    }

    header {
        background-color: #541E43;
        color: #EDC7E1;
        padding: 30px;
        text-align: center;
    }

    header h1 {
        margin-bottom: 8px;
    }

    main {
        width: 90%;
        max-width: 1100px;
        margin: 30px auto;
    }

    .resumo {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }

    .card {
        background-color: #BA8DAC;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(51, 8, 37, 0.20);
        border: 1px solid #874C74;
    }

    .card h2 {
        color: #541E43;
        margin-bottom: 10px;
        font-size: 18px;
    }

    .card p {
        color: #330825;
        font-size: 26px;
        font-weight: bold;
    }

    section {
        background-color: #BA8DAC;
        padding: 25px;
        margin-bottom: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(51, 8, 37, 0.20);
        border: 1px solid #874C74;
    }

    section h2 {
        color: #541E43;
        margin-bottom: 20px;
    }

    .cliente {
        background-color: #EDC7E1;
        border: 1px solid #874C74;
        padding: 20px;
        border-radius: 8px;
        line-height: 1.8;
    }

    .ativo {
        color: #541E43;
        font-weight: bold;
    }

    .inativo {
        color: #330825;
        font-weight: bold;
    }

    .valor {
        color: #541E43;
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
        border-radius: 8px;
    }

    th,
    td {
        padding: 14px;
        border-bottom: 1px solid #874C74;
        text-align: left;
    }

    th {
        background-color: #541E43;
        color: #EDC7E1;
    }

    td {
        color: #330825;
    }

    tr:hover {
        background-color: #EDC7E1;
    }

    .reajuste {
        display: flex;
        gap: 30px;
    }

    .reajuste div {
        flex: 1;
        background-color: #EDC7E1;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #874C74;
    }

    .reajuste h2 {
        color: #541E43;
    }

    footer {
        text-align: center;
        padding: 25px;
        background-color: #330825;
        color: #EDC7E1;
        margin-top: 30px;
    }

    @media (max-width: 768px) {

        .resumo {
            grid-template-columns: 1fr;
        }

        .reajuste {
            flex-direction: column;
        }

        table {
            font-size: 14px;
        }

    }
    </style>
</head>

<body>

<header>

    <h1>Gestão de Clientes</h1>

    <p>Sistema de gerenciamento de contratos</p>

</header>


<main>


    <!-- RESUMO -->

    <div class="resumo">

        <div class="card">

            <h2>Total de Clientes</h2>

            <p>
                <?= $totalClientes ?>
            </p>

        </div>


        <div class="card">

            <h2>Clientes Ativos</h2>

            <p>
                <?= $totalAtivos ?>
            </p>

        </div>


        <div class="card">

            <h2>Maior Contrato</h2>

            <p>
                R$ <?= number_format(
                    $maiorContrato,
                    2,
                    ",",
                    "."
                ) ?>
            </p>

        </div>

    </div>


    <!-- LISTA DE CLIENTES -->

    <section>

        <h2>Clientes cadastrados</h2>

        <table>

            <thead>

                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Contrato</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                <?php foreach ($clientes as $cliente): ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars(
                                trim($cliente["nome"])
                            ) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(
                                $cliente["cpf"]
                            ) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(
                                $cliente["email"]
                            ) ?>
                        </td>

                        <td class="valor">

                            R$ <?= number_format(
                                $cliente["contrato"],
                                2,
                                ",",
                                "."
                            ) ?>

                        </td>

                        <td>

                            <?php if ($cliente["ativo"]): ?>

                                <span class="ativo">
                                    Ativo
                                </span>

                            <?php else: ?>

                                <span class="inativo">
                                    Inativo
                                </span>

                            <?php endif; ?>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </section>


    <!-- CLIENTE CADASTRADO -->

    <section>

        <h2>Novo cliente cadastrado</h2>

        <?php if ($novoCliente !== null): ?>

            <div class="cliente">

                <p>
                    <strong>Nome:</strong>
                    <?= htmlspecialchars(
                        $novoCliente["nome"]
                    ) ?>
                </p>

                <p>
                    <strong>CPF:</strong>
                    <?= htmlspecialchars(
                        $novoCliente["cpf"]
                    ) ?>
                </p>

                <p>
                    <strong>E-mail:</strong>
                    <?= htmlspecialchars(
                        $novoCliente["email"]
                    ) ?>
                </p>

                <p>
                    <strong>Contrato:</strong>

                    <span class="valor">

                        R$ <?= number_format(
                            $novoCliente["contrato"],
                            2,
                            ",",
                            "."
                        ) ?>

                    </span>

                </p>

                <p>

                    <strong>Status:</strong>

                    <span class="ativo">
                        Ativo
                    </span>

                </p>

            </div>

        <?php else: ?>

            <p>Não foi possível cadastrar o cliente.</p>

        <?php endif; ?>

    </section>


    <!-- PESQUISA -->

    <section>

        <h2>Resultado da pesquisa</h2>

        <p>
            <strong>Cliente pesquisado:</strong>
            <?= htmlspecialchars($nomePesquisa) ?>
        </p>

        <br>

        <?php if ($clienteEncontrado !== null): ?>

            <div class="cliente">

                <p>
                    <strong>Nome:</strong>
                    <?= htmlspecialchars(
                        $clienteEncontrado["nome"]
                    ) ?>
                </p>

                <p>
                    <strong>CPF:</strong>
                    <?= htmlspecialchars(
                        $clienteEncontrado["cpf"]
                    ) ?>
                </p>

                <p>
                    <strong>E-mail:</strong>
                    <?= htmlspecialchars(
                        $clienteEncontrado["email"]
                    ) ?>
                </p>

                <p>
                    <strong>Contrato:</strong>

                    <span class="valor">

                        R$ <?= number_format(
                            $clienteEncontrado["contrato"],
                            2,
                            ",",
                            "."
                        ) ?>

                    </span>

                </p>

            </div>

        <?php else: ?>

            <p>Cliente não encontrado.</p>

        <?php endif; ?>

    </section>


    <!-- CONTRATOS -->

    <section>

        <h2>Resumo dos contratos</h2>

        <table>

            <tr>

                <td>
                    Soma dos contratos ativos
                </td>

                <td class="valor">

                    R$ <?= number_format(
                        $somaAtivos,
                        2,
                        ",",
                        "."
                    ) ?>

                </td>

            </tr>

            <tr>

                <td>
                    Média dos contratos
                </td>

                <td class="valor">

                    R$ <?= number_format(
                        $media,
                        2,
                        ",",
                        "."
                    ) ?>

                </td>

            </tr>

        </table>

    </section>


    <!-- REAJUSTE -->

    <section>

        <h2>Reajuste de contrato</h2>

        <div class="reajuste">

            <div>

                <p>Contrato original</p>

                <br>

                <h2>

                    R$ <?= number_format(
                        $contratoOriginal,
                        2,
                        ",",
                        "."
                    ) ?>

                </h2>

            </div>


            <div>

                <p>Contrato após reajuste de 10%</p>

                <br>

                <h2>

                    R$ <?= number_format(
                        $contratoReajustado,
                        2,
                        ",",
                        "."
                    ) ?>

                </h2>

            </div>

        </div>

    </section>

</main>


<footer>

    <p>
        Sistema de Gestão de Clientes
    </p>

</footer>

</body>

</html>
