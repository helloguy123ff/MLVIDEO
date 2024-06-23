<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Upload de Vídeo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="header">
        <h1>Upload de Vídeo</h1>
        <a href="index.php">Voltar para a página inicial</a>
    </div>
    <div id="content">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" required>
            <label for="description">Descrição:</label>
            <textarea id="description" name="description" required></textarea>
            <label for="video">Selecione um vídeo:</label>
            <input type="file" id="video" name="video" accept="video/*" required>
            <button type="submit" name="submit">Upload</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $target_dir = "videos/";
            $target_file = $target_dir . basename($_FILES["video"]["name"]);
            if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
                $stmt = $pdo->prepare("INSERT INTO videos (title, description, file_path) VALUES (?, ?, ?)");
                $stmt->execute([$title, $description, $target_file]);
                echo "O vídeo foi enviado com sucesso!";
            } else {
                echo "Desculpe, ocorreu um erro ao enviar seu vídeo.";
            }
        }
        ?>
    </div>
</body>
</html>
