<?php

    if (isset($_POST['delete_id'])) {
        if(isset($_POST['id_mes'])){
        foreach ($_POST['id_mes'] as $id):
            mysqli_query($con,"DELETE from message where id_mes='$id'");
        endforeach;
 
        header('location:message.php');
    }
    else{
              ?>
        <script>
            window.alert('veillez selectionner le message à supprimer');
            window.location.href='message.php';
        </script>
        <?php
        
    }
    }
?>