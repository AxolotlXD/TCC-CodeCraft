<?php 
  require_once '../../bds/bd_config.php'; 
  require_once '../../bds/bd_funcoes.php'; 
  atualizarSessao($pdo); 
  verificarLogin('../../Login.php');

  function aulaDisponivel($numeroAula, $progressoAtual) {
      if ($numeroAula == 1) return true;
      return $progressoAtual >= ($numeroAula - 1);
  }

  $progressoJS = $_SESSION['usuario_dados']['a_js'] ?? 0;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CodeCraft - JavaScript</title>
  <link rel="icon" type="image/x-icon" href="../../pad_items/imagens/favicon.png">
  <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../pad_Items/comps/pad_JS.js"></script>
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../pad_Items/comps/pad_CSS.css">
  <link rel="stylesheet" href="../../pad_Items/comps/aulas_CSS.css">
  <style> .box .percent svg circle:nth-child(2) { stroke: #F6DE19; } </style>
</head>
<body>
    <!-- Cabeçalho -->
    <div id="header" class="d-flex align-items-center justify-content-between px-3">
        <div class="btns_header d-flex align-items-center">
            <button class="btn_header btn_transparente" onclick="link(1)"><img class="img_header" src="../../pad_Items/imagens/icones/Casa.png" alt="Início"></button>
        </div>
        <div class="p_header text-center flex-grow-1">
            <p class="mb-0 fs-4 text-center flex-grow-1">JavaScript</p>
        </div>
        <div class="btns_header d-flex align-items-center">
            <button class="btn_header btn_transparente" onclick="logout()"><img class="img_header" src="../../pad_Items/imagens/icones/Logout.png" alt="Logout"></button>
            <button style="margin-left: 1%;" class="btn_header btn_transparente" onclick="link(2)"><img class="img_header perfil_imagem" src="<?php echo obterFotoPerfil(null, '../../'); ?>" alt="Foto Perfil"></button>
        </div>
    </div>
    <!-- Container principal -->
    <div class="main container-sm">
      <div class="lyt_Aulas">
        <div class="info_Aulas border-3 rounded-2">

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(1, $progressoJS) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/js_escudo.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Introdução e História do JS</p>
              <p class="desc_Aula">Os Primeiros Passos do JS<br>
              Aprenderemos um pouco sobre a história do JavaScript. </p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='js_Aula.php?aula=js1'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(2, $progressoJS) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/Texto.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">O Básico Sobre</p>
              <p class="desc_Aula">O básico vem primeiro.<br>
              Dá um norte sobre o JavaScript, uma apresentação aos seus conteúdos.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='js_Aula.php?aula=js2'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(3, $progressoJS) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/hashtag.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Tipos Primitivos</p>
              <p class="desc_Aula">Não voltamos pra idade da pedra, são só os Tipos Primitivos!<br>
              Apresenta e desenvolve o conceito dos Tipos Primitivos. </p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='js_Aula.php?aula=js3'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(4, $progressoJS) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/tags.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">O que são Variáveis</p>
              <p class="desc_Aula">Às vez varia, às veiz não<br>
              Discorre sobre um assunto essencial: As Variáveis.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='js_Aula.php?aula=js4'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(5, $progressoJS) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/Layout.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Vetores e Posições (Parte 1)</p>
              <p class="desc_Aula">Um assunto sério hein, posicione-se!<br>
              O conteúdo passado será focado nas variáveis especiais: Vetores</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='js_Aula.php?aula=js5'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(6, $progressoJS) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/Layout.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Vetores e Posições (Parte 2)</p>
              <p class="desc_Aula">O Assunto ainda não acabou, nada de dormir!<br>
              Continuação da parte um, só que com coisinhas mais complexas!</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='js_Aula.php?aula=js6'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(7, $progressoJS) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/tags.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Operadores</p>
              <p class="desc_Aula">Operação Ensino JS indo bem capitão!<br>
              Introduz e desenvolve os Operadores.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='js_Aula.php?aula=js7'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(8, $progressoJS) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/tags.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Condições</p>
              <p class="desc_Aula">Todo contrato tem sua condição.<br>
              Explica o que são as condições, sua função e lógica.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='js_Aula.php?aula=js8'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(9, $progressoJS) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/hashtag.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Repetição</p>
              <p class="desc_Aula">Muito Repetitivo, mas não tanto quanto paralelepípedo!<br>
              Explica estruturas de repetição, sem criar loops infinitos!</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='js_Aula.php?aula=js9'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>
        </div>
        <div class="info_Progresso border-3 rounded-4">
            <div class="box">
              <div class="percent">
                <svg viewBox="0 0 160 160" preserveAspectRatio="xMidYMid meet">
                    <circle cx="80" cy="80" r="70"></circle>
                    <circle cx="80" cy="80" r="70"></circle>
                </svg>
                <div class="number">
                  <h2 id="valor-progresso">0%</h2>
                </div>
              </div>
              <p class="text-center text-wrap fs-5">PROGRESSO DAS AULAS <br> DE JAVASCRIPT</p>
            </div>
            <div class="info_desc"> 
            </div>
        </div>
      </div>
    </div>
<script>
  // Função para calcular o progresso total
  function calcularProgressoTotal() {
      <?php
      $progressoJS = $_SESSION['usuario_dados']['a_js'] ?? 0;
      $totalAulas = 9;
      $progressoPercent = min(($progressoJS / $totalAulas) * 100, 100);
      ?>
      
      const progresso = <?php echo $progressoPercent; ?>;
      
      document.getElementById('valor-progresso').textContent = `${Math.round(progresso)}%`;

      const circle = document.querySelector('.percent svg circle:nth-child(2)');
      if (circle) {
          const radius = circle.r.baseVal.value;
          const circumference = 2 * Math.PI * radius;
          const offset = circumference - (progresso / 100) * circumference;
          circle.style.strokeDasharray = `${circumference} ${circumference}`;
          circle.style.strokeDashoffset = offset;
      }
  }
  document.addEventListener('DOMContentLoaded', function() {
      calcularProgressoTotal();
  });

  //Função para alterar o progresso no sistema
  function alterarProgresso(progresso) {
      let valorProgresso = parseInt(localStorage.getItem('progresso_visual') || '0');
      valorProgresso += progresso;
      if (valorProgresso < 0) valorProgresso = 0;
      if (valorProgresso > 100) valorProgresso = 100;

      localStorage.setItem('progresso_visual', valorProgresso);
      document.getElementById('valor-progresso').textContent = `${valorProgresso}%`;
  }
</script>
</body>
</html>