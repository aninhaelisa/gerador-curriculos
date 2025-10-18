<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo - <?php echo htmlspecialchars($dados['nome']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    :root {
        --cor-primaria: <?php echo htmlspecialchars($dados['cor_primaria']); ?>;
        --fonte-titulos: '<?php echo htmlspecialchars($dados['fonte_titulos']); ?>', sans-serif;
        --tamanho-fonte: <?php echo htmlspecialchars($dados['tamanho_fonte']); ?>;
    }

    body {
        font-size: var(--tamanho-fonte);
        background-color: #f8f9fa;
    }

    .curriculo-container {
        max-width: 210mm;
        margin: 0 auto;
        padding: 20mm;
        background: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .section-title {
        color: var(--cor-primaria);
        font-family: var(--fonte-titulos);
    }
</style>

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

            <?php if (!empty($dados['sobre'])) { ?>
                <div class="curriculo-section">
                    <h3 class="section-title">Sobre</h3>
                    <p><?php echo nl2br(htmlspecialchars($dados['sobre'])); ?></p>
                </div>
            <?php } ?>

            <?php if (!empty($dados['experiencias'])) { ?>
                <div class="curriculo-section">
                    <h3 class="section-title">Experiência Profissional</h3>
                    <?php foreach ($dados['experiencias'] as $index => $experiencia) { ?>
                        <div class="experiencia-item-curriculo">
                            <h5><?php echo htmlspecialchars($experiencia['cargo']); ?></h5>
                            <h6 class="text-primary"><?php echo htmlspecialchars($experiencia['empresa']); ?></h6>
                            <span class="badge bg-primary"><?php echo $experiencia['inicio']; ?> - <?php echo $experiencia['termino'] ?? 'Atual'; ?></span>
                            <p><?php echo nl2br(htmlspecialchars($experiencia['descricao'])); ?></p>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if (!empty($dados['formacoes'])) { ?>
                <div class="curriculo-section">
                    <h3 class="section-title">Formação Acadêmica</h3>
                    <?php foreach ($dados['formacoes'] as $formacao) { ?>
                        <div class="formacao-item-curriculo">
                            <h5><?php echo htmlspecialchars($formacao['curso']); ?></h5>
                            <h6 class="text-primary"><?php echo htmlspecialchars($formacao['instituicao']); ?></h6>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if (!empty($dados['habilidades'])) { ?>
                <div class="curriculo-section">
                    <h3 class="section-title">Habilidades</h3>
                    <?php foreach ($dados['habilidades'] as $habilidade) { ?>
                        <div><?php echo htmlspecialchars($habilidade['nome']); ?> - <?php echo htmlspecialchars($habilidade['nivel']); ?></div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if (!empty($dados['referencias'])) { ?>
                <div class="curriculo-section">
                    <h3 class="section-title">Referências Pessoais</h3>
                    <?php foreach ($dados['referencias'] as $referencia) { ?>
                        <div><?php echo htmlspecialchars($referencia['nome']); ?> - <?php echo htmlspecialchars($referencia['telefone']); ?></div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if (!empty($dados['informacoes_adicionais'])) { ?>
                <div class="curriculo-section">
                    <h3 class="section-title">Informações Adicionais</h3>
                    <p><?php echo nl2br(htmlspecialchars($dados['informacoes_adicionais'])); ?></p>
                </div>
            <?php } ?>
</div>


        
</body>

</html>