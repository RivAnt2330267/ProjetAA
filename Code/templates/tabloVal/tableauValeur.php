<?php
session_start();

if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = []; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $time = $_POST['time'] ?? '';
    $temperature = $_POST['temperature'] ?? '';
    
    if (!empty($time) && !empty($temperature)) {
        $_SESSION['data'][] = [
            'time' => htmlspecialchars($time),
            'temperature' => htmlspecialchars($temperature)
        ];
    }
}

// Réinitialiser le tableau
if (isset($_POST['reset'])) {
    $_SESSION['data'] = [];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau Temps et Températures</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Tableau Temps et Températures</h1>

    <form method="POST">
        <label for="time">Temps :</label>
        <input type="text" id="time" name="time" placeholder="hh:mm:ss" required>
        
        <label for="temperature">Température :</label>
        <input type="number" id="temperature" name="temperature" placeholder="°C" required>
        
        <button type="submit">Ajouter</button>
        <button type="submit" name="reset">Réinitialiser</button>
    </form>

    <?php if (!empty($_SESSION['data'])): ?>
        <table>
            <thead>
                <tr>
                    <th>Temps</th>
                    <th>Température</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['data'] as $entry): ?>
                    <tr>
                        <td><?= $entry['time'] ?></td>
                        <td><?= $entry['temperature'] ?> °C</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucune donnée enregistrée.</p>
    <?php endif; ?>
</body>
</html>
