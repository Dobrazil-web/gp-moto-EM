<?php
include 'connexion.php';

// Requête pour récupérer les pilotes
$sql = "SELECT id, nom, prenom, nationalite FROM pilote";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des pilotes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .details {
            color: white;
            background-color: #4CAF50;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }
        .details:hover {
            background-color: #45a049;
        }
        .no-data {
            text-align: center;
            font-size: 18px;
            color: red;
        }
    </style>
</head>
<body>

    <h1>Liste des pilotes</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Nationalité</th>
                <th>Détails</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result && $result->num_rows > 0) {
                // Affichage des données des pilotes
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nom"] . "</td>";
                    echo "<td>" . $row["prenom"] . "</td>";
                    echo "<td>" . $row["nationalite"] . "</td>";
                    echo "<td><a class='details' href='gp.php?action=details_pilote&id=" . $row['id'] . "'>Voir</a></td>";
                    echo "</tr>";
                }
            } else {
                // Message si aucun pilote trouvé
                echo "<tr><td colspan='5' class='no-data'>Aucun pilote trouvé</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>

<?php
$conn->close();
?>
