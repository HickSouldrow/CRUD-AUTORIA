<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relação de Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="w-full h-12 bg-green-600"></div>
    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Autorias Cadastradas</h1>
        <?php
        include_once 'classeAutoria.php';
        $Autoria = new Autoria();
        $Autoria_bd = $Autoria->listar();
        ?>
        <div class="overflow-x-auto mt-6">
            <table class="table-auto w-full bg-white rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-green-600 text-white uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Cod_Autor</th>
                        <th class="py-3 px-6 text-left">Cod_Livro</th>
                        <th class="py-3 px-6 text-left">Data de Lançamento</th>
                        <th class="py-3 px-6 text-left">Editora</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 text-sm font-light">

                    <?php
                    foreach ($Autoria_bd as $Autoria_mostrar) {
                        echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                        echo "<td class='py-3 px-6 text-left whitespace-nowrap'><b>{$Autoria_mostrar['Cod_Autor']}</b></td>";
                        echo "<td class='py-3 px-6 text-left'><b>{$Autoria_mostrar['Cod_Livro']}</b></td>";
                        echo "<td class='py-3 px-6 text-left'><b>{$Autoria_mostrar['DataLancamento']}</b></td>";
                        echo "<td class='py-3 px-6 text-left'><b>{$Autoria_mostrar['Editora']}</b></td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
        <div class="mt-8 text-center">
            <button class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition duration-300">
                <a href='menuAutoria.php'>Voltar</a>
            </button>
        </div>
    </div>
</body>

</html>
