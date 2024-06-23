<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Video Site</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="header">
        <h1>Video Site</h1>
        <a href="upload.php">Upload de Vídeo</a>
    </div>
    <div id="content">
        <?php
        $stmt = $pdo->query("SELECT * FROM videos ORDER BY upload_date DESC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="video">';
            echo '<a href="video.php?id=' . $row['id'] . '">';
            echo '<h3>' . $row['title'] . '</h3>';
            echo '<p>' . $row['description'] . '</p>';
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
