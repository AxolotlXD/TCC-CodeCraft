<?php 
  require_once '../../bds/bd_config.php'; 
  require_once '../../bds/bd_funcoes.php'; 
  atualizarSessao($pdo); 
  verificarLogin('../../Login.php');

  function aulaDisponivel($numeroAula, $progressoAtual) {
      if ($numeroAula == 1) return true;
      return $progressoAtual >= ($numeroAula - 1);
  }

  $progressoHTML = $_SESSION['usuario_dados']['a_html'] ?? 0;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CodeCraft - HTML5</title>
  <link rel="icon" type="image/x-icon" href="../../pad_items/imagens/favicon.png">
  <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../pad_Items/comps/pad_JS.js"></script>
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../pad_Items/comps/pad_CSS.css">
  <link rel="stylesheet" href="../../pad_Items/comps/aulas_CSS.css">
  <style> .box .percent svg circle:nth-child(2) { stroke: #ff7300; } </style>
</head>
<body>
    <!-- Cabeçalho -->
    <div id="header" class="d-flex align-items-center justify-content-between px-3">
        <div class="btns_header d-flex align-items-center">
            <button class="btn_header btn_transparente" onclick="link(1)"><img class="img_header" src="../../pad_Items/imagens/icones/Casa.png" alt="Início"></button>
        </div>
        <div class="p_header text-center flex-grow-1">
            <p class="mb-0 fs-4 text-center flex-grow-1">HTML5</p>
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
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(1, $progressoHTML) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/html_escudo.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Introdução ao HTML5</p>
              <p class="desc_Aula">A história do marcador de texto mais usado.<br> 
              Aprenda sobre o que é o HTML e sua jornada até o 5.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='html_Aula.php?aula=html1'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(2, $progressoHTML) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 0.8%;">
              <img src="../../pad_Items/imagens/aulas/Tags.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Conceitos Básicos</p>
              <p class="desc_Aula">Os primeiros passos! <br>
              Introdução ao básico do HTML5, além de descobrir o que são as maravilhosas TAGS!</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='html_Aula.php?aula=html2'">
              <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(3, $progressoHTML) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 0.8%;">
              <img src="../../pad_Items/imagens/aulas/Texto.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Formatação dos Textos</p>
              <p class="desc_Aula">Com isto você poderia deixar seu site com um formato magnífico!<br>
            Desvende os mistérios por tras de tags como B, I e P e suas funções.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='html_Aula.php?aula=html3'">
              <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(4, $progressoHTML) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 0.8%;">
              <img src="../../pad_Items/imagens/aulas/Tags.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Body e Head</p>
              <p class="desc_Aula">Um código com cabeça e corpo?<br>
            Compreenda o motivo de um código HTML5 ter Head e Body, e como isso ajuda no desenvolvimento.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='html_Aula.php?aula=html4'">
              <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(5, $progressoHTML) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 0.8%;">
              <img src="../../pad_Items/imagens/aulas/Hashtag.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Links e Imagens</p>
              <p class="desc_Aula">Tal link, tal imagem.<br>
            O que são Links/Imagens e como usá-los.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='html_Aula.php?aula=html5'">
              <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(6, $progressoHTML) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 0.8%;">
              <img src="../../pad_Items/imagens/aulas/Layout.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Listas e Tabelas</p>
              <p class="desc_Aula">Liste as jogadas e tabele comigo.<br>
            Aprenda a fazer lindas listas e tabelas.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='html_Aula.php?aula=html6'">
              <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(7, $progressoHTML) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 0.8%;">
              <img src="../../pad_Items/imagens/aulas/Tecla.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Boas Práticas e Atalhos </p>
              <p class="desc_Aula">Vai um atalho aí?<br>
            Boas Práticas de programação e Combinações de teclas ou simples caracteres para facilitar a sua vida.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='html_Aula.php?aula=html7'">
              <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <div class="aula_divisao"></div> <!-- A Partir daqui é CSS -->

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(8, $progressoHTML) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 0.8%;">
              <img src="../../pad_Items/imagens/aulas/css_escudo.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Introduçao ao CSS</p>
              <p class="desc_Aula">Acrescente mais beleza ao marcador.<br>
            Veja a utilidade do CSS e sua irmandade com o HTML5.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='html_Aula.php?aula=css1'">
              <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(9, $progressoHTML) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 0.8%;">
              <img src="../../pad_Items/imagens/aulas/Hashtag.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Básico do CSS</p>
              <p class="desc_Aula">Criando Conexão...<br>
            Compreenda as funções do CSS e os tipos de conexões que ele proporciona.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='html_Aula.php?aula=css2'">
              <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(10, $progressoHTML) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 0.8%;">
              <img src="../../pad_Items/imagens/aulas/Tags.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">ID e Classes</p>
              <p class="desc_Aula">Id 007, Classe: Espião<br>
            Apresentação à Id e Classes e como esses carinhas são a coisa mais importante do CSS!</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='html_Aula.php?aula=css3'">
              <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(11, $progressoHTML) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 0.8%;">
              <img src="../../pad_Items/imagens/aulas/Texto.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Estilização de Textos e Imagens</p>
              <p class="desc_Aula">Photoshop pra que?<br>
            Descubra como estilizar imagens e textos do seu site.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='html_Aula.php?aula=css4'">
              <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(12, $progressoHTML) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 0.8%;">
              <img src="../../pad_Items/imagens/aulas/Layout.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Layout mais a fundo</p>
              <p class="desc_Aula">Da base até o cume.<br>
            Aprenda a importância de um layout bem planejado e seus fundamentos.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='html_Aula.php?aula=css5'">
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
              <p class="text-center text-wrap fs-5">PROGRESSO DAS AULAS <br> DE HTML5</p>
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
      $progressoHTML = $_SESSION['usuario_dados']['a_html'] ?? 0;
      $totalAulas = 12;
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