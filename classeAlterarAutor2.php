<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Autores Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="w-full h-12 bg-green-600"></div>

    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Alteração de Autores Cadastrados</h1>

        <div class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
            <form name="cliente" method="POST" action="">
                <fieldset id="a" class="mb-4">
                    <legend class="text-xl font-semibold mb-4">Informe o Código do Autor Desejado</legend>
                    <div class="mb-4">
                        <label for="txtCod_Autor" class="block mb-2">Código do Autor:</label>
                       
                        <input name="txtCod_Autor" type="text" class="w-full px-3 py-2 border border-gray-300 rounded" id="txtCod_Autor" maxlength="5" placeholder="Código do Autor" value="<?php echo isset($_POST['txtCod_Autor']) ? $_POST['txtCod_Autor'] : ''; ?>">
                    </div>
                </fieldset>
                <fieldset id="b" class="mb-4">
                    <legend class="text-xl font-semibold mb-4">Opções</legend>

                    <div class="flex justify-between">
                        <button type="submit" class="w-1/2 bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition mr-2" name="btnalterar">Buscar Autor</button>
                        <button type="reset" class="w-1/2 bg-gray-400 text-white py-2 rounded hover:bg-gray-500 transition ml-2">Limpar</button>

                    </div>
                </fieldset>
            </form>


            <div class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto mt-8">
                <?php
                if (isset($_POST['txtCod_Autor'])) {
                    $txtCod_Autor = $_POST["txtCod_Autor"];

                    include_once 'classeAutor.php';
                    $p = new Autor();
                    $p->setCod_Autor($txtCod_Autor);
                    $pro_bd = $p->alterar();

                    if (!empty($pro_bd)) {
                        foreach ($pro_bd as $pro_mostrar) {
                            ?>
                            <form name="cliente2" method="POST" action="">
                                <input type="hidden" name="txtCod_Autor" value="<?php echo $pro_mostrar[0]; ?>">
                                <div class="mb-4">
                                    <label class="block mb-2">Código do Autor:</label>
                                    <p class="px-3 py-2 bg-white border rounded bg-gray-100"><?php echo $pro_mostrar[0]; ?></p>
                                </div>
                                <div class="mb-4">
                                    <label for="txtNomeAutor" class="block mb-2">Nome do Autor:</label>
                                    <input type="text" name="txtNomeAutor" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo $pro_mostrar[1]; ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="txtSobrenome" class="block mb-2">Sobrenome:</label>
                                    <input type="text" name="txtSobrenome" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo $pro_mostrar[2]; ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="txtEmail" class="block mb-2">E-mail:</label>
                                    <input type="text" name="txtEmail" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo $pro_mostrar[3]; ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="txtNasc" class="block mb-2">Data de Nascimento:</label>
                                    <input type="text" name="txtNasc" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo $pro_mostrar[4]; ?>">
                                </div>
                                <button type="submit" name="btnalterar_Autor" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">Salvar Alterações</button>
                            </form>
                            <?php
                        }
                    } else {
                        echo "<div class='text-center text-red-500 mt-4'>Autor não encontrado!</div>";
                    }
                }
                ?>

              
                <?php
                if (isset($_POST["btnalterar_Autor"])) { 
                    $txtCod_Autor = $_POST["txtCod_Autor"];
                    $txtNomeAutor = $_POST["txtNomeAutor"];
                    $txtSobrenome = $_POST["txtSobrenome"];
                    $txtEmail = $_POST["txtEmail"];
                    $txtNasc = $_POST["txtNasc"];

                    include_once 'classeAutor.php';
                    $Autor = new Autor();
                    $Autor->setCod_Autor($txtCod_Autor);
                    $Autor->setNomeAutor($txtNomeAutor);
                    $Autor->setSobrenome($txtSobrenome);
                    $Autor->setEmail($txtEmail);
                    $Autor->setNasc($txtNasc);

                    echo '<div class="container mt-4">';
                    echo '<div class="card">';
                    echo '<div class="card-body text-center">';
                    echo '<br><br><br>' . $Autor->alterar2() . '<br><br>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    @header("location:classeAlterarAutor.php");
                }
                ?>
            </div>
        </div>

        <div class="mt-8 text-center">
            <button class="bg-green-600 text-white py-3 px-6 rounded hover:bg-green-700 transition duration-300">
                <a href="menuAutor.php" class="block w-full h-full">Voltar</a>
            </button>
        </div>
    </div>
</body>
</html>
