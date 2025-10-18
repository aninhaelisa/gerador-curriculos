<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo - <?php echo htmlspecialchars($dados['nome']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="curriculo-container">
    <div class="curriculo-header">
        <div class="row align-items-center">
            <?php if (!empty($dados['foto']) && file_exists($dados['foto'])) { ?>
            <div class="col-md-3 text-center mb-3 mb-md-0">
                <img src="<?php echo htmlspecialchars($dados['foto']); ?>" alt="Foto de <?php echo htmlspecialchars($dados['nome']); ?>" class="foto-perfil rounded-circle">
            </div>
            <div class="col-md-9">
            <?php } else { ?>
            <div class="col-12">
            <?php } ?>
                <h1 class="mb-2"><?php echo htmlspecialchars($dados['nome']); ?></h1>
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Localização:</strong> <?php echo htmlspecialchars($dados['cidade']); ?><?php if (!empty($dados['estado'])) { ?>, <?php echo htmlspecialchars($dados['estado']); ?><?php } ?></p>
                        <p class="mb-1"><strong>Idade:</strong> <?php echo htmlspecialchars($dados['idade']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Telefone:</strong> <?php echo htmlspecialchars($dados['telefone']); ?></p>
                        <p class="mb-0"><strong>E-mail:</strong> <?php echo htmlspecialchars($dados['email']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>