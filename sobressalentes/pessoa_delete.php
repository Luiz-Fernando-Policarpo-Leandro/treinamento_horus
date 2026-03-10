<?php
$dados = $_GET;
if (!empty($dados['id'])) {


    $conn = new mysqli("localhost", "root", "", "treinamento");
    $sql = "DELETE FROM pessoa WHERE id = '{$dados['id']}'";
    $result = $conn->query($sql);


    if ($result) {
        header("Location: /pessoa_list.php");
    } else {
        header("Location: /pessoa_form.php");
    }

    exit();
}
