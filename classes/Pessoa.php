<?php
require_once "model/ModelBase.php";

class Pessoa extends ModelBase
{

    public static function save($pessoa)
    {
        $conn = self::getConnection();

        if (empty($pessoa['id'])) {

            $result = $conn->query("SELECT max(id) as next FROM pessoa");
            $row = $result->fetch();
            $pessoa['id'] = (int) $row['next'] + 1;
            $sql = "INSERT INTO pessoa (id, nome, endereco, bairro,
            telefone, email, id_cidade)
            VALUES ( :id, :nome, :endereco,
            :bairro, :telefone,
            :email, :id_cidade
            )";
        } else {
            $sql = "UPDATE pessoa SET nome = :nome,
            endereco = :endereco,
            bairro = :bairro,
            telefone = :telefone,
            email = :email,
            id_cidade = :id_cidade
            WHERE id = :id";
        }
        $result = $conn->prepare($sql);
        $result->execute([
            ':id' => $pessoa['id'],
            ':nome' => $pessoa['nome'],
            ':endereco' => $pessoa['endereco'],
            ':bairro' => $pessoa['bairro'],
            ':telefone' => $pessoa['telefone'],
            ':email' => $pessoa['email'],
            ':id_cidade' => $pessoa['id_cidade'],
        ]);
    }

    public static function find($id)
    {
        $conn = self::getConnection();
        $result = $conn->query("SELECT pessoa.*, cidade.id_estado FROM pessoa INNER JOIN cidade ON pessoa.id_cidade = cidade.id WHERE pessoa.id = '{$id}'");
        return $result->fetch();
    }

    public static function all() {
        $conn = self::getConnection();
        $result = $conn->query("SELECT * FROM pessoa ORDER BY id");
        $list = $result->fetchAll(PDO::FETCH_ASSOC);
    
        return $list;
    } 

    public static function delete(int $id) {
        $conn = self::getConnection();
        $result = $conn->query("DELETE FROM pessoa WHERE id='{$id}'");
    
        return $result; 
        
    } 
}
