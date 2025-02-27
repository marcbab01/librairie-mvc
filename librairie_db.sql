CREATE DATABASE librairie_db;

USE librairie_db;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categorie VARCHAR(255)
);

CREATE TABLE livres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    auteur INT,
    categorie_id INT,
    anneePublication INT,
    CONSTRAINT FK_CategorieLivre FOREIGN KEY (categorie_id) REFERENCES categories(id)
);

CREATE TABLE membres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lName VARCHAR(255) NOT NULL,
    fName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(15)
);

CREATE TABLE emprunts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    membre_id INT NOT NULL,
    livre_id INT NOT NULL,
    dateEmprunt DATE,
    dateRetour DATE,
    CONSTRAINT FK_MembreEmprunt FOREIGN KEY (membre_id) REFERENCES membres(id),
    Constraint FK_LivreEmprunt FOREIGN KEY (livre_id) REFERENCES livres(id)
);

INSERT INTO categories (categorie) VALUES
('Suspense'), ('Romance'), ('Poésie'), ('Classique'), ('Fantaisie'), ('Fiction'), ('Science-Fiction'), ('Biographie');

INSERT INTO membres (lName, fName, email, phone) VALUES
('Babin', 'Marc-Olivier', 'mobabin@gmail.com', '514-123-4567'),
('Dupré', 'Martin', 'mdupre@hotmail.com', '438-666-6666'),
('Sanches', 'Marcos', 'msanches@hotmail.com', '450-987-6543');