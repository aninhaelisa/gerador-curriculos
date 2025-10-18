<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="shortcut icon" href="assets/cv.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Open+Sans:wght@300;400;600;700&family=Lato:wght@300;400;700&family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

<header class="rh-header">
      <div class="rh-logo">Gerador de Currículo</div>
  
      <nav class="rh-nav" id="rh-nav">
        <ul class="rh-nav-list">
          <li><a href="index.php">Início</a></li>
          <li><a href="pages/ajuda.html">Ajuda</a></li>
          <li><a href="pages/exemplos.html">Exemplos</a></li>
          <li><a href="pages/contato.html">Contato</a></li>
        </ul>
      </nav>
  
      <button class="rh-hamburger" id="rh-hamburger" aria-label="Abrir menu">
        <span class="rh-bar"></span>
        <span class="rh-bar"></span>
        <span class="rh-bar"></span>
      </button>
    </header>

    <div class="container mt-4">

        <h1 class="text-center mb-4" style="color:#fff;"> Crie Seu Currículo Profissional</h1>
        <form id="formCurriculo" action="gerar_curriculo.php" method="POST" enctype="multipart/form-data">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Personalização do Estilo</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cor_primaria" class="form-label">Cor primária </label>
                            <input type="color" class="form-control form-control-color" id="cor_primaria" name="cor_primaria" value="#ff86eb" title="Escolha a cor primária">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fonte_titulos" class="form-label">Fonte dos Títulos</label>
                            <select name="fonte_titulos" id="fonte_titulos" class="form-control">
                                <option value="Roboto">Roboto</option>
                                <option value="Open Sans">Open Sans</option>
                                <option value="Lato">Lato</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Poppins">Poppins</option>
                                <option value="Arial">Arial</option>
                                <option value="Georgia">Georgia</option>
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
                            <select name="estilo_layout" id="estilo_layout" class="form-control">
                                <option value="moderno">Moderno</option>
                                <option value="classico">Clássico</option>
                                <option value="criativo">Criativo</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"> Dados Pessoais</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="foto" class="form-label"> Foto (Opcional)</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            <small class="form-text text-muted">Formatos: JPG, PNG, GIF. Tamanho máximo: 2MB</small>
                            <div id="preview-container" class="mt-2" style="display: none;">
                                <img src="#" alt="Preview da foto" id="foto-preview" class="img-thumbnail" style="max-width: 150px; max-height:150px;">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nome" class="form-label">Nome Completo *</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">E-mail *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefone" class="form-label">Telefone *</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="data_nascimento" class="form-label">Data de Nascimento *</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="idade" class="form-label">Idade</label>
                            <input type="text" class="form-control" id="idade" name="idade" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cidade" class="form-label"> Cidade *</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="sobre" class="form-label">Sobre Você</label>
                        <textarea name="sobre" rows="3" id="sobre" class="form-control"></textarea>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Experiências Profissionais</h5>
                    <button type="button" class="btn btn-sm btn-light" id="addExperiencia">
                        + Adicionar Experiência
                    </button>
                </div>

                <div class="card-body" id="experiencias-container">

                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Formação Acadêmica</h5>
                    <button type="button" class="btn btn-sm btn-light" id="addFormacao">
                        + Adicionar Formação
                    </button>
                </div>
                <div class="card-body" id="formacoes-container">

                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Habilidades</h5>
                    <button type="button" class="btn btn-sm btn-light" id="addHabilidade">
                        + Adicionar Habilidade
                    </button>
                </div>
                <div class="card-body" id="habilidades-container">

                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Referências Pessoais</h5>
                    <button type="button" class="btn btn-sm btn-light" id="addReferencia">
                        + Adicionar Referência
                    </button>
                </div>
                <div class="card-body" id="referencias-container">

                </div>
            </div>

            <div class="text-center mb-4">
            <button type="submit" class="btn btn-success btn-lg">Gerar Currículo</button>
        </div>
        </form>

    </div>


    <script src="js/menu.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>