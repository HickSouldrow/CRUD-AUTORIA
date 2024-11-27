<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex flex-col justify-center items-center">
    <div class="w-full max-w-md mx-auto">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold text-green-600 text-center mb-6">Login de Usuário</h1>
            <form name="login" method="POST" action="">
                <fieldset class="mb-4">
                    <legend class="text-lg font-semibold mb-2">Credenciais de Acesso</legend>
                    <div class="mb-4">
                        <label for="txtlogin" class="block text-gray-700 mb-2">Login:</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-600" id="txtlogin" name="txtlogin" placeholder="Digite seu login">
                    </div>
                    <div class="mb-4">
                        <label for="txtsenha" class="block text-gray-700 mb-2">Senha:</label>
                        <input type="password" name="txtsenha" maxlength="8" required onkeypress="return blokletras(window.event.keyCode)" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-600" id="txtsenha" placeholder="Digite sua senha">
                    </div>
                </fieldset>
                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition duration-300" name="btnLogin">Entrar</button>
                <button type="reset" class="w-full mt-4 bg-transparent border border-green-600 text-green-600 py-2 rounded hover:bg-green-600 hover:text-white transition duration-300" name="btnLimpar">Limpar</button>
            </form>
        </div>

  
        <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnLogin)) {
            include_once 'classeUsuario.php';
            $usuario = new Usuario();
            $usuario->setUsu($txtlogin);
            $usuario->setSenha($txtsenha);
            $existe = false;
            $pro_bd = $usuario->logar();

        
            if($pro_bd) {
                $existe = true;
                foreach($pro_bd as $pro_mostrar) {
                    echo '<div class="bg-green-100 text-green-700 border border-green-400 rounded px-4 py-3 mt-6 text-center">';
                    echo '<h3 class="text-lg font-bold">Login bem-sucedido!</h3>';
                    echo '<p class="mt-2"><b>Bem-vindo! Usuário: ' . $pro_mostrar[0] . '</b></p>';
                    echo '<a href="menu.php" class="block mt-4 bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">Entrar</a>';
                    echo '</div>';
                }
            }

            if(!$existe) {
                echo '<div class="bg-red-100 text-red-700 border border-red-400 rounded px-4 py-3 mt-6 text-center">';
                echo '<h3 class="text-lg font-bold">Login ou senha incorretos.</h3>';
                echo '</div>';
            }
        }
        ?>
    </div>

   
    <script>
    function blokletras(keyCode) {
        if (keyCode >= 48 && keyCode <= 57) {
            return true; 
        }
        return false; 
    }
    </script>
</body>
</html>
