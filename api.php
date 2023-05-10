<?php
    $data = array
    (
        "message" => "Hola desde la API"
    );
    
    header('Content-Type: application/json');
    echo json_encode($data);
?>