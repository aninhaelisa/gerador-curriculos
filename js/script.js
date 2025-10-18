$(document).ready(function() {

    $('#foto').on('change', function() {
        const file = this.files[0];
        if (file) {
            if (file.size > 2 * 1024 * 1024) {
                alert('A imagem deve ter no máximo 2MB');
                $(this).val('');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                $('#foto-preview').attr('src', e.target.result);
                $('#preview-container').show();
            }
            reader.readAsDataURL(file);
        } else {
            $('#preview-container').hide();
        }
    });


    $('#data_nascimento').on('change', function() {
        const dataNascimento = new Date($(this).val());
        const hoje = new Date();
        let idade = hoje.getFullYear() - dataNascimento.getFullYear();
        const mes = hoje.getMonth() - dataNascimento.getMonth();
        
        if (mes < 0 || (mes === 0 && hoje.getDate() < dataNascimento.getDate())) {
            idade--;
        }
        
        $('#idade').val(idade + ' anos');
    });


    let experienciaCount = 0;
    let formacaoCount = 0;
    let habilidadeCount = 0;
    let referenciaCount = 0;


    $('#addExperiencia').on('click', function() {
        experienciaCount++;
        const experienciaHtml = `
            <div class="experiencia-item" id="experiencia-${experienciaCount}">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Empresa</label>
                        <input type="text" class="form-control" name="experiencias[${experienciaCount}][empresa]" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Cargo</label>
                        <input type="text" class="form-control" name="experiencias[${experienciaCount}][cargo]" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Data de Início</label>
                        <input type="month" class="form-control" name="experiencias[${experienciaCount}][inicio]" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Data de Término</label>
                        <input type="month" class="form-control" name="experiencias[${experienciaCount}][termino]">
                        <small class="form-text text-muted">Deixe em branco se for o emprego atual</small>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descrição das Atividades</label>
                    <textarea class="form-control" name="experiencias[${experienciaCount}][descricao]" rows="3"></textarea>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-btn" onclick="removerExperiencia(${experienciaCount})">Remover</button>
            </div>
        `;
        $('#experiencias-container').append(experienciaHtml);
    });

    $('#addFormacao').on('click', function() {
        formacaoCount++;
        const formacaoHtml = `
            <div class="formacao-item" id="formacao-${formacaoCount}">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Instituição</label>
                        <input type="text" class="form-control" name="formacoes[${formacaoCount}][instituicao]" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Curso</label>
                        <input type="text" class="form-control" name="formacoes[${formacaoCount}][curso]" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nível</label>
                        <select class="form-control" name="formacoes[${formacaoCount}][nivel]" required>
                            <option value="">Selecione</option>
                            <option value="Ensino Médio">Ensino Médio</option>
                            <option value="Técnico">Técnico</option>
                            <option value="Graduação">Graduação</option>
                            <option value="Pós-Graduação">Pós-Graduação</option>
                            <option value="Mestrado">Mestrado</option>
                            <option value="Doutorado">Doutorado</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Situação</label>
                        <select class="form-control" name="formacoes[${formacaoCount}][situacao]" required>
                            <option value="">Selecione</option>
                            <option value="Cursando">Cursando</option>
                            <option value="Concluído">Concluído</option>
                            <option value="Trancado">Trancado</option>
                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-btn" onclick="removerFormacao(${formacaoCount})">Remover</button>
            </div>
        `;
        $('#formacoes-container').append(formacaoHtml);
    });

    $('#addHabilidade').on('click', function() {
        habilidadeCount++;
        const habilidadeHtml = `
            <div class="habilidade-item" id="habilidade-${habilidadeCount}">
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Habilidade</label>
                        <input type="text" class="form-control" name="habilidades[${habilidadeCount}][nome]" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Nível</label>
                        <select class="form-control" name="habilidades[${habilidadeCount}][nivel]" required>
                            <option value="">Selecione</option>
                            <option value="Iniciante">Iniciante</option>
                            <option value="Intermediário">Intermediário</option>
                            <option value="Avançado">Avançado</option>
                            <option value="Especialista">Especialista</option>
                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-btn" onclick="removerHabilidade(${habilidadeCount})">Remover</button>
            </div>
        `;
        $('#habilidades-container').append(habilidadeHtml);
    });

    $('#addReferencia').on('click', function() {
        referenciaCount++;
        const referenciaHtml = `
            <div class="referencia-item" id="referencia-${referenciaCount}">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="referencias[${referenciaCount}][nome]" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Telefone</label>
                        <input type="tel" class="form-control" name="referencias[${referenciaCount}][telefone]" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Relação</label>
                    <input type="text" class="form-control" name="referencias[${referenciaCount}][relacao]" required>
                    <small class="form-text text-muted">Ex: Colega de trabalho, Professor, etc.</small>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-btn" onclick="removerReferencia(${referenciaCount})">Remover</button>
            </div>
        `;
        $('#referencias-container').append(referenciaHtml);
    });
});


function removerExperiencia(id) {
    $(`#experiencia-${id}`).remove();
}

function removerFormacao(id) {
    $(`#formacao-${id}`).remove();
}

function removerHabilidade(id) {
    $(`#habilidade-${id}`).remove();
}

function removerReferencia(id) {
    $(`#referencia-${id}`).remove();
}