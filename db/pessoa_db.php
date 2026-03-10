<?php
function lista_pessoas()
{
    $conn = new mysqli("localhost", "root", "", "treinamento");
    $result = $conn->query("SELECT * FROM pessoa ORDER BY id");
    $list = $result->fetch_all(MYSQLI_ASSOC);
    
    return $list;
}
function exclui_pessoa($id)
{
    $conn = new mysqli("localhost", "root", "", "treinamento");
    $result = $conn->query("DELETE FROM pessoa WHERE id='{$id}'");
    
    return $result;
}
function get_pessoa($id)
{
    $conn = new mysqli("localhost", "root", "", "treinamento");
    $result = $conn->query("SELECT * FROM pessoa WHERE id='{$id}'");
    $pessoa = $result->fetch_assoc();
    
    return $pessoa;
}
function get_next_pessoa()
{
    $conn = new mysqli("localhost", "root", "", "treinamento");
    $result = $conn->query("SELECT max(id) as next FROM pessoa");
    $next = (int) $result->fetch_assoc()['next'] + 1;
    
    return $next;
}
function insert_pessoa($pessoa)
{
    $conn = new mysqli("localhost", "root", "", "treinamento");
    $sql = "INSERT INTO pessoa (id, nome, endereco, bairro,
    telefone, email, id_cidade)
    VALUES ( '{$pessoa['id']}', '{$pessoa['nome']}',
    '{$pessoa['endereco']}',
    '{$pessoa['bairro']}', '{$pessoa['telefone']}',
    '{$pessoa['email']}', '{$pessoa['id_cidade']}'
    )";
    $result = $conn->query($sql);
    
    return $result;
}
function update_pessoa($pessoa)
{
    $conn = new mysqli("localhost", "root", "", "treinamento");
    $sql = "UPDATE pessoa SET nome = '{$pessoa['nome']}',
    endereco = '{$pessoa['endereco']}',
    bairro = '{$pessoa['bairro']}',
    telefone = '{$pessoa['telefone']}',
    email = '{$pessoa['email']}',
    id_cidade = '{$pessoa['id_cidade']}'
    WHERE id = '{$pessoa['id']}'";
    
    $result = $conn->query($sql);
    
    return $result;
}
