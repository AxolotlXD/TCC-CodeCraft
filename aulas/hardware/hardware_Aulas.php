<?php 
  require_once '../../bds/bd_config.php'; 
  require_once '../../bds/bd_funcoes.php'; 
  atualizarSessao($pdo); 
  verificarLogin('../../Login.php');

  function aulaDisponivel($numeroAula, $progressoAtual) {
      if ($numeroAula == 1) return true;
      return $progressoAtual >= ($numeroAula - 1);
  }

  $progressoHardware = $_SESSION['usuario_dados']['a_hardware'] ?? 0;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CodeCraft - Hardware</title>
  <link rel="icon" type="image/x-icon" href="../../pad_items/imagens/favicon.png">
  <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../pad_Items/comps/pad_JS.js"></script>
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../pad_Items/comps/pad_CSS.css">
  <link rel="stylesheet" href="../../pad_Items/comps/aulas_CSS.css">
  <style> .box .percent svg circle:nth-child(2) { stroke: #838693ff ; } </style>
</head>
<body>
    <!-- Cabeçalho -->
    <div id="header" class="d-flex align-items-center justify-content-between px-3">
        <div class="btns_header d-flex align-items-center">
            <button class="btn_header btn_transparente" onclick="link(1)"><img class="img_header" src="../../pad_Items/imagens/icones/Casa.png" alt="Início"></button>
        </div>
        <div class="p_header text-center flex-grow-1">
            <p class="mb-0 fs-4 text-center flex-grow-1">HARDWARE</p>
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
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(1, $progressoHardware) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/hardware_escudo.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Introdução ao Hardware e Analise de Requisitos</p>
              <p class="desc_Aula">O que é uma RAM? (Não é o "Sapo".)<br>
              Um norte sobre os requisitos de um sistema.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='hardware_Aula.php?aula=hardware1'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(2, $progressoHardware) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/RAM.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Componentes I: CPU, Fonte e Placa-Mãe</p>
              <p class="desc_Aula">Energia, controle e processamento!<br>
              Uma aula focada em componentes importantes.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='hardware_Aula.php?aula=hardware2'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(3, $progressoHardware) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/RAM.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Componentes II: Memória, HDD e SSD</p>
              <p class="desc_Aula">Rapidez e armazenamento lado a lado!<br>
              Uma conclusão para aula de componentes.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='hardware_Aula.php?aula=hardware3'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(4, $progressoHardware) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/Monitor.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Periféricos e Gabinetes</p>
              <p class="desc_Aula">A forma e o controle do computador!<br>
              Um pouco sobre periféricos e importância dos gabinetes.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='hardware_Aula.php?aula=hardware4'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(5, $progressoHardware) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/Software.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Softwares e Preparação para Windows</p>
              <p class="desc_Aula">Do físico ao digital: dando vida ao hardware!<br>
              A preparação para o uso de um computador.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='hardware_Aula.php?aula=hardware5'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(6, $progressoHardware) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/Ferramentas.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Montando um Computador (Parte I)</p>
              <p class="desc_Aula">Do planejamento à montagem física: mãos à obra!<br>
              O Início da montagem, começando pelo planejamento.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='hardware_Aula.php?aula=hardware6'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(7, $progressoHardware) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/Ferramentas.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Montando um Computador (Parte II)</p>
              <p class="desc_Aula">Conexões, testes e o primeiro funcionamento!<br>
              Concluindo as aulas, a montagem de um computador.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='hardware_Aula.php?aula=hardware7'">
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
              <p class="text-center text-wrap fs-5">PROGRESSO DAS AULAS <br> DE HARDWARE</p>
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
      $progressoHTML = $_SESSION['usuario_dados']['a_hardware'] ?? 0;
      $totalAulas = 7;
      $progressoPercent = min(($progressoHTML / $totalAulas) * 100, 100);
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