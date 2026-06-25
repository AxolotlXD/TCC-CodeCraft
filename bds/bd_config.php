<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $db = "ccr_bd";

    // Conexão
    try {
        $pdo = new PDO("mysql:host=$servidor;dbname=$db", $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        die("Conexão falhou: " . $e->getMessage());
    }

    // Iniciar sessão se ainda não estiver iniciada
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Função para verificar login 
    function verificarLogin($caminhoPersonalizado = null) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['usuario_id'])) {
            if ($caminhoPersonalizado !== null) {
                header("Location: " . $caminhoPersonalizado);
                exit;
            }

            $caminhoLogin = '../Login.php';
            
            if (!file_exists($caminhoLogin)) {
                $caminhoLogin = 'Login.php';
            }
            
            header("Location: " . $caminhoLogin);
            exit;
        }
        return true;
    }

    // Função para pegar dados do usuário
    function pegarUsuario($usuario_id, $pdo) {
        $stmt = $pdo->prepare("SELECT * FROM u WHERE id = ?");
        $stmt->execute([$usuario_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Função para atualizar dados do usuário na sessão
    function atualizarSessao($pdo) {
        if (!isset($_SESSION["usuario_dados"]) && isset($_SESSION["usuario_id"])) {
            $_SESSION["usuario_dados"] = pegarUsuario($_SESSION["usuario_id"], $pdo);
        }

        if (isset($_SESSION["usuario_dados"]) && !isset($_SESSION["usuario_foto"])) {
            $_SESSION["usuario_foto"] = $_SESSION["usuario_dados"]['foto_perfil'] ?? 'perfil1.png';
        }
        
        return $_SESSION["usuario_dados"] ?? null;
    }

    // Função para obter a foto do perfil atual
    function atualizarFotoSessao($pdo, $usuario_id) {
        $stmt = $pdo->prepare("SELECT foto_perfil FROM u WHERE id = ?");
        $stmt->execute([$usuario_id]);
        $foto = $stmt->fetchColumn();
        
        if ($foto) {
            $_SESSION['usuario_foto'] = $foto;
        }
        
        return $foto ?? 'pad_items/imagens/perfil/foto1.png';
    }

    // Função para atualizar a foto do perfil
    function atualizarFotoPerfil($novoIndex) {
        global $pdo;
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['usuario_id'])) {
            return false;
        }

        $fotos_perfil = [
            'pad_items/imagens/perfil/foto1.png', 
            'pad_items/imagens/perfil/foto2.png',
            'pad_items/imagens/perfil/foto3.png',
            'pad_items/imagens/perfil/foto4.png'
        ];
        
    // Verificar se o índice é válido
    if ($novoIndex >= 0 && $novoIndex < count($fotos_perfil)) {
        $novaFoto = $fotos_perfil[$novoIndex];
            
        try {
            // Atualizar no banco
            $stmt = $pdo->prepare("UPDATE u SET foto_perfil = ? WHERE id = ?");
            $stmt->execute([$novaFoto, $_SESSION['usuario_id']]);
            
            // Atualizar na sessão
            $_SESSION['usuario_foto'] = $novaFoto;
            if (isset($_SESSION['usuario_dados'])) {
                $_SESSION['usuario_dados']['foto_perfil'] = $novaFoto;
            }
            $_SESSION['foto_perfil_index'] = $novoIndex;
                
            return true;
                
            } catch (PDOException $e) {
                error_log("Erro ao atualizar foto: " . $e->getMessage());
                return false;
            }
        }

        return false;
    }
    if (isset($_GET['atualizar_foto']) && isset($_SESSION['usuario_id'])) {
        $novoIndex = (int)$_GET['atualizar_foto'];
        $sucesso = atualizarFotoPerfil($novoIndex);
        
        if ($sucesso) {
            echo "Foto atualizada com sucesso!";
        } else {
            http_response_code(400);
            echo "Erro ao atualizar foto";
        }
        exit;
    }

    // Função para obter a foto do perfil atual
    function obterFotoPerfil($usuario_id = null, $diretorioRelativo = '') {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['usuario_foto']) && !empty($_SESSION['usuario_foto'])) {
            $fotoSessao = $_SESSION['usuario_foto'];
            if ($diretorioRelativo && !preg_match('/^https?:\/\//', $fotoSessao)) {
                return $diretorioRelativo . $fotoSessao;
            }
            return $fotoSessao;
        }
        
        $idParaBuscar = $usuario_id ?? ($_SESSION['usuario_id'] ?? null);
        
        if ($idParaBuscar) {
            global $pdo;
            try {
                $stmt = $pdo->prepare("SELECT foto_perfil FROM u WHERE id = ?");
                $stmt->execute([$idParaBuscar]);
                $foto = $stmt->fetchColumn();
                
                if ($foto && !empty($foto)) {
                    $_SESSION['usuario_foto'] = $foto;
                    if ($diretorioRelativo && !preg_match('/^https?:\/\//', $foto)) {
                        return $diretorioRelativo . $foto;
                    }
                    return $foto;
                }
            } catch (PDOException $e) {
                error_log("Erro ao buscar foto: " . $e->getMessage());
            }
        }

        $fotoPadrao = 'pad_items/imagens/perfil/foto1.png';
        if ($diretorioRelativo && !preg_match('/^https?:\/\//', $fotoPadrao)) {
            return $diretorioRelativo . $fotoPadrao;
        }
        return $fotoPadrao;
    }
?>