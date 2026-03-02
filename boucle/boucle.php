<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="number" name="numb">
        <button>OK</button>
    </form>
    <?php
    $i = 1;
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $nbr = $_POST["numb"];
        if($nbr <0){
            echo "Entrer un numbre positif";
        }else{
            while($i <= $nbr){
                echo $nbr % $i == 0 ;
                $i++;
            }
        }
    }
    ?>
</body>
</html>
