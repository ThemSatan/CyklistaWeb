<?=$this->extend("layout/master");?>
<?=$this->section("content");?>

<p>praze?! to snad stihnu</p>

    <?php

    echo "<table class='table list-table table-hover pt-2 mx-auto'>
                <tbody class='table-dark'>
                
                <tr>
                    <td>No.</td>
                    <td>Race</td>
                    <td>Country</td>
                    <td>Type</td>
                </tr>";

    foreach($array as $row){

    ?>
            <?php                
                echo "<tr>
                        <td>".$row->id."</td>
                        <td>
                            <a class='races' href='".$row->link."'>".$row->default_name."</a>
                        </td>
                        <td>
                        <span class='flag fi fi-".$row->country."'></span>
                        </td>
                        <td>".$row->type."</td>
                </tr>"
            ?>
    
    <?php
    }
echo "</table>";

echo "<div class='d-flex flex-column justify-content-center align-items-center'>
        <p class= text-center>".$pager->links()."</p>
    </div>";
?>

<?=$this->endSection();?>