<?php

header('Content-Type: application/json');

require_once __DIR__ . '/../classes/Cidade.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

$id_estado = filter_input(INPUT_POST, 'id_estado', FILTER_VALIDATE_INT);

if (!$id_estado) {
    echo json_encode([]);
    exit;
}

$cidades = Cidade::all_cidades($id_estado);

echo json_encode($cidades);