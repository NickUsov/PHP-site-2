<?php
    $connect = mysqli_connect('127.0.0.1', 'root', '', 'trips');
    $resourse = mysqli_query($connect, 'select * from roles');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="2">
        <thead>
        <tr>
            <th>id</th>
            <th>role</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_array($resourse)):?>
                    <tr>
                        <td><?=$row['id']?> </td>
                        <td><?=$row['role']?></td>
                    </tr> 
            <?php endwhile;?>
        </tbody>
    </table>
</body>
</html>