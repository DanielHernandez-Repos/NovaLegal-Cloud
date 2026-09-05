
-- Cremaos la base de datos
CREATE DATABASE IF NOT EXISTS novalegal_cloud;

-- definimos la base de datos a utilizar
USe novalegal_cloud;

-- creamos la tabla usuarios con sus campos correspondientes
CREATE TABLE usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol VARCHAR(20) NOT NULL DEFAULT 'USUARIO',
    creat_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

