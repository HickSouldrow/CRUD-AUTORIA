<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Livros Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="w-full h-12 bg-green-600"></div>

    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Alteração de Livros Cadastrados</h1>
        
     
        <div class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
        <form name = "autoria" method = "POST" action = "ClasseAlterarLivro2.php">                <fieldset id="a" class="mb-4">
                    <legend class="text-xl font-semibold mb-4">Informe o Código do Livro Desejado</legend>

                    <div class="mb-4">
                        <label for="txtCod_Livro" class="block mb-2">Código do Livro:</label>
                        <input name="txtCod_Livro" type="text" class="w-full px-3 py-2 border border-gray-300 rounded" id="txtCodLivro" maxlength="5" placeholder="Código do Livro">
                    </div>
                </fieldset>
                <fieldset id="b" class="mb-4">
                    <legend class="text-xl font-semibold mb-4">Opções</legend>
                    <div class="flex justify-between">
                    <button type="submit" class="w-1/2 bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition mr-2" name="btnalterar">Buscar Livro</button>
                        <button type="reset" class="w-1/2 bg-gray-400 text-white py-2 rounded hover:bg-gray-500 transition ml-2">Limpar</button>
                    </div>
                    
        <div class="mt-8 text-center">
            <button class="bg-green-600 text-white py-3 px-6 rounded hover:bg-green-700 transition duration-300">
                <a href="menuLivro.php" class="block w-full h-full">Voltar</a>
            </button>
        </div>
    </div>
</body>
</html>
