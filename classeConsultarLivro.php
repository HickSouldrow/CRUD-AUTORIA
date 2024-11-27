<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="w-full h-12 bg-green-600"></div>
    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Consultar Livro</h1>
        <form name="cliente" method="POST" action="" class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
            <fieldset id="a" class="mb-4">
                <legend class="text-xl font-semibold mb-4"><b>Dados dos Livros:</b></legend>
                <div class="mb-4">
                    <label for="txtCod_Livro" class="block mb-2">Código do Livro:</label>
                    <input name="txtCod_Livro" type="text" placeholder="Código do Livro" class="w-full px-3 py-2 border border-gray-300 rounded">
                </div>
            </fieldset>
            <fieldset id="b" class="mb-4">
                <legend class="text-xl font-semibold mb-4"><b>Opções:</b></legend>
                <div class="flex justify-between">
                    <input name="btnenviar" type="submit" value="Consultar" class="w-1/2 bg-green-600 text-white py-2 rounded hover:bg-green-700 cursor-pointer mr-2">
                    <input name="Limpar" type="reset" value="Limpar" class="w-1/2 bg-green-400 text-white py-2 rounded hover:bg-green-500 cursor-pointer">
                </div>
            </fieldset>
        </form>

        <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnenviar)) {
            include_once 'classeLivro.php';

            $livro = new Livro();
            $livro->setCod_Livro($txtCod_Livro . '%');
            $livro_bd = $livro->consultar();

                if ($livro_bd) {
                    echo '<div class="mt-8">';
                    echo '<div class="bg-white shadow-md rounded-lg overflow-hidden">';
                    echo '<table class="min-w-full text-left">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th class="px-4 py-2 bg-green-600 text-white">ID</th>';
                    echo '<th class="px-4 py-2 bg-green-600 text-white">Título</th>';
                    echo '<th class="px-4 py-2 bg-green-600 text-white">Categoria</th>';
                    echo '<th class="px-4 py-2 bg-green-600 text-white">ISBN</th>';
                    echo '<th class="px-4 py-2 bg-green-600 text-white">Idioma</th>';
                    echo '<th class="px-4 py-2 bg-green-600 text-white">Quantidade de Páginas</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody class="bg-white divide-y divide-gray-200">';
                
                    foreach ($livro_bd as $livro) {
                        echo '<tr>';
                        echo "<td class='px-4 py-2'>{$livro['Cod_Livro']}</td>";
                        echo "<td class='px-4 py-2'>{$livro['Titulo']}</td>";
                        echo "<td class='px-4 py-2'>{$livro['Categoria']}</td>";
                        echo "<td class='px-4 py-2'>{$livro['ISBN']}</td>";
                        echo "<td class='px-4 py-2'>{$livro['Idioma']}</td>";
                        echo "<td class='px-4 py-2'>{$livro['QtdePag']}</td>";
                        echo '</tr>';
                    }
                
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '</div>';
                

            } else {
                echo '<p class="text-center text-red-500">Nenhum resultado encontrado.</p>';
            }
        }
        ?>

        <div class="mt-8 text-center">
            <button class="bg-green-600 text-white py-3 px-6 rounded hover:bg-green-700 transition duration-300">
                <a href="menuLivro.php" class="block w-full h-full">Voltar</a>
            </button>
        </div>
    </div>
</body>

</html>
