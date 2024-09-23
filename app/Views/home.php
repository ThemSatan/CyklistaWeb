<?=$this->extend("layout/master");?>
<?=$this->section("content");?>

<p>praze?! to snad stihnu</p>


<div class='offset-1 profiles-group'>
    <div class='row pt-2'>

    <?php

    foreach($array as $row){

    ?>
    <br>
    <div class='card'>
        <div class='text-center'>
            <?php
                echo "<div class='container'>
                        <h3>".$row->country."</h3>
                    </div>";
            ?>
        </div>
    </div>
    
    <?php
    }
echo "</div>
</div>";

?>

<?=$this->endSection();?>