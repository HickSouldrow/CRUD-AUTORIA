<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="w-full h-12 bg-green-600"></div>
    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Autores Cadastrados</h1>

        <?php
        include_once 'classeAutor.php';
        $Autor = new Autor();
        $Autor_bd = $Autor->listar();
        ?>

        <div class="overflow-x-auto mt-6">
            <table class="table-auto w-full bg-white rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-green-600 text-white uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Cod_Autor</th>
                        <th class="py-3 px-6 text-left">Nome</th>
                        <th class="py-3 px-6 text-left">Sobrenome</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Data de Nascimento</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 text-sm font-light">
                    <?php
                    foreach ($Autor_bd as $Autor_mostrar) {
                        echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                        echo "<td class='py-3 px-6 text-left whitespace-nowrap'><b>{$Autor_mostrar['Cod_Autor']}</b></td>";
                        echo "<td class='py-3 px-6 text-left'><b>{$Autor_mostrar['NomeAutor']}</b></td>";
                        echo "<td class='py-3 px-6 text-left'><b>{$Autor_mostrar['Sobrenome']}</b></td>";
                        echo "<td class='py-3 px-6 text-left'><b>{$Autor_mostrar['Email']}</b></td>";
                        echo "<td class='py-3 px-6 text-left'><b>{$Autor_mostrar['Nasc']}</b></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="mt-8 text-center">
            <button class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition duration-300">
                <a href='menuAutor.php' class="block w-full h-full">Voltar</a>
            </button>
        </div>
    </div>
</body>

</html>
