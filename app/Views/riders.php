<?=$this->extend("layout/master");?>
<?=$this->section("content");?>


    <?php

    echo "<table class='table list-table table-hover pt-2 mx-auto'>
            
                <tbody class='table-dark'>";

    echo        "<tr>
                    <td>No.</td>
                    <td>Jméno</td>
                    <td>Příjmení</td>
                    <td>Stát</td>
                </tr>";

    foreach($array as $row){

    ?>
            <?php                
                echo "<tr>
                        <td>".$row->id."</td>
                        <td>
                            <a class='races' href='rider/".$row->id."'>".$row->first_name."</a>
                        </td>
                        <td>
                            <a class='races' href='rider/".$row->id."'>".$row->last_name."</a>
                        </td>
                        <td><span class='flag fi fi-".$row->country."'></span></td>
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