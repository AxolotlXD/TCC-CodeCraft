/* Criar o banco de dados ccr_bd */
CREATE DATABASE ccr_bd;
USE ccr_bd;

/* "u" de Usuário */
CREATE TABLE u(
	id int AUTO_INCREMENT PRIMARY KEY,
    apelido varchar(16) UNIQUE NOT NULL,
    senha varchar(255) NOT NULL,
    email varchar(50) NOT NULL,
    foto_perfil VARCHAR(100) DEFAULT 'pad_Items/imagens/perfil/foto1.png',
    a_html numeric(12) DEFAULT 0,
    a_js numeric(9) DEFAULT 0,
    a_php numeric(13) DEFAULT 0,
    a_hardware numeric(7) DEFAULT 0,
    pontos INT DEFAULT 0,
    aulas_completas TEXT null
);

/* Mude os valores default das aulas para 12, 9, 13 e 7 respectivamente para deixar todas as aulas desbloqueadas*/