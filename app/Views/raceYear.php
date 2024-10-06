<?=$this->extend("layout/master");?>
<?=$this->section("content");?>


    <?php

    echo "<table class='table list-table table-hover pt-2 mx-auto'>
            
                <tbody class='table-dark'>";

    echo        "<tr>
                    <td>No.</td>
                    <td>Název</td>
                    <td>Rok</td>
                    <td>Začátek</td>
                    <td>Konec</td>
                    <td>Uci Tour typ</td>
                    <td>Logo</td>
                    <td>Sex</td>
                    <td>Kategorie</td>
                    <td>Stát</td>
                </tr>";

    foreach($array as $row){

    ?>
            <?php                
                echo "<tr>
                        <td>".$row->id."</td>
                        <td>".$row->default_name_race."</td>
                        <td>".$row->year."</td>
                        <td>".$row->start_date."</td>
                        <td>".$row->end_date."</td>
                        <td>".$row->uci_tour_name."</td>
                        <td>
                            <img src='".base_url('assets/images/logos')."/".$row->logo."'>
                        </td>
                        <td>".$row->sex."</td>
                        <td>".$row->category."</td>
                        <td>
                        <span class='flag fi fi-".$row->country."'></span>
                        </td>
                </tr>"
            ?>
    
    <?php
    }
echo "</tbody>
    </table>";

echo "<div class='d-flex flex-column justify-content-center align-items-center'>
        <p class= text-center>".$pager->links()."</p>
    </div>";
?>

<?=$this->endSection();?>