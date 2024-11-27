<?php
include_once 'classeConexao.php';

class Livro
{
    private $Cod_Livro;
    private $Titulo;
    private $Categoria;
    private $ISBN;
    private $Idioma;
    private $QtdePag;
    private $conn;

    public function getCod_Livro() {
        return $this->Cod_Livro;
    }

    public function setCod_Livro($Cod_Livro) {
        $this->Cod_Livro = $Cod_Livro;
    }

    public function getTitulo() {
        return $this->Titulo;
    }

    public function setTitulo($Titulo) {
        $this->Titulo = $Titulo;
    }

    public function getCategoria() {
        return $this->Categoria;
    }

    public function setCategoria($Categoria) {
        $this->Categoria = $Categoria;
    }

    public function getISBN() {
        return $this->ISBN;
    }

    public function setISBN($ISBN) {
        $this->ISBN = $ISBN;
    }

    public function getIdioma() {
        return $this->Idioma;
    }

    public function setIdioma($Idioma) {
        $this->Idioma = $Idioma;
    }

    public function getQtdePag() {
        return $this->QtdePag;
    }

    public function setQtdePag($QtdePag) {
        $this->QtdePag = $QtdePag;
    }

    public function salvar() {
        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("INSERT INTO livro (Cod_Livro, Titulo, Categoria, ISBN, Idioma, QtdePag) VALUES (?, ?, ?, ?, ?, ?)");
            @$sql->bindParam(1, $this->getCod_Livro(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getTitulo(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getCategoria(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getISBN(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getIdioma(), PDO::PARAM_STR);
            @$sql->bindParam(6, $this->getQtdePag(), PDO::PARAM_INT);
            
            if ($sql->execute()) {
                return "Registro salvo com sucesso!";
            } else {
                return "Erro ao salvar o registro!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao salvar o registro: " . $exc->getMessage();
        }
    }
    function alterar() {
        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("SELECT * FROM livro WHERE Cod_livro = ?");
            @$sql->bindParam(1, $this->getCod_Livro(), PDO::PARAM_INT);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
           
        } catch (PDOException $exc) {
            echo "Erro ao alterar: " . $exc->getMessage();
        }
    }

    function alterar2() {
        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("UPDATE livro SET Titulo = ?, Categoria = ?, ISBN = ?, Idioma = ?, QtdePag = ? WHERE Cod_Livro = ?");
            
            
            @$sql->bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCategoria(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getISBN(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getIdioma(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getQtdePag(), PDO::PARAM_INT);
            @$sql->bindParam(6, $this->getCod_Livro(), PDO::PARAM_INT); // Cod_Livro é o último parâmetro aqui
        
          
            if ($sql->execute()) {
                return "Registro alterado com sucesso!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao alterar o registro: " . $exc->getMessage();
        }
    }
   
    public function listar() {
        try {
            $this->conn = new Conexao();
            $sql = $this->conn->query("SELECT * FROM livro ORDER BY Cod_Livro");
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }
    function exclusao() {
        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("DELETE FROM Livro WHERE Cod_livro = ?");
            @$sql->bindParam(1, $this->getCod_Livro(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return "Excluído com sucesso!";
            } else {
                return "Erro na exclusão!";
            }
            $this->conn = null;
    
        } catch (PDOException $exc) {
            echo "Erro ao excluir: " . $exc->getMessage();
        } 
            
        
    }
    
     function consultar() {
        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("SELECT * FROM Livro WHERE Cod_Livro LIKE ?");
            @$sql->bindParam(1, $this->getCod_Livro(), PDO::PARAM_STR);
            
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }
}

?>