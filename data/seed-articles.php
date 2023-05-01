<?php
$articles = json_decode(file_get_contents('./articles.json'), true);

$dns = 'mysql:host=localhost;dbname=blog';
$user = 'root';
$pwd = 'Pomme123;';

// try {
//     $dbh = new PDO("mysql:host=localhost", $user, $pwd);

//     $dbh->exec("CREATE DATABASE blog;");
// }
// catch (PDOException $e) {
//     die("DB ERROR: " . $e->getMessage());
// }

$pdo = new PDO($dns, $user, $pwd);

// $statements = [
// 	'CREATE TABLE blog.article( 
//         id   INT NOT NULL AUTO_INCREMENT,
//         title  VARCHAR(255) NOT NULL, 
//         image  VARCHAR(255) NOT NULL, 
//         content LONGTEXT NOT NULL, 
//         category   VARCHAR(45) NOT NULL,
//         PRIMARY KEY(id)
//     );',
// 	];


// foreach ($statements as $statement) {
// 	$pdo->exec($statement);
// }


$statement = $pdo->prepare('
  INSERT INTO article (
    title,
    category,
    content,
    image
  ) VALUES (
    :title,
    :category,
    :content,
    :image
)');

foreach ($articles as $article) {
  $statement->bindValue(':title', $article['title']);
  $statement->bindValue(':category', $article['category']);
  $statement->bindValue(':content', $article['content']);
  $statement->bindValue(':image', $article['image']);
  $statement->execute();
}


