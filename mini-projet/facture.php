<?php
session_start();

if (!isset($_SESSION['achats']) || empty($_SESSION['achats'])) {
    
    echo "<br><a href='script.php'>Retour</a>";
    exit;
}

$total = 0;
?>

<h2>Facture</h2>

<table border="1">
<tr>
    <th>nom</th>
    <th>qnt</th>
    <th>prix</th>
    <th>total</th>
</tr>

<?php
foreach ($_SESSION['achats'] as $achat) {
    echo "<tr>";
    echo "<td>".$achat['nom']."</td>";
    echo "<td>".$achat['qte']."</td>";
    echo "<td>".$achat['prix']."</td>";
    echo "<td>".$achat['total']."</td>";
    echo "</tr>";

    $total += $achat['total'];
}
?>

<tr>
    <td><strong>Total</strong></td>
    <td><strong><?php echo $total; ?></strong></td>
</tr> 

</table>

<br>
<a href="script.php">Retour</a>
