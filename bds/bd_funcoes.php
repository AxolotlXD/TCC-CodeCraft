<?php 
    require_once 'bd_config.php';

    // If para inicar a sessão caso não estiver iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    // If para verificar aulas já registradas e atualizar o sistema
    if (isset($_POST['h_aula'], $_POST['h_pontos'])) {
        
        $aula = $_POST['h_aula'];
        $pontos = (int)$_POST['h_pontos'];
        
        error_log("PROCESSANDO AULA: $aula, Pontos: $pontos");

        $modulo = determinarModulo($aula);
        $campoModulo = 'a_' . $modulo;

        $aulaJaRegistrada = verificarAulaRegistrada($pdo, $aula);
        
        if ($aulaJaRegistrada) {
            error_log("AULA JA REGISTRADA: $aula - Somando apenas pontos");
            atualizarApenasPontos($pdo, $pontos);
        } else {
            error_log("AULA NOVA: $aula - Incrementando modulo e pontos");
            $sucesso = atualizarProgressoEPontos($pdo, $modulo, $pontos, $aula);
        }

        if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
            header("Location: ../html_Aulas.php");
        }
        
        exit;
    }
    // Função para verificar se a aula já foi registrada
    function verificarAulaRegistrada($pdo, $aula) {
        if (!isset($_SESSION['usuario_id'])) {
            return false;
        }

        try {

            $verificarColuna = $pdo->prepare("SHOW COLUMNS FROM u LIKE 'aulas_completas'");
            $verificarColuna->execute();
            
            if ($verificarColuna->rowCount() == 0) {

                $pdo->exec("ALTER TABLE u ADD aulas_completas TEXT NULL");
                return false;
            }

            $stmt = $pdo->prepare("SELECT aulas_completas FROM u WHERE id = ?");
            $stmt->execute([$_SESSION['usuario_id']]);
            $aulasCompletas = $stmt->fetchColumn();

            if (!empty($aulasCompletas)) {
                $aulasArray = explode(',', $aulasCompletas);
                return in_array($aula, $aulasArray);
            }
            
            return false;
            
        } catch (PDOException $e) {
            error_log("Erro ao verificar aula registrada: " . $e->getMessage());
            return false;
        }
    }
    // Função para atualizar o progresso do usuário e pontos
    function atualizarProgressoEPontos($pdo, $modulo, $pontos, $aula) {
        if (!isset($_SESSION['usuario_id'])) {
            error_log("ERRO: Usuario nao logado");
            return false;
        }

        try {
            $campoModulo = 'a_' . $modulo;

            $stmt = $pdo->prepare("SELECT aulas_completas FROM u WHERE id = ?");
            $stmt->execute([$_SESSION['usuario_id']]);
            $aulasCompletasAtual = $stmt->fetchColumn();

            $aulasArray = [];
            if (!empty($aulasCompletasAtual)) {
                $aulasArray = explode(',', $aulasCompletasAtual);
            }

            if (!in_array($aula, $aulasArray)) {
                $aulasArray[] = $aula;
            }
            
            $novasAulasCompletas = implode(',', $aulasArray);

            $sql = "UPDATE u SET $campoModulo = $campoModulo + 1, pontos = pontos + ?, aulas_completas = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$pontos, $novasAulasCompletas, $_SESSION['usuario_id']]);

            $stmt = $pdo->prepare("SELECT $campoModulo, pontos FROM u WHERE id = ?");
            $stmt->execute([$_SESSION['usuario_id']]);
            $dados = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $_SESSION['usuario_dados'][$campoModulo] = $dados[$campoModulo];
            $_SESSION['usuario_dados']['pontos'] = $dados['pontos'];
            
            error_log("NOVA AULA REGISTRADA: $campoModulo = {$dados[$campoModulo]}, Pontos = {$dados['pontos']}");
            return true;

        } catch (PDOException $e) {
            error_log("Erro ao atualizar: " . $e->getMessage());
            return false;
        }
    }
    // Função para atualizar apenas os pontos
    function atualizarApenasPontos($pdo, $pontos) {
        if (!isset($_SESSION['usuario_id'])) {
            error_log("ERRO: Usuario nao logado");
            return false;
        }

        try {
            $sql = "UPDATE u SET pontos = pontos + ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$pontos, $_SESSION['usuario_id']]);

            $stmt = $pdo->prepare("SELECT pontos FROM u WHERE id = ?");
            $stmt->execute([$_SESSION['usuario_id']]);
            $novosPontos = $stmt->fetchColumn();
            
            $_SESSION['usuario_dados']['pontos'] = $novosPontos;
            
            error_log("PONTOS ADICIONADOS: +$pontos = $novosPontos");
            return true;

        } catch (PDOException $e) {
            error_log("Erro ao atualizar pontos: " . $e->getMessage());
            return false;
        }
    }
    // Determina o módulo com base no prefixo da aula
    function determinarModulo($aula) {
        if (strpos($aula, 'html') === 0) return 'html';
        if (strpos($aula, 'css') === 0) return 'html';
        if (strpos($aula, 'js') === 0) return 'js';
        if (strpos($aula, 'php') === 0) return 'php';
        if (strpos($aula, 'sql') === 0) return 'php';
        if (strpos($aula, 'hardware') === 0) return 'hardware';
        return 'html';
    }
?>