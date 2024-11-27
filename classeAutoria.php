<?php
include_once 'classeConexao.php';

class Autoria
{
    private $Cod_Autor;
    private $Cod_Livro;
    private $DataLancamento;
    private $Editora;
    private $conn;

 
    public function getCod_Autor() {
        return $this->Cod_Autor;
    }

    public function setCod_Autor($Cod_Autor) {
        $this->Cod_Autor = $Cod_Autor;
    }

    public function getCod_Livro() {
        return $this->Cod_Livro;
    }

    public function setCod_Livro($Cod_Livro) {
        $this->Cod_Livro = $Cod_Livro;
    }

    public function getDataLancamento() {
        return $this->DataLancamento;
    }

    public function setDataLancamento($DataLancamento) {
        $this->DataLancamento = $DataLancamento;
    }

    public function getEditora() {
        return $this->Editora;
    }

    public function setEditora($Editora) {
        $this->Editora = $Editora;
    }

    public function salvar() {
        try {
            $this->conn = new Conexao();
            @$sql = $this->conn->prepare("INSERT INTO Autoria (Cod_Autor, Cod_Livro, DataLancamento, Editora) VALUES (?, ?, ?, ?)");
            @$sql->bindParam(1, $this->getCod_Autor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCod_Livro(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getDataLancamento(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getEditora(), PDO::PARAM_STR);

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
            $sql = $this->conn->prepare("SELECT * FROM autoria WHERE Cod_autor = ? AND Cod_Livro = ?");
            
       
            @$sql->bindParam(1, $this->getCod_Autor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCod_Livro(), PDO::PARAM_STR); // Novo parâmetro
            
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
            
          
            $sql = $this->conn->prepare("UPDATE Autoria SET DataLancamento = ?, Editora = ? WHERE Cod_Autor = ? AND Cod_Livro = ?");
            

            @$sql->bindParam(1, $this->getDataLancamento(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getEditora(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getCod_Autor(), PDO::PARAM_INT);
            @$sql->bindParam(4, $this->getCod_Livro(), PDO::PARAM_INT);
    
            if ($sql->execute()) {
                return "Registro alterado com sucesso!";
            } else {
                return "Erro ao executar a atualização.";
            }
    
            $this->conn = null;
    
        } catch (PDOException $exc) {
            return "Erro ao alterar o registro: " . $exc->getMessage();
        }
    }
    

    public function listar() {
        try {
            $this->conn = new Conexao();
            @$sql = $this->conn->query("SELECT * FROM Autoria ORDER BY Cod_Autor");
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }

    public function exclusao() {
        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("DELETE FROM Autoria WHERE Cod_Autor = ? AND Cod_Livro = ?");
            @$sql->bindParam(1, $this->getCod_Autor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCod_Livro(), PDO::PARAM_STR);

            if ($sql->execute()) {
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
            $sql = $this->conn->prepare("SELECT * FROM Autoria WHERE Editora like ?");
            @$sql->bindParam(1, $this->getEditora(), PDO::PARAM_STR);
           
             $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
            
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }
}
  

?>
