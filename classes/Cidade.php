<?php
require_once "model/ModelBase.php";
require_once "classes/Estado.php";

class Cidade extends ModelBase
{
    public static function save($cidade)
    {

        $conn = self::getConnection();

        if (empty($cidade['id'])) {
            
            $result = $conn->query("SELECT max(id) as next FROM cidade");
            $row = $result->fetch();
            $cidade['id'] = (int) $row['next'] + 1;
            $sql = "INSERT INTO cidade (id,nome, id_estado) VALUES ( '{$cidade['id']}', '{$cidade['nome']}', '{$cidade['id_estado']}')";

        } else {
            $sql = "UPDATE cidade SET nome = '{$cidade['nome']}', id_estado = '{$cidade['id_estado']}' WHERE id = '{$cidade['id']}'";
        }
        return $conn->query($sql);
    }

    static public function delete($id)
    {
        $conn = self::getConnection();
        return $conn->query("DELETE FROM cidade WHERE id='{$id}'");
    }

    static public function find($id)
    {
        $conn = self::getConnection();
        $result = $conn->query("SELECT * FROM cidade WHERE id='{$id}'");
        return $result->fetch();
    }

    public static function all() {
        $conn = self::getConnection();
        $result = $conn->query("SELECT cidade.*, estado.nome as nome_estado FROM cidade JOIN estado ON cidade.id_estado = estado.id");
        $list = $result->fetchAll();
        return $list;
        
    }

    public static function all_cidades($id_estado) {
        $conn = self::getConnection();
        $result = $conn->query("SELECT * FROM cidade WHERE id_estado = '{$id_estado}'");
        $list = $result->fetchAll();
        return $list;
    }

}
