<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo - <?php echo htmlspecialchars($dados['nome']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Open+Sans:wght@300;400;600;700&family=Lato:wght@300;400;700&family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 210mm;
            margin: 0 auto;
            background: white;
            padding: 20mm;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            min-height: 297mm;
            position: relative;
        }

        .curriculo-header h1,
        .section-title {
            font-family: var(--fonte-titulos);
            color: var(--cor-primaria);
        }

        .curriculo-header {
            border-bottom: 3px solid var(--cor-primaria);
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
        }

        .section-title {
            border-bottom: 2px solid var(--cor-primaria);
            font-weight: 600;
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
        }

        /* Estilos para layout classico */
        <?php if ($dados['estilo_layout'] == 'classico') { ?>
        .curriculo-container {
            border: 1px solid #dee2e6;
        }
        .section-title {
            background-color: #f8f9fa;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem 0.375rem 0 0;
        }
        <?php } ?>

        /* Estilos para layout criativo */
        <?php if ($dados['estilo_layout'] == 'criativo') { ?>
        .curriculo-header {
            background: linear-gradient(135deg, var(--cor-primaria), #6c757d);
            color: white;
            padding: 2rem;
            border-radius: 0.5rem 0.5rem 0 0;
            margin-bottom: 2rem;
        }
        .curriculo-header h1,
        .curriculo-header p {
            color: white;
        }
        .section-title {
            background-color: var(--cor-primaria);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            border: none;
        }
        <?php } ?>

        .foto-perfil {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 3px solid var(--cor-primaria);
        }

        .curriculo-section {
            margin-bottom: 1.5rem;
            page-break-inside: avoid;
        }

        .experiencia-item-curriculo, 
        .formacao-item-curriculo {
            margin-bottom: 1rem;
            page-break-inside: avoid;
        }

        .text-primary {
            color: var(--cor-primaria) !important;
        }
        
        .bg-primary {
            background-color: var(--cor-primaria) !important;
        }

        .badge-custom {
            font-size: 0.75em;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .curriculo-container {
                padding: 10mm;
                margin: 10px;
            }
            
            .curriculo-header .row {
                text-align: center;
            }
            
            .foto-perfil {
                margin-bottom: 1rem;
            }
        }

        @media print {
            .curriculo-header {
                break-inside: avoid;
                page-break-inside: avoid;
            }
            .curriculo-section {
                break-inside: avoid;
                page-break-inside: avoid;
            }


        }
    </style>
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
                            <p class="mb-1">
                                <strong>Localização:</strong> 
                                <?php echo htmlspecialchars($dados['cidade']); ?>
                                <?php if (!empty($dados['estado'])) { ?>, <?php echo htmlspecialchars($dados['estado']); ?><?php } ?>
                            </p>
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
        <div class="curriculo-section mt-4">
            <h3 class="section-title">Sobre</h3>
            <p class="mb-0" style="text-align: justify; line-height: 1.6;"><?php echo nl2br(htmlspecialchars($dados['sobre'])); ?></p>
        </div>
        <?php } ?>

        <?php if (!empty($dados['experiencias'])) { ?>
        <div class="curriculo-section">
            <h3 class="section-title">Experiência Profissional</h3>
            <?php foreach ($dados['experiencias'] as $index => $experiencia) { ?>
                <div class="experiencia-item-curriculo mb-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="flex-grow-1">
                            <h5 class="mb-1 fw-bold"><?php echo htmlspecialchars($experiencia['cargo']); ?></h5>
                            <h6 class="text-primary mb-1"><?php echo htmlspecialchars($experiencia['empresa']); ?></h6>
                        </div>
                        <span class="badge bg-primary badge-custom ms-2">
                            <?php 
                            $meses = [
                                '01' => 'Jan', '02' => 'Fev', '03' => 'Mar', '04' => 'Abr',
                                '05' => 'Mai', '06' => 'Jun', '07' => 'Jul', '08' => 'Ago',
                                '09' => 'Set', '10' => 'Out', '11' => 'Nov', '12' => 'Dez'
                            ];
                            
                            $inicio = explode('-', $experiencia['inicio']);
                            $periodo = $meses[$inicio[1]] . ' ' . $inicio[0];
                            
                            if (!empty($experiencia['termino'])) {
                                $termino = explode('-', $experiencia['termino']);
                                $periodo .= ' - ' . $meses[$termino[1]] . ' ' . $termino[0];
                            } else {
                                $periodo .= ' - Atual';
                            }
                            echo $periodo;
                            ?>
                        </span>
                    </div>
                    <?php if (!empty($experiencia['descricao'])) { ?>
                        <p class="mb-0" style="text-align: justify;"><?php echo nl2br(htmlspecialchars($experiencia['descricao'])); ?></p>
                    <?php } ?>
                </div>
                <?php if ($index < count($dados['experiencias']) - 1) { ?>
                    <hr class="my-3">
                <?php } ?>
            <?php } ?>
        </div>
        <?php } ?>


        <?php if (!empty($dados['formacoes'])) { ?>
        <div class="curriculo-section">
            <h3 class="section-title">Formação Acadêmica</h3>
            <?php foreach ($dados['formacoes'] as $index => $formacao) { ?>
                <div class="formacao-item-curriculo mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-1">
                        <div class="flex-grow-1">
                            <h5 class="mb-1 fw-bold"><?php echo htmlspecialchars($formacao['curso']); ?></h5>
                            <h6 class="text-primary mb-1"><?php echo htmlspecialchars($formacao['instituicao']); ?></h6>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-secondary badge-custom"><?php echo htmlspecialchars($formacao['nivel']); ?></span>
                            <span class="badge bg-light text-dark badge-custom"><?php echo htmlspecialchars($formacao['situacao']); ?></span>
                        </div>
                    </div>
                </div>
                <?php if ($index < count($dados['formacoes']) - 1) { ?>
                    <hr class="my-2">
                <?php } ?>
            <?php } ?>
        </div>
        <?php } ?>

        <?php if (!empty($dados['habilidades'])) { ?>
        <div class="curriculo-section">
            <h3 class="section-title">Habilidades</h3>
            <div class="row">
                <?php foreach ($dados['habilidades'] as $habilidade) { ?>
                    <div class="col-lg-6 mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-medium"><?php echo htmlspecialchars($habilidade['nome']); ?></span>
                            <span class="badge 
                                <?php 
                                switch($habilidade['nivel']) {
                                    case 'Iniciante': echo 'bg-secondary'; break;
                                    case 'Intermediário': echo 'bg-info'; break;
                                    case 'Avançado': echo 'bg-primary'; break;
                                    case 'Especialista': echo 'bg-success'; break;
                                    default: echo 'bg-secondary';
                                }
                                ?> badge-custom">
                                <?php echo htmlspecialchars($habilidade['nivel']); ?>
                            </span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>

        <?php if (!empty($dados['referencias'])) { ?>
        <div class="curriculo-section">
            <h3 class="section-title">Referências Pessoais</h3>
            <div class="row">
                <?php foreach ($dados['referencias'] as $referencia) { ?>
                    <div class="col-lg-6 mb-3">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="card-title fw-bold mb-2"><?php echo htmlspecialchars($referencia['nome']); ?></h6>
                                <p class="card-text mb-1">
                                    <i class="bi bi-telephone"></i>
                                    <small class="text-muted"><?php echo htmlspecialchars($referencia['telefone']); ?></small>
                                </p>
                                <p class="card-text mb-0">
                                    <small><em><?php echo htmlspecialchars($referencia['relacao']); ?></em></small>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>

        <?php if (!empty($dados['informacoes_adicionais'])) { ?>
        <div class="curriculo-section">
            <h3 class="section-title">Informações Adicionais</h3>
            <p class="mb-0" style="text-align: justify;"><?php echo nl2br(htmlspecialchars($dados['informacoes_adicionais'])); ?></p>
        </div>
        <?php } ?>
    </div>

    <div class="text-center mt-4 no-print">
        <button class="btn btn-primary me-2" onclick="imprimirCurriculo()">
            <i class="bi bi-printer"></i> Imprimir/Download
        </button>
        <button class="btn btn-success me-2" onclick="salvarComoPDF()">
            <i class="bi bi-file-earmark-pdf"></i> Salvar como PDF
        </button>
        <a href="index.php" class="btn btn-secondary">
            <i class="bi bi-plus-circle"></i> Criar Novo Currículo
        </a>

        <div id="aviso-mobile" class="alert alert-info mt-3" style="display: none;">
            <strong>Dica:</strong> No celular, toque em "Compartilhar" e depois "Imprimir" para salvar como PDF.
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css';
            document.head.appendChild(link);
            
            detectarMobile();
        });

        function imprimirCurriculo() {
         
            setTimeout(function() {
            
                const iframe = document.createElement('iframe');
                iframe.style.display = 'none';
                document.body.appendChild(iframe);
                
                const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
                
                const curriculoContent = document.querySelector('.curriculo-container').cloneNode(true);
         
                iframeDoc.open();
                iframeDoc.write(`
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <title>Currículo - <?php echo htmlspecialchars($dados['nome']); ?></title>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Open+Sans:wght@300;400;600;700&family=Lato:wght@300;400;700&family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
                        <style>
                            body { 
                                margin: 0 !important; 
                                padding: 15mm !important;
                                background: white !important;
                                font-size: 12pt;
                                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                            }
                            
                            :root {
                                --cor-primaria: <?php echo htmlspecialchars($dados['cor_primaria']); ?>;
                                --fonte-titulos: '<?php echo htmlspecialchars($dados['fonte_titulos']); ?>', sans-serif;
                            }
                            
                            .curriculo-container {
                                box-shadow: none !important;
                                margin: 0 !important;
                                padding: 0 !important;
                                min-height: auto !important;
                                max-width: 100% !important;
                                background: white !important;
                            }
                            
                            .curriculo-header h1,
                            .section-title {
                                font-family: var(--fonte-titulos);
                                color: var(--cor-primaria);
                            }

                            .curriculo-header {
                                border-bottom: 3px solid var(--cor-primaria);
                                padding-bottom: 1rem;
                                margin-bottom: 1.5rem;
                            }

                            .section-title {
                                border-bottom: 2px solid var(--cor-primaria);
                                font-weight: 600;
                                padding-bottom: 0.5rem;
                                margin-bottom: 1rem;
                            }
                            
                            <?php if ($dados['estilo_layout'] == 'classico') { ?>
                            .curriculo-container {
                                border: 1px solid #dee2e6;
                            }
                            .section-title {
                                background-color: #f8f9fa;
                                padding: 0.5rem 1rem;
                                border-radius: 0.375rem 0.375rem 0 0;
                            }
                            <?php } ?>
                            
                            <?php if ($dados['estilo_layout'] == 'criativo') { ?>
                            .curriculo-header {
                                background: var(--cor-primaria) !important;
                                color: white;
                                padding: 2rem;
                                border-radius: 0.5rem 0.5rem 0 0;
                                margin-bottom: 2rem;
                            }
                            .curriculo-header h1,
                            .curriculo-header p {
                                color: white;
                            }
                            .section-title {
                                background-color: var(--cor-primaria);
                                color: white;
                                padding: 0.5rem 1rem;
                                border-radius: 0.375rem;
                                border: none;
                            }
                            <?php } ?>
                            
                            .foto-perfil {
                                width: 120px;
                                height: 120px;
                                object-fit: cover;
                                border: 3px solid var(--cor-primaria);
                            }
                            
                            .text-primary {
                                color: var(--cor-primaria) !important;
                            }
                            
                            .bg-primary {
                                background-color: var(--cor-primaria) !important;
                                color: white !important;
                            }
                            
                            .no-print { 
                                display: none !important; 
                            }
                            
                            /* Garantir que cores sejam impressas */
                            * {
                                -webkit-print-color-adjust: exact !important;
                                color-adjust: exact !important;
                                print-color-adjust: exact !important;
                            }
                        </style>
                    </head>
                    <body>
                `);
                iframeDoc.body.appendChild(curriculoContent);
                iframeDoc.write('</body></html>');
                iframeDoc.close();
 
                iframe.onload = function() {
        
                    iframe.contentWindow.focus();
                    iframe.contentWindow.print();
         
                    setTimeout(function() {
                        document.body.removeChild(iframe);
                    }, 1000);
                };
                
            }, 500);
        }

        function salvarComoPDF() {
            if (confirm('Para salvar como PDF, use a opção "Salvar como PDF" na janela de impressão do seu navegador.')) {
                imprimirCurriculo();
            }
        }

    
        function detectarMobile() {
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
       
                document.getElementById('aviso-mobile').style.display = 'block';
            }
        }
    </script>
</body>
</html>