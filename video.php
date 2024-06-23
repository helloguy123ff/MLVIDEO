<?php
include 'config.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM videos WHERE id = ?");
$stmt->execute([$id]);
$video = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?php echo $video['title']; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="header">
        <h1><?php echo $video['title']; ?></h1>
        <a href="index.php">Voltar para a página inicial</a>
    </div>
    <div id="content">
        <video width="600" controls>
            <source src="<?php echo $video['file_path']; ?>" type="video/mp4">
            Seu navegador não suporta o elemento de vídeo.
        </video>
        <p><?php echo $video['description']; ?></p>
    </div>
</body>
</html>
