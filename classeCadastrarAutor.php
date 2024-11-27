<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="w-full h-12 bg-green-600"></div>
    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Relação de Autores Cadastrados</h1>
        <form name="cliente" method="POST" action="" class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
            <fieldset id="a" class="mb-4">
                <legend class="text-xl font-semibold mb-4"><b>Dados dos Autores:</b></legend>
                <div class="mb-4">
                    <label for="txtcod_autor" class="block mb-2">Código do Autor:</label>
                    <input name="txtcod_autor" type="text" placeholder="Código do Autor" class="w-full px-3 py-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="txtNomeAutor" class="block mb-2">Nome do Autor:</label>
                    <input name="txtNomeAutor" type="text" placeholder="Nome do Autor" class="w-full px-3 py-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="txtSobrenome" class="block mb-2">Sobrenome do Autor:</label>
                    <input name="txtSobrenome" type="text" placeholder="Sobrenome do Autor" class="w-full px-3 py-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="txtEmail" class="block mb-2">Email do Autor:</label>
                    <input name="txtEmail" type="text" placeholder="email@example.com" class="w-full px-3 py-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="txtNasc" class="block mb-2">Data de Nascimento:</label>
                    <input name="txtNasc" type="text" placeholder="yyyy/mm/dd" class="w-full px-3 py-2 border border-gray-300 rounded">
                </div>
            </fieldset>
            <fieldset id="b" class="mb-4">
                <legend class="text-xl font-semibold mb-4"><b>Opções:</b></legend>
                <div class="flex justify-between">
                    <input name="btnenviar" type="submit" value="Cadastrar" class="w-1/2 bg-green-600 text-white py-2 rounded hover:bg-green-700 cursor-pointer mr-2">
                    <input name="Limpar" type="reset" value="Limpar" class="w-1/2 bg-green-400 text-white py-2 rounded hover:bg-green-500 cursor-pointer">
                </div>
            </fieldset>
        </form>

        <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnenviar)) {
            include_once 'classeAutor.php';
            $pro = new Autor();
            $pro->setCod_Autor($txtcod_autor);
            $pro->setNomeAutor($txtNomeAutor);
            $pro->setSobrenome($txtSobrenome);
            $pro->setEmail($txtEmail);
            $pro->setNasc($txtNasc);

            echo "<h3 class='mt-4 text-center text-green-500'>" . $pro->salvar() . "</h3>";
        }
        ?>

        <div class="mt-8 text-center">
            <button class="bg-green-600 text-white py-3 px-6 rounded hover:bg-green-700 transition duration-300">
                <a href="menuAutor.php" class="block w-full h-full">Voltar</a>
            </button>
        </div>
    </div>
</body>
</html>
