SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP DATABASE musicweb;
CREATE DATABASE musicweb;
USE musicweb;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50),
    email VARCHAR(50),
    avata VARCHAR(50),
    vip BOOLEAN,
    role BOOLEAN
);

CREATE TABLE singer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    country VARCHAR(100)
);

CREATE TABLE song_type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100)
);

CREATE TABLE songs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    image VARCHAR(100),
    data VARCHAR(100),
    year INT
);

CREATE TABLE singer_song (
    id INT AUTO_INCREMENT PRIMARY KEY,
    singer_id INT,
    song_id INT,
    FOREIGN KEY (singer_id) REFERENCES singer(id),
    FOREIGN KEY (song_id) REFERENCES songs(id)
);

CREATE TABLE song_song_type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    song_id INT,
    song_type_id INT,
    FOREIGN KEY (song_id) REFERENCES songs(id),
    FOREIGN KEY (song_type_id) REFERENCES song_type(id)
);


INSERT INTO users (username, password, email, avata, vip, role) VALUES
    ('johnsmith', '123456', 'johnsmith@gmail.com', 'avatar1.jpg', true, true),
    ('janedoe', '654321', 'janedoe@yahoo.com', 'avatar2.jpg', false, true),
    ('peterparker', 'qwerty', 'peterparker@hotmail.com', 'avatar3.jpg', true, false),
    ('maryjane', 'asdfgh', 'maryjane@gmail.com', 'avatar4.jpg', false, false);


INSERT INTO singer (name, country) VALUES
    ('Sơn Tùng M-TP', 'Việt Nam'),
    ('BTS', 'Hàn Quốc'),
    ('Taylor Swift', 'Mỹ'),
    ('Adele', 'Anh');


INSERT INTO song_type (name) VALUES
    ('Pop'),
    ('Rock'),
    ('R&B'),
    ('Hip hop');


INSERT INTO songs (name, image, data, year)
VALUES
    ('Song A', 'image_a.jpg', 'data_a.mp3', 2010),
    ('Song B', 'image_b.jpg', 'data_b.mp3', 2015),
    ('Song C', 'image_c.jpg', 'data_c.mp3', 2020),
    ('Song D', 'image_d.jpg', 'data_d.mp3', 2021);

INSERT INTO singer_song (singer_id, song_id) VALUES
    (1, 1),  -- Ed Sheeran: singer_id=1, Shape of You: song_id=1
    (2, 2),  -- BTS: singer_id=2, Blood Sweat & Tears: song_id=2
    (3, 3),  -- Adele: singer_id=3, Hello: song_id=3
    (4, 4),
    (4,1),
    (1,4);  

INSERT INTO song_song_type (song_id, song_type_id) VALUES
    (1, 1),  -- Shape of You: song_id=1, Pop: song_type_id=1
    (2, 3),  -- Blood Sweat & Tears: song_id=2, Hip hop: song_type_id=3
    (3, 1),  -- Hello: song_id=3, Pop: song_type_id=1
    (4, 1),-- Shake It Off: song_id=4, Pop: song_type_id=1
    (1,3);  

SELECT * FROM users;
SELECT * FROM singer;
SELECT * FROM song_type;
SELECT * FROM songs;
SELECT * FROM singer_song;
SELECT * FROM song_song_type;


SELECT st.name 
FROM song_song_type sst 
JOIN song_type st ON sst.song_type_id = st.id 
WHERE sst.song_id = 1;

SELECT sg.name
FROM singer_song ss
JOIN singer sg ON ss.singer_id = sg.id
WHERE ss.song_id = 1;




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;









