CREATE DATABASE IF NOT EXISTS brinquedosdb DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE brinquedosdb;

INSERT INTO brinquedo (nome, categoria, faixa_etaria, preco, quantidade_estoque) VALUES
('Carrinho Turbo', 'Veiculos', '6+', 49.90, 25),
('Boneca Estrela', 'Bonecas', '4+', 79.90, 18),
('Quebra-cabeca 500 Pecas', 'Educativo', '10+', 39.50, 30),
('Lego Cidade Mini', 'Montagem', '8+', 129.90, 12),
('Jogo da Memoria Animal', 'Jogos', '5+', 29.90, 40);