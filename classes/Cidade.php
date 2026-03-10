<?php
class Cidade
{
    public static function save($cidade)
    {
        $conn = new PDO("mysql:host=localhost;dbname=treinamento;user=root;password=");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (empty($cidade['id'])) {
            var_dump("1");
            
            $result = $conn->query("SELECT max(id) as next FROM cidade");
            $row = $result->fetch();
            $cidade['id'] = (int) $row['next'] + 1;
            $sql = "INSERT INTO pessoa (id,nome, id_estado) VALUES ( '{$cidade['id']}', '{$cidade['nome']}', '{$cidade['id_cidade']}')";

        } else {
            $sql = "UPDATE pessoa SET nome = '{$cidade['nome']}' id_estado = '{$cidade['id_estado']}' WHERE id = '{$cidade['id']}'";
        }
        return $conn->query($sql);
    }
    public static function find($id)
    {
        $conn = new PDO("mysql:host=localhost;dbname=treinamento;user=root;password=''");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("SELECT * FROM pessoa WHERE id='{$id}'");
        return $result->fetch();
    }

    public static function all() {
        $conn = new PDO("mysql:host=localhost;dbname=treinamento;user=root;password=");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("SELECT * FROM cidade");
        $list = $result->fetchAll();
        return $list;
        
    }
    // .. outros métodos
}
