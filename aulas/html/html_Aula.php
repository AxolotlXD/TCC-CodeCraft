<?php require_once '../../bds/bd_config.php'; require_once '../../bds/bd_funcoes.php'; atualizarSessao($pdo); verificarLogin('../../Login.php') ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML5 - Aula</title>
    <link rel="icon" type="image/x-icon" href="../../pad_items/imagens/favicon.png">
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../pad_Items/comps/pad_JS.js"></script>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../pad_Items/comps/pad_CSS.css">
    <link rel="stylesheet" href="../../pad_Items/comps/aula.css">
    <style>
        .cxa.selecionada{ border-color: #ff7300; }
        .btn_x{ background-color: #ff7300; }
        .custom-progress { background-color: #ff7300; }
        .qeat_cxa.selecionada{ border-color: #ff7300; }
        .form-check-input:checked{ background-color: #ff7300; border-color: #ff7300; }
        .progress{width: 95%;}
    </style>
</head>
<body>
    <!-- Cabeçalho -->
    <div id="header" class="container-fluid" style="display: flex; flex-direction: row; justify-content: center; align-items: center; gap: 10px;">
        <div class="div_x"> <button class="btn_x" onclick="link(3)">X</button></div>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar custom-progress" style="width: var(--progresso)"></div>
        </div>
    </div>
        <!-- Container principal -->
        <div id="app" class="main container">
            
        </div>
<input type="hidden" id="usuario_apelido" value="<?php echo $_SESSION['usuario_apelido'] ?? 'ESTUDANTE'; ?>">;
<script src="../../pad_Items/comps/dadosAulas.js"></script>
<script src="../../pad_Items/comps/sistemaAulas.js"></script>
<script>
    // Event listener para captar qual aula o usuário tá fazendo
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        let aulaParam = urlParams.get('aula');

        const aulasValidas = [
            'html1', 'html2', 'html3', 'html4', 'html5', 'html6', 'html7', 
            'css1', 'css2', 'css3', 'css4', 'css5', 'teste'
        ];

        if (!aulasValidas.includes(aulaParam)) {
            aulaParam = 'html1';
        }
        
        carregarAula(aulaParam);
    });
</script>
</body>
</html>