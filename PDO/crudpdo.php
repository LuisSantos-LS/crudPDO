<?php
//Conexão
/*try 
{
$pdo = new PDO("mysql:dbname=crudpdo;host=localhost","root","");
} 
catch (PDOException $e) {
    echo "Erro com banco de dados: ".$e->getMessage();
}
catch(Exception $e) {
    echo "Erro generico: ".$e->getMessage();
}
*/

//------------------INSERT
//1 forma
//$res = $pdo->prepare("INSERT INTO pessoa(nome, telefone, email)
    //VALUES (:n, :t, :e)");

//$res->bindValue(":n","Roberta");
//$res->bindValue(":t","111111");
//$res->bindValue(":e","teste2@gmail.com");
//$res->execute();

//2 forma
//$pdo->query("INSERT INTO pessoa(nome, telefone, email) VALUES('Paulo','2222222','teste3@gmail.com')")

//------------------DELETE E UPDATE

//1 forma-DELETE

/*$cmd = $pdo->prepare("DELETE FROM pessoa WHERE id = :id");
$id = 2;
$cmd->bindValue(":id",$id);
$cmd->execute();*/

//2 forma-DELETE

//$res = $pdo->query("DELETE FROM pessoa WHERE id = '3' ");

//1 forma-UPDATE
/*
$cmd = $pdo->prepare("UPDATE pessoa SET email = :e WHERE id = :id");
$cmd->bindValue(":e","miriam@gmail.com");
$cmd->bindValue(":id",1);
$cmd->execute();*/

//2 forma-UPDATE

//$res = $pdo->query("UPDATE pessoa SET email = 'miriamnovo@gmail.com' WHERE id = '1'");

//------------------------SELECT

//1 forma
/*$cmd = $pdo->prepare("SELECT * FROM pessoa WHERE id = :id");
$cmd->bindValue(":id",1);
$cmd->execute();*/

//2 forma
/*$cmd = $pdo->query("SELECT * FROM pessoa WHERE id = 1");*/
//$resultado = $cmd->fetch(PDO::FETCH_ASSOC);
//ou fetch para um registro e fetchAll para todos ou mais de um 
//$cmd->fetchAll();

/*foreach ($resultado as $key => $value) {

    echo $key.":".$value."<br>";
}*/

?>