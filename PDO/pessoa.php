<?php
    Class Pessoa{

        private $pdo;
        //6 funcoes
        //CONEXAO COM O BANCO DE DADOS
        public function __construct($dbname, $host, $user, $senha)
        {
            try
            {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
            }
            catch (PDOException $e) {
                echo "Erro com banco de dados: ".$e->getMessage();
                exit();
            }
            catch (Exception $e) {
                echo "Erro generico: ".$e->getMessage();
            }
        }
//FUNCAO PEGAR OS DADOS E COLOCAR NA VIEW
        public function buscarDados()
        {
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM pessoa ORDER BY nome");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }


//FUNCAO CADASTRAR PESSOA
        public function cadastrarPessoa($nome, $telefone, $email)
        {
            //ANTES DE CADASTRAR VERIFICAR SE JA TEM O EMAIL CADASTRADA
            $stm = $this->pdo->prepare("SELECT id FROM pessoa WHERE email = :e");
            $stm->bindValue(":e",$email);
            $stm->execute();
            if($stm->rowCount() > 0)
            {
                return false;
            }else{
                $cmd = $this->pdo->prepare("INSERT INTO pessoa ( nome, telefone, email) VALUES (:n, :t, :e)");
                $cmd->bindValue(":n",$nome);
                $cmd->bindValue(":t",$telefone);
                $cmd->bindValue(":e",$email);
                $cmd->execute();
                return  true;
            }
        }

        public function excluirPessoa($id)
        {
            $cmd = $this->pdo->prepare("DELETE FROM pessoa WHERE id = :id");
            $cmd->bindValue(":id",$id);
            $cmd->execute();
        }

        //BUSCAR DADOS DE UMA PESSOA
        public function buscarDadosPessoa($id)
        {
            $res = array();
            $cmd = $this->pdo->prepare("SELECT * FROM pessoa WHERE id = :id");
            $cmd->bindValue(":id",$id);
            $cmd->execute();
            $res = $cmd->fetch(PDO::FETCH_ASSOC);
            return $res;
        }


        //ATUALIZAR DADOS NO BANCO DE DADOS
        public function atualizarDados($id,$nome, $telefone,$email)
        {
            $cmd = $this->pdo->prepare("UPDATE pessoa SET nome = :n, telefone = :t, email = :e WHERE id = :id");
            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":t",$telefone);
            $cmd->bindValue(":e",$email);
            $cmd->bindValue(":id",$id);
            $cmd->execute();
            
        }
    }
?>