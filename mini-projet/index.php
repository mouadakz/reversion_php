
    
<?php
session_start();


$json=file_get_contents('data.json');

$produits=json_decode($json,true);


if (!isset($_SESSION['produits'])) {
    $_SESSION['produits']=$produits;
}

if (!isset($_SESSION['achats'])) {
    $_SESSION['achats'] = [];
}


if ($_SERVER['REQUEST_METHOD']=="POST") {
    
    $select=$_POST['select'];
    $qte=$_POST['qte'];
    $found=false;

    if (!empty($select) && !empty($qte) && $qte>0) {
        
            
            foreach ($_SESSION['produits'] as &$produit) {
            if ($produit['nom']==$select) {
                $found=true;
                if ($produit['stock']<$qte) {
                    echo 'no qte produits';
                }else {
                
                         $_SESSION['achats'][] = [
                        "nom"=>$produit['nom'],
                        "qte"=>$qte,
                        "prix"=>$produit['prix'],
                        "total"=>$produit['prix'] * $qte
                    ];
                    $produit['stock'] -= $qte;
file_put_contents("data.json", json_encode($_SESSION['produits'], JSON_PRETTY_PRINT));
                echo  "name:".$produit['nom']."<br>";
                echo "prix:".$produit['prix']."<br>";
                echo "qte:".$produit['stock']."<br>";
                echo "Total: ".$produit['prix'] * $qte."<br>";
                
            }break;
            
      }

       
    }  
     if (!$found) {
            echo 'Produit non';
        }


    }
    else {
        echo 'entre les infor';
    } 
    } 
     
    

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table border="1">

<tr>
<th>nom</th>
<th>prix</th>
<th>stock</th>
</tr>

<?php
foreach ($_SESSION['produits'] as $prod) {
    echo "<tr>";
    echo "<td>".$prod['nom']."</td>";
    echo "<td>".$prod['prix']."</td>";
    echo "<td>".$prod['stock']."</td>";
    echo "</tr>";
}
?> 

</table><br><br>



<form method="POST">
<select name="select">
<option>choix...</option>
<option value="Téléphone">telephone</option>
<option value="Casque">casque</option>
<option value="Tablette">tablette</option>
<option value="Montre connectée">montre connectee</option>
</select><br><br>


<label>Qnt</label>
<input type="number" name="qte" placeholder="saiser les qte"><br><br>


<button name="acheter">acheter</button>


</form>

<?php echo "<br><a href='facture.php'>dd</a>"; ?>

</body>
</html>
