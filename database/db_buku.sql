CREATE DATABASE IF NOT EXISTS db_buku;
USE db_buku;

CREATE TABLE IF NOT EXISTS buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    penerbit VARCHAR(100) NOT NULL,
    tahun_terbit YEAR NOT NULL,
    harga DECIMAL(12,2) NOT NULL
);

INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, harga)
VALUES
('Better Than the Movies', 'Lynn Painter',
 'Simon & Schuster Books for Young Readers', 2021, 150000),
('Powerless', 'Lauren Roberts',
 'Simon & Schuster Books for Young Readers', 2023, 175000),
('Omniscient Reader''s Viewpoint', 'Sing Shong',
 'Redice Studio', 2020, 120000);