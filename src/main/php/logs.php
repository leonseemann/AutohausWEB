<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width class=\" border-2 border-black\"=device-width class=\"logs-th\", initial-scale=1.0">
    <link rel="stylesheet" href="../css/output.css">
    <title>Logs</title>
</head>

<body>
    <div>
        <?php
        function printTable($wo)
        {
            include 'conn.php';
            $sql = "SELECT * from logs WHERE wo = '{$wo}' ORDER BY datumzeit";
            $abfrage = mysqli_query($conn, $sql);
            echo '<div>';
            echo "<p class=\"text-center font-bold text-2xl\">{$wo}</p>";
            echo '<table class="logs-table">' . "\n";
            echo "\t<tr><th class=\"logs-th\">LogID</th class=\"logs-th\"> <th class=\"logs-th\">email</th class=\"logs-th\"> <th class=\"logs-th\">aktivitaet</th class=\"logs-th\"> <th class=\"logs-th\">wo</th class=\"logs-th\"> <th class=\"logs-th\">art</th class=\"logs-th\"> <th class=\"logs-th\">datumzeit</th class=\"logs-th\"> <th class=\"logs-th\">ID</th class=\"logs-th\"> <th class=\"logs-th\">modell</th class=\"logs-th\"> <th class=\"logs-th\">error?</th class=\"logs-th\"> <th class=\"logs-th\">art_error</th class=\"logs-th\"><tr>\n";

            while ($ausgabe = mysqli_fetch_assoc($abfrage)) {

                $error = ($ausgabe['error']) ? "Ja" : "Nein";

                echo "<tr class=\"logs-tr\">";
                echo "\t<td class=\"logs-td\">{$ausgabe['LogID']}</td>\n\t
                            <td class=\"logs-td\">{$ausgabe['email']}</td>\n\t
                            <td class=\"logs-td\">{$ausgabe['aktivitaet']}</td>\n\t
                            <td class=\"logs-td\">{$ausgabe['wo']}</td>\n\t
                            <td class=\"logs-td\">{$ausgabe['art']}</td>\n\t
                            <td class=\"logs-td\">{$ausgabe['datumzeit']}</td>\n\t
                            <td class=\"logs-td\">{$ausgabe['ID']}</td>\n\t
                            <td class=\"logs-td\">{$ausgabe['modell']}</td>\n\t
                            <td class=\"logs-td\">{$error}</td>\n\t
                            <td class=\"logs-td\">{$ausgabe['art_error']}</td>\n\t";
                echo "</tr>\n\n";
            }
            echo "</table>\n";
            echo '</div>';
        }

        include 'conn.php';

        if ($conn) {
            if (mysqli_error($conn)) {
                echo 'Fehler: ' . mysqli_error($conn);
            } else {
                printTable("Login");
                printTable("Benutzer");
                printTable("Main");
                printTable("Auto");
                printTable("Ausstattung");
                printTable("Motor");
            }
        } else {
            echo "Verbindungsfehler: " . mysqli_connect_error($conn);
        }
        ?>
    </div>
</body>

</html>