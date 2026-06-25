<?php
require_once 'bd_config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acao = $_POST["acao"] ?? '';

    // If da ação Registro
    if ($acao === "registro") {
        $apelido  = trim($_POST["apelido"] ?? '');
        $senha    = trim($_POST["senha"] ?? '');
        $email    = trim($_POST["email"] ?? '');
        $confirma = trim($_POST["cnf_senha"] ?? '');

        if (!$apelido || !$senha || !$email || !$confirma) {
            $_SESSION["erro_registro"] = "Insira todas as informações necessárias";
            header("Location: ../Registro.php");
            exit;
        }

        if ($senha !== $confirma) {
            $_SESSION["erro_registro"] = "As senhas não são iguais.";
            header("Location: ../Registro.php");
            exit;
        }

        $sql = "SELECT COUNT(*) FROM u WHERE apelido = :apelido OR email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":apelido" => $apelido,
            ":email"   => $email
        ]);
        if ($stmt->fetchColumn() > 0) {
            $_SESSION["erro_registro"] = "Apelido ou Email já estão em uso";
            header("Location: ../Registro.php");
            exit;
        }

        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO u (apelido, senha, email) VALUES (:apelido, :senha, :email)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([
            ":apelido" => $apelido,
            ":senha"   => $hash,
            ":email"   => $email
        ])) {
            header("Location: ../Login.php");
            exit;
        } else {
            echo "Erro: não foi possível registrar o usuário.";
            exit;
        }
    }
    // If da ação login
    if ($acao === "login") {
        $email = trim($_POST["email"] ?? '');
        $senha = trim($_POST["senha"] ?? '');

        if (!$email || !$senha) {
            $_SESSION["erro_login"] = "Preencha os campos";
            header("Location: ../Login.php");
            exit;
        }

        $sql = "SELECT * FROM u WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":email" => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario["senha"])) {
            $_SESSION["usuario_id"]         = $usuario["id"];
            $_SESSION["usuario_apelido"]    = $usuario["apelido"];
            $_SESSION["usuario_email"]      = $usuario["email"];
            $_SESSION["usuario_html"]       = $usuario["a_html"];
            $_SESSION["usuario_js"]         = $usuario["a_js"];
            $_SESSION["usuario_php"]        = $usuario["a_php"];
            $_SESSION["usuario_hardware"]   = $usuario["a_hardware"];
            $_SESSION["usuario_pontos"]     = $usuario["pontos"];
            $_SESSION["usuario_aulas_conc"] = $usuario["aulas_completas"];
            $_SESSION["usuario_foto"]       = $usuario["foto_perfil"];

            atualizarFotoSessao($pdo, $usuario["id"]);

            header("Location: ../Inicio.php");
            exit;
        } else {
            $_SESSION["erro_login"] = "Email ou senha inválidos";
            header("Location: ../Login.php");
            exit;
        }
    }
}
?>
