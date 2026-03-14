<?php
require_once "model/ModelBase.php";

class Estado extends ModelBase
{
    public static function save($estado)
    {

        $conn = self::getConnection();

        if (empty($estado['id'])) {
            
            $result = $conn->query("SELECT max(id) as next FROM cidade");
            $row = $result->fetch();
            $estado['id'] = (int) $row['next'] + 1;
            $sql = "INSERT INTO estado (id, sigla, nome) VALUES ('{$estado['id']}', '{$estado['sigla']}', '{$estado['nome']}')";
        } else {
            $sql = "UPDATE estado SET nome = '{$estado['nome']}', sigla = '{$estado['sigla']}' WHERE id = '{$estado['id']}'";
        }
        return $conn->query($sql);
    }

    public static function find($id)
    {
        $conn = self::getConnection();
        $result = $conn->query("SELECT * FROM estado WHERE id='{$id}'");
        return $result->fetch();
    }

    public static function all() {
        $conn = self::getConnection();
        $result = $conn->query("SELECT * FROM estado");
        $list = $result->fetchAll();
        return $list;
    }

    public static function all_cidades($id_estado){
        $conn = self::getConnection();
        $result = $conn->query("SELECT * FROM cidade WHERE id_estado = {$id_estado}");
        $list = $result->fetchAll();
        return $list;
    }

    public static function delete($id)
    {
        $conn = self::getConnection();
        return $conn->query("DELETE FROM estado WHERE id='{$id}'");
    }
}
