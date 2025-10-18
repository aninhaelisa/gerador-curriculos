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