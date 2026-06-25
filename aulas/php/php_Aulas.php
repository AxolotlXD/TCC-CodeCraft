<?php 
  require_once '../../bds/bd_config.php'; 
  require_once '../../bds/bd_funcoes.php'; 
  atualizarSessao($pdo); 
  verificarLogin('../../Login.php');

  function aulaDisponivel($numeroAula, $progressoAtual) {
      if ($numeroAula == 1) return true;
      return $progressoAtual >= ($numeroAula - 1);
  }

  $progressoPHP = $_SESSION['usuario_dados']['a_php'] ?? 0;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CodeCraft - PHP</title>
  <link rel="icon" type="image/x-icon" href="../../pad_items/imagens/favicon.png">
  <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../pad_Items/comps/pad_JS.js"></script>
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../pad_Items/comps/pad_CSS.css">
  <link rel="stylesheet" href="../../pad_Items/comps/aulas_CSS.css">
  <style> .box .percent svg circle:nth-child(2) { stroke: #5642c9ff; } </style>
</head>
<body>
    <!-- Cabeçalho -->
    <div id="header" class="d-flex align-items-center justify-content-between px-3">
        <div class="btns_header d-flex align-items-center">
            <button class="btn_header btn_transparente" onclick="link(1)"><img class="img_header" src="../../pad_Items/imagens/icones/Casa.png" alt="Início"></button>
        </div>
        <div class="p_header text-center flex-grow-1">
            <p class="mb-0 fs-4 text-center flex-grow-1">PHP</p>
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
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(1, $progressoPHP) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/php_escudo.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Introdução ao PHP</p>
              <p class="desc_Aula">PHP? o que isso tem a ver com o elefante? <br>
              Introdução à linguagem e vários dos seus conceitos básicos.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='php_Aula.php?aula=php1'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>
          
          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(2, $progressoPHP) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/hashtag.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Constantes e Tipos de Dados</p>
              <p class="desc_Aula">Plank? Aquele bixin do Bob Esponja?<br>
              Apresentação a jeitos de guardar dados de uma forma sustentavel e organizada.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='php_Aula.php?aula=php2'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(3, $progressoPHP) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/tags.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Operadores e Expressões</p>
              <p class="desc_Aula">Operar e expressar o ódio e o amor por programação!<br>
              Aprenda a manipular valores através de operações. (Com mudanças comparando ao JS!)</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='php_Aula.php?aula=php3'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>
          
          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(4, $progressoPHP) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/tags.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Controle de Fluxo</p>
              <p class="desc_Aula">Fluxo e Reversão...<br>
              Relembrando condições e repetições.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='php_Aula.php?aula=php4'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(5, $progressoPHP) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/Layout.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Formulários e Integração com HTML</p>
              <p class="desc_Aula">Sentiu saúdades da antiguidade?<br>
              Ligando Usuário e Servidor!</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='php_Aula.php?aula=php5'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(6, $progressoPHP) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/Tecla.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Programação Orientada a Objetos (Parte I)</p>
              <p class="desc_Aula">Dá para programar uma cadeira? (SIM!)<br>
              O Início da POO, classes e objetos.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='php_Aula.php?aula=php6'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(7, $progressoPHP) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/Tecla.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Programação Orientada a Objetos (Parte II)</p>
              <p class="desc_Aula">Tá, da para programar uma cadeira, e uma geladeira? (Adivinha... SIM!)<br>
              Aprofundando a POO, polimorfismo, subclasses e hierarquia.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='php_Aula.php?aula=php7'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <div class="aula_divisao"></div> <!-- A Partir daqui é MYSQL -->


          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(8, $progressoPHP) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/sql_escudo.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Introduzindo e Conectando o MySQL ao PHP</p>
              <p class="desc_Aula">Tirei um 20 natural em salvar dados!<br>
              Compreendendo como unir duas linguagens para armazenar informações.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='php_Aula.php?aula=sql1'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(9, $progressoPHP) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/hashtag.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Conceitos Básicos do MySQL e Workbench</p>
              <p class="desc_Aula">Criando um banco feito de dados...<br>
              Como criar um banco de dados e onde fazer isso.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='php_Aula.php?aula=sql2'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(10, $progressoPHP) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/tags.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Tipos de Dados e Alterações no MySQL Workbench</p>
              <p class="desc_Aula">Nunca saia alterando os dados aleatóriamente!<br>
              Aprenda os tipos de dados e como altera-los de forma segura.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='php_Aula.php?aula=sql3'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(11, $progressoPHP) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/hashtag.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Criando e Lendo Dados (CRUD – Parte 1)</p>
              <p class="desc_Aula">Criar e Ler, é tranquilo não?<br>
              Como começar o ciclo de vida dos dados.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='php_Aula.php?aula=sql4'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(12, $progressoPHP) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/hashtag.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Atualizando e Excluindo Dados (CRUD – Parte 2)</p>
              <p class="desc_Aula">Atualizar e Deletar, não é tranquilo não.<br>
              Atualizando e excluindo informações de forma controlada.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='php_Aula.php?aula=sql5'">
                <img src="../../pad_Items/imagens/icones/Play.png" height="100%">
              </button>
            </div>
          </div>

          <!--=====================================-->
          <div class="Aula border-3 rounded-3 <?php echo aulaDisponivel(13, $progressoPHP) ? '' : 'Bloqueada'; ?>">
            <div style="padding: 1%;">
              <img src="../../pad_Items/imagens/aulas/Texto.png" height="100%">
            </div>
            <div class="aula_Textos">
              <p class="titu_Aula">Relações e Boas Práticas no MySQL e Workbench</p>
              <p class="desc_Aula">Uhull Boas Práticas!!, aulinha tranquila.<br>
              Evite falhas e mantenha seus dados seguros e organizados.</p>
            </div>
            <div class="btn_aula">
              <button class="btn_comecar btn_padrao btn btn-dark border-3 rounded-3" 
              onclick="window.location.href='php_Aula.php?aula=sql6'">
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
              <p class="text-center text-wrap fs-5">PROGRESSO DAS AULAS <br> DE PHP</p>
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
      $progressoHTML = $_SESSION['usuario_dados']['a_php'] ?? 0;
      $totalAulas = 13;
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