<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .list-group-item:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .list-group-item a:hover {
            color: #4b5563;
        }
    </style>
</head>
<body class="bg-gray-200">
    <div class="w-full h-12 bg-green-600"></div>
    <div class="container mx-auto mt-8 max-w-md">
      <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Menu Livro</h1>
        <div class="bg-white rounded-lg shadow-lg">
            <ul class="list-group">
                <li class="list-group-item border-b border-gray-200 transition duration-300 hover:-translate-y-1 hover:scale-105 hover:bg-gray-100">
                    <a href="classeListar.php" class="flex items-center py-4 px-6 text-gray-800 hover:text-gray-900">
                        <i class="bi bi-list text-xl mr-3"></i> <b>Listar Livros</b>
                    </a>
                </li>
                <li class="list-group-item border-b border-gray-200 transition duration-300 hover:-translate-y-1 hover:scale-105 hover:bg-gray-100">
                <a href="classeCadastrarLivro.php" class="flex items-center py-4 px-6 text-gray-800 hover:text-gray-900">
                        <i class="bi bi-plus text-xl mr-3"></i> <b>Cadastrar Livro</b>
                    </a>
                </li>
                <li class="list-group-item border-b border-gray-200 transition duration-300 hover:-translate-y-1 hover:scale-105 hover:bg-gray-100">
                    <a href="classeAlterarLivro.php" class="flex items-center py-4 px-6 text-gray-800 hover:text-gray-900">
                        <i class="bi bi-pencil text-xl mr-3"></i> <b>Alterar Livro</b>
                    </a>
                </li>
                <li class="list-group-item border-b border-gray-200 transition duration-300 hover:-translate-y-1 hover:scale-105 hover:bg-gray-100">
                    <a href="classeExcluirLivro.php" class="flex items-center py-4 px-6 text-gray-800 hover:text-gray-900">
                        <i class="bi bi-trash text-xl mr-3"></i> <b>Excluir Livro</b>
                    </a>
                </li>
                <li class="list-group-item border-b border-gray-200 transition duration-300 hover:-translate-y-1 hover:scale-105 hover:bg-gray-100">
                    <a href="classeConsultarLivro.php" class="flex items-center py-4 px-6 text-gray-800 hover:text-gray-900">
                        <i class="bi bi-search text-xl mr-3"></i> <b>Consultar Livros</b>
                    </a>
                </li>
            </ul>
        </div>
        <div class="mt-8 text-center">
            <button class="bg-green-600 text-white py-3 px-6 rounded hover:bg-green-700 transition duration-300">
                <a href="menu.php" class="block w-full h-full">Voltar</a>
            </button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>