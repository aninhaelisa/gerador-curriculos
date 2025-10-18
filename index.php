<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="assets/cv.png" type="image/x-icon">
</head>

<body>

    <div class="container mt-4">

        <h1 class="text-center mb-4"> Crie Seu Currículo Profissional</h1>
        <form id="formCurriculo" action="gerar_curriculo.php" method="POST" enctype="multipart/form-data">
            <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Personalização do Estilo</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cor_primaria" class="form-label">Cor primária </label>
                                <input type="color" class="form-control form-control-color" id="cor-primaria" name="cor_primaria" value="ff86eb" title="Escolha a cor primária">
                            </div>
                        </div>
                    </div>
            </div>
        </form>

    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>