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
            <form name="cliente" method="POST" action="">
                <fieldset id="a" class="mb-4">
                    <legend class="text-xl font-semibold mb-4">Informe o Código do Livro Desejado</legend>
                    <div class="mb-4">
                        <label for="txtCod_Livro" class="block mb-2">Código do Livro:</label>
                        
                        <input name="txtCod_Livro" type="text" class="w-full px-3 py-2 border border-gray-300 rounded" id="txtCodLivro" maxlength="5" placeholder="Código do Livro" value="<?php echo isset($_POST['txtCod_Livro']) ? $_POST['txtCod_Livro'] : ''; ?>">
                    </div>
                </fieldset>
                <fieldset id="b" class="mb-4">
                    <legend class="text-xl font-semibold mb-4">Opções</legend>
                    
                    <div class="flex justify-between">
                        <button type="submit" class="w-1/2 bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition mr-2" name="btnalterar">Buscar Livro</button>
                        <button type="reset" class="w-1/2 bg-gray-400 text-white py-2 rounded hover:bg-gray-500 transition ml-2">Limpar</button>
                    </div>
                </fieldset>
            </form>

         
            <div class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto mt-8">
                <?php
                if (isset($_POST['txtCod_Livro'])) {
                    $txtCod_Livro = $_POST["txtCod_Livro"];

                    include_once 'classeLivro.php';
                    $p = new Livro();
                    $p->setCod_Livro($txtCod_Livro);
                    $pro_bd = $p->alterar();

                    if (!empty($pro_bd)) {
                        foreach ($pro_bd as $pro_mostrar) {
                            ?>
                            <form name="cliente2" method="POST" action="">
                                <input type="hidden" name="txtCod_Livro" value="<?php echo $pro_mostrar[0]; ?>">
                                <div class="mb-4">
                                    <label class="block mb-2">Código do Livro:</label>
                                    <p class="px-3 py-2 bg-white border rounded bg-gray-100"><?php echo $pro_mostrar[0]; ?></p>
                                </div>
                                <div class="mb-4">
                                    <label for="txtTitulo" class="block mb-2">Título: </label>
                                    <input type="text" name="txtTitulo" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo $pro_mostrar[1]; ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="txtCategoria" class="block mb-2">Categoria:</label>
                                    <input type="text" name="txtCategoria" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo $pro_mostrar[2]; ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="txtISBN" class="block mb-2">ISBN:</label>
                                    <input type="text" name="txtISBN" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo $pro_mostrar[3]; ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="txtIdioma" class="block mb-2">Idioma:</label>
                                    <input type="text" name="txtIdioma" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo $pro_mostrar[4]; ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="txtQtdePag" class="block mb-2">Quantidade de Páginas:</label>
                                    <input type="text" name="txtQtdePag" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo $pro_mostrar[5]; ?>">
                                </div>
                                <button type="submit" name="btnalterar_produto" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">Salvar Alterações</button>
                            </form>
                            <?php
                        }
                    } else {
                        echo "<div class='text-center text-red-500 mt-4'>Livro não encontrado!</div>";
                    }
                }
                ?>

                <?php
                if (isset($_POST["btnalterar_produto"])) {
                    $txtCod_Livro = $_POST["txtCod_Livro"];
                    $txtTitulo = $_POST["txtTitulo"];
                    $txtCategoria = $_POST["txtCategoria"];
                    $txtISBN = $_POST["txtISBN"];
                    $txtIdioma = $_POST["txtIdioma"];
                    $txtQtdePag = $_POST["txtQtdePag"];

                    include_once 'classeLivro.php';
                    $livro = new Livro();
                    $livro->setCod_Livro($txtCod_Livro);
                    $livro->setTitulo($txtTitulo);
                    $livro->setCategoria($txtCategoria);
                    $livro->setISBN($txtISBN);
                    $livro->setIdioma($txtIdioma);
                    $livro->setQtdePag($txtQtdePag);

                    echo '<div class="container mt-4">';
                    echo '<div class="card">';
                    echo '<div class="card-body text-center">';
                    echo '<br><br><br>' . $livro->alterar2() . '<br><br>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    @header("location:classeAlterarLivro.php");
                }
                ?>
            </div>
        </div>

        <div class="mt-8 text-center">
            <button class="bg-green-600 text-white py-3 px-6 rounded hover:bg-green-700 transition duration-300">
                <a href="menuLivro.php" class="block w-full h-full">Voltar</a>
            </button>
        </div>
    </div>
</body>
</html>
