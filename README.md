#  Gerador de Currículos Profissionais

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![jQuery](https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white)

##  Sobre o Projeto

Sistema web completo para criação e personalização de currículos profissionais. Desenvolvido como projeto acadêmico para a disciplina de **Fundamentos de Programação para Internet** da **UNIPAR EAD**.

O sistema permite que usuários criem currículos personalizáveis com interface intuitiva, design responsivo e opções de download em PDF.

##  Funcionalidades

###  Personalização
- **Cores personalizáveis** - Escolha a cor primária do currículo
- **Múltiplas fontes** - Seleção entre 7 fontes diferentes
- **Layouts variados** - Moderno, Clássico e Criativo
- **Tamanho de fonte** - Pequeno, Médio ou Grande

###  Formulário Dinâmico
- **Dados pessoais** - Nome, contato, localização, foto
- **Experiências profissionais** - Campos dinâmicos com adição ilimitada
- **Formação acadêmica** - Cursos, instituições, níveis
- **Habilidades** - Com sistema de níveis (Iniciante a Especialista)
- **Referências pessoais** - Contatos de referência

###  Funcionalidades Técnicas
- **Cálculo automático de idade** - Baseado na data de nascimento
- **Upload de foto** - Com preview e validação (até 2MB)
- **Campos dinâmicos** - Adicione/remova experiências com um clique
- **Design responsivo** - Funciona em desktop, tablet e mobile
- **Download em PDF** - Geração otimizada para impressão

## 🛠 Tecnologias Utilizadas

### Frontend
- **HTML5** - Estrutura semântica
- **CSS3** - Estilização e responsividade
- **JavaScript** - Interatividade e validações
- **jQuery** - Manipulação DOM e AJAX
- **Bootstrap 5** - Framework CSS e componentes
- **Google Fonts** - Tipografia profissional

### Backend
- **PHP** - Processamento de dados e lógica de negócio
- **Sessions** - Gerenciamento de estado

### Recursos
- **File Upload** - Upload seguro de imagens
- **PDF Generation** - Via window.print() do navegador
- **Responsive Design** - Mobile-first approach

## 📁 Estrutura do Projeto
gerador-curriculos/
├── index.php # Página principal com formulário
├── gerar_curriculo.php # Processamento dos dados
├── curriculo_template.php # Template do currículo
├── pages/ # Páginas auxiliares
│ ├── ajuda.html # Guia de uso e dicas
│ ├── exemplos.html # Modelos de exemplo
│ └── contato.html # Informações de contato
├── css/ # Estilos
│ ├── style.css # Estilos principais
│ ├── menu.css # Estilos do menu
│ └── reset.css # Reset CSS
├── js/ # Scripts JavaScript
│ ├── script.js # Lógica principal
│ └── menu.js # Menu responsivo
├── assets/ # Recursos estáticos
│ └── cv.png # Ícone do site
├── uploads/ # Fotos enviadas pelos usuários
└── README.md # Este arquivo

##  Como Usar

### 1. Acesse o Sistema
- Abra o arquivo `index.php` em seu servidor web

### 2. Preencha os Dados Pessoais
- Informe nome, e-mail, telefone, data de nascimento
- Adicione uma foto profissional (opcional)
- Escreva um resumo sobre você

### 3. Adicione Experiências
- Clique em "+ Adicionar Experiência"
- Preencha empresa, cargo, período e descrição
- Adicione quantas experiências necessárias

### 4. Complete Formação e Habilidades
- Adicione sua formação acadêmica
- Liste suas habilidades com níveis de proficiência
- Inclua referências pessoais (opcional)

### 5. Personalize o Design
- Escolha a cor primária
- Selecione a fonte dos títulos
- Defina o estilo do layout

### 6. Gere e Baixe
- Clique em "Gerar Currículo"
- Visualize o resultado
- Use "Imprimir/Download" para salvar como PDF

##  Dicas de Uso

###  Para a Foto
- Use imagem profissional com fundo neutro
- Formatos: JPG, PNG, GIF (máx. 2MB)
- Tamanho recomendado: 150x150 pixels

###  Para o Conteúdo
- Seja claro e objetivo nas descrições
- Ordene experiências da mais recente para a mais antiga
- Destaque conquistas e resultados

###  Para o Design
- Escolha cores que reflitam sua área profissional
- Mantenha consistência no estilo
- Teste a legibilidade na versão impressa

##  Requisitos do Sistema

### Servidor Web
- PHP 7.4 ou superior
- Servidor Apache (recomendado) ou equivalente
- Permissão de escrita na pasta `uploads/`

### Navegador
- Chrome, Firefox, Safari, Edge (versões recentes)
- JavaScript habilitado
- Suporte a CSS3 e HTML5

##  Desenvolvedora

**Ana Elisa N Correa**
-  **Curso:** Engenharia de Software
-  **Instituição:** UNIPAR EAD
-  **Polo:** Cianorte
-  **Disciplina:** Fundamentos de Programação para Internet

## 📄 Licença

Este projeto foi desenvolvido para fins acadêmicos como parte do curso de Engenharia de Software da UNIPAR EAD.

---

**Desenvolvido com :) por Ana Elisa N Correa para UNIPAR EAD**
