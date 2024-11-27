<?php
include_once 'classeConexao.php';

class Autor
{
    private $Cod_Autor;
    private $NomeAutor;
    private $Sobrenome;
    private $Email;
    private $Nasc;

    private $conn;


    public function getCod_Autor() {
        return $this->Cod_Autor;
    }

    public function setCod_Autor($Cod_Autor) {
        $this->Cod_Autor = $Cod_Autor;
    }

    public function getNomeAutor() {
        return $this->NomeAutor;
    }

    public function setNomeAutor($NomeAutor) {
        $this->NomeAutor = $NomeAutor;
    }

    public function getSobrenome() {
        return $this->Sobrenome;
    }

    public function setSobrenome($Sobrenome) {
        $this->Sobrenome = $Sobrenome;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function setEmail($Email) {
        $this->Email = $Email;
    }

    public function getNasc() {
        return $this->Nasc;
    }

    public function setNasc($Nasc) {
        $this->Nasc = $Nasc;
    }

    public function salvar() {
        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("INSERT INTO Autor (Cod_Autor, NomeAutor, Sobrenome, Email, Nasc) VALUES (?, ?, ?, ?, ?)");
            @$sql->bindParam(1, $this->getCod_Autor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getNomeAutor(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getSobrenome(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getNasc(), PDO::PARAM_STR);

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

   
    public function listar() {
        try {
            $this->conn = Conexao::getInstance();
            $sql = $this->conn->query("SELECT * FROM Autor ORDER BY Cod_Autor");
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }
    public function consultar() {
        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("SELECT * FROM Autor WHERE Cod_Autor LIKE ?");
            @$sql->bindParam(1, $this->getCod_Autor(), PDO::PARAM_STR);
            
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
            $this->conn = null;
        
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }

    function alterar() {
        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("SELECT * FROM autor WHERE Cod_autor = ?");
            @$sql->bindParam(1, $this->getCod_Autor(), PDO::PARAM_INT);
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
            $sql = $this->conn->prepare("UPDATE Autor SET NomeAutor = ?, Sobrenome = ?, Email = ?, Nasc = ? WHERE Cod_Autor = ?");
            
            
            @$sql->bindParam(1, $this->getNomeAutor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getNasc(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getCod_Autor(), PDO::PARAM_STR);

        
          
            if ($sql->execute()) {
                return "Registro alterado com sucesso!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao alterar o registro: " . $exc->getMessage();
        }
    } 
    public function exclusao() {
        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("DELETE FROM Autor WHERE Cod_Autor = ?");
            @$sql->bindParam(1, $this->getCod_Autor(), PDO::PARAM_INT);
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

}
?>