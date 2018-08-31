<?php
    $servername = "172.20.30.34";
    $username = "root";
    $password = "passwd9821350";
    $database = "phptest";

    $conn = new mysqli($servername, $username, $password, $database);
    if($conn->connect_error){
        echo "Connection failed: ".$conn->connect_error;
    }

    $query = "SELECT * FROM Customers";

    $result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8"/>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Direction</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($result->num_rows > 0){
                        $result->data_seek(0);
                        while ($row = $result->fetch_object()) {
                            echo "<tr>";

                            echo "<td>".$row->Name."</td>";
                            echo "<td>".$row->Direction."</td>";
                            echo "<td>".$row->Phone."</td>";
                            echo "<td>".$row->Email."</td>";

                            echo "</tr>";
                        }
                    }
                    else{
                        echo "No results";
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>
