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
                            <div class="col-md-6 mb-3">
                                <label for="fonte_titulos" class="form-label">Fonte dos Títulos</label>
                                <select name="fonte_titulos" id="fonte_titulos" class="form-control">
                                    <option value="value">Roboto</option>
                                    <option value="value">Open Sans</option>
                                    <option value="value">Lato</option>
                                    <option value="value">Montserrat</option>
                                    <option value="value">Poppins</option>
                                    <option value="value">Arial</option>
                                    <option value="value">Georgia</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tamanho_fonte" class="form-label">Tamanho da Fonte Base</label>
                                <select name="tamanho_fonte" id="tamanho_fonte" class="form-control">
                                    <option value="14px">Pequeno (14px)</option>
                                    <option value="16px" selected>Médio (16px)</option>
                                    <option value="18px">Grande (18px)</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="estilo_layout" class="form-label">Estilo do Layout</label>
                                <select name="estilo_layout" id="estilo_layout" class</select>
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