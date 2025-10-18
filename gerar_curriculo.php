<?php
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir,0755, true);
    }

    $fotoPath = '';

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK){
        $allowedTypes = ['image/jpeg','image/png','image/gif'];
        $fileType = $_FILES['foto']['type'];

        if (in_array( $fileType, $allowedTypes)){
            $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $extension;
            $fotoPath = $uploadDir . $filename;

            if (!move_uploaded_file( $_FILES['foto']['tmp_name'],  $fotoPath)){
                $fotoPath = '';
            }
        }
           
    }

    $dados = [
        'foto' => $fotoPath,
        'nome' => filter_var($_POST['nome'], FILTER_SANITIZE_STRING),
        'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
        'telefone' => filter_var($_POST['telefone'], FILTER_SANITIZE_STRING),
        'data_nascimento' => $_POST['data_nascimento'],
        'idade' => filter_var($_POST['idade'], FILTER_SANITIZE_STRING),
        'cidade' => filter_var($_POST['cidade'], FILTER_SANITIZE_STRING),
        'estado' => filter_var($_POST['estado'], FILTER_SANITIZE_STRING),
        'sobre' => filter_var($_POST['sobre'], FILTER_SANITIZE_STRING),
        'cor_primaria' => $_POST['cor_primaria'] ?? '#ff86eb',
        'fonte_titulos' => $_POST['fonte_titulos'] ?? 'Roboto',
        'tamanho_fonte' => $_POST['tamanho_fonte'] ?? '16px',
        'estilo_layout' => $_POST['estilo_layout'] ?? 'moderno',
        'experiencias' => $_POST['experiencias'] ?? [],
        'formacoes' => $_POST['formacoes'] ?? [],
        'habilidades' => $_POST['habilidades'] ?? [],
        'referencias' => $_POST['referencias'] ?? []
    ];

    include 'curriculo_template.php';  
 } else {
    header('Location: index.php');
    exit;
 }

?>
