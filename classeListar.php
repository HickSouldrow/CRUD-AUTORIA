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
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Relação de Livros Cadastrados</h1>

        <?php
        include_once 'classeLivro.php';
        $livro = new Livro();
        $livros_bd = $livro->listar();
        ?>

        <div class="overflow-x-auto mt-6">
            <table class="table-auto w-full bg-white rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-green-600 text-white uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Id</th>
                        <th class="py-3 px-6 text-left">Título</th>
                        <th class="py-3 px-6 text-left">Categoria</th>
                        <th class="py-3 px-6 text-left">ISBN</th>
                        <th class="py-3 px-6 text-left">Idioma</th>
                        <th class="py-3 px-6 text-left">Quantidade de Páginas</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 text-sm font-light">
                    <?php
                    foreach ($livros_bd as $livro_mostrar) {
                        echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                        echo "<td class='py-3 px-6 text-left whitespace-nowrap'><b>{$livro_mostrar['Cod_Livro']}</b></td>";
                        echo "<td class='py-3 px-6 text-left'><b>{$livro_mostrar['Titulo']}</b></td>";
                        echo "<td class='py-3 px-6 text-left'><b>{$livro_mostrar['Categoria']}</b></td>";
                        echo "<td class='py-3 px-6 text-left'><b>{$livro_mostrar['ISBN']}</b></td>";
                        echo "<td class='py-3 px-6 text-left'><b>{$livro_mostrar['Idioma']}</b></td>";
                        echo "<td class='py-3 px-6 text-left'><b>{$livro_mostrar['QtdePag']}</b></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="mt-8 text-center">
            <button class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition duration-300">
                <a href="menuLivro.php" class="block w-full h-full">Voltar</a>
            </button>
        </div>
    </div>
</body>

</html>
