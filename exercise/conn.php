<!DOCTYPE html>
<html>
<head><title>Untitle Document</title></head>
    <body>
        <?php
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "DB_test";
        $conn = mysqli_connect($servername, $username, $password, $database);
        /*
        if(mysqli_connect_error()){
            die("Connection failed: " .mysqli_connect_error());
        }
        
        $sql = "CREATE DATABASE DB_test";
        if(mysqli_query($conn, $sql)){
            echo "Datebase was successfully created";
        }else{
            echo "ERROR: Could not be able to execute $sql." .mysqli_error($conn);
        }
        
        echo "Connection successfully established!" . "<br/>";
        $conn -> close();
        
        $sql = "CREATE TABLE tbl_visitor (VID int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                date_visit TIMESTAMP)";
        if (mysqli_query($conn, $sql)){
            echo "The table was successfully created!";
        }else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        
        $sql = "INSERT INTO tbl_visitor (firstname, lastname, email, date_visit) VALUES ('mark', 'ramos',
                'markramos@gmail.com', '2015-07-23 4:43:55'),
                ('cheska', 'custodio','cheskacustodio@yahoo.com', '2015-07-24 1:12:00'),
                ('ria', 'gagarin','ria.gagarin@gmail.com', '2015-07-23 5:31:00'),
                ('beronika', 'pena','bk_pen@gmail.com', '2015-07-21 11:00:00')
                ";
        if(mysqli_query($conn, $sql)){
            echo "New record successfully added!";
        }else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        
        $sql = "UPDATE tbl_visitor SET email = 'bk_pena@yahoo.com'
                WHERE firstname = 'beronika' AND lastname='pena'";
        if(mysqli_query($conn, $sql)){
            echo "Records was successfully updated!";
        }else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        */
         $sql = "DELETE from tbl_visitor WHERE VID = '12'";
        if(mysqli_query($conn, $sql)){
            echo "Records was successfully deleted.";
        }else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        
        
        $sql = "SELECT * FROM tbl_visitor";
        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result)>0){
                echo "<table>";
                echo "<tr>";
                    echo "<th>VID</th>";
                    echo "<th>firstname</th>";
                    echo "<th>lastname</th>";
                    echo "<th>email</th>";
                    echo "<th>date visit</th>";
                echo"</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>". $row['VID'] . "</td>";
                    echo "<td>". $row['firstname'] . "</td>";
                    echo "<td>". $row['lastname'] . "</td>";
                    echo "<td>". $row['email'] . "</th>";
                    echo "<td>". $row['date_visit'] . "</td>";
                echo"</tr>";
            }
                echo "</table>";
                mysqli_free_result($result);
            }else{
                echo "No records match were found.";
            }
        }else{
            echo "ERROR: Could not be able to execute $sql. " . mysqli_error(conn);
        }
        
        ?>
        
    </body>
</html>