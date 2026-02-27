<?php
$message="";

if (isset($_POST['ok'])) {
    $note=$_POST['note'];


    if (!empty($note)) {
        
    if (is_numeric($note)&&$note>=0&&$note<=20) {
        
        if ($note>=10) {
            $message="vous ete un admis";
        }else{
            $message="vous ete pas  admis";
        }







    }else {
        $message="entre un nbr mn 0 e 20";
    }


    }else {
        $message='non vide ';
    }



}

?>
<?php echo $message; ?>
<form action="" method="POST"> 
<label for="">note</label>
<input type="text" name="note" placeholder="entre un note">
<input type="submit" name="ok">

</form>


