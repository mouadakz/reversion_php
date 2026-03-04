<?php

$students = [
    [
    "nom" => "Alami",
    "prenom" => "Ali",
    "notes" => [105, 15, 14]
    ],

    [
    "nom" => "Bakkali",
    "prenom" => "Sara",
    "notes" => [10, 9, 13]
    ],

    [
    "nom" => "Alaoui",
    "prenom" => "Omar",
    "notes" => [16, 18, 17]
    ]
];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Students Table</title>
</head>
<body>

<h2>Students Notes</h2>

<table border="1">
<tr>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Notes</th>
    <th>Moyenne</th>
</tr>

<?php
foreach($students as $student){

    $moyenne = array_sum($student["notes"]) / count($student["notes"]);

    echo "<tr>";
    echo "<td>".$student["nom"]."</td>";
    echo "<td>".$student["prenom"]."</td>";

    echo "<td>".$student["notes"][0]."</td>";
    echo "<td>".$student["notes"][1]."</td>";
    echo "<td>".$student["notes"][2]."</td>";

    echo "<td>".$moyenne."</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html> 
