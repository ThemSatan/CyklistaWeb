<?=$this->extend("layout/master");?>
<?=$this->section("content");?>

<p>praze?! to snad stihnu</p>

<?php

foreach($array as $row){

?>
    <br><div class='card'>
        <div class='text-center'>
            <?php
                echo "<div class='container'>
                        <h3>".$row->default_name."</h3>
                    </div>";
            ?>
        </div>
    </div>
    
<?php
}

?>

<?=$this->endSection();?>