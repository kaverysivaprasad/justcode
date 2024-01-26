<!DOCTYPE html>
<html>
    <?php
    include 'connection.php';
    ?>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <?php
    $sql="select * from user_details";
    $result=$connect->query($sql);
    if($result->num_rows > 0)
    ?>
    <div class="admin-container">
        <h1>Admin Portal</h1>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row=$result->fetch_assoc())
                {
                   echo '<tr>';
                    echo '<td>';
                    echo $row["username"];
                    echo '</td>';
                   
                    echo '<td>';
                    echo $row["firstname"];
                    echo '</td>';
                   
                    echo '<td>';
                    echo $row["lastname"];
                    echo '</td>';
                 
                    echo '<td>';
                    echo $row["email"];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $row["password"];
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </body>
        </table>
    </div>
</body>
</html>