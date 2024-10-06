<?=$this->extend("layout/master");?>
<?=$this->section("content");?>


    <?php
    echo "<table class='table list-table table-hover pt-2 mx-auto'>
            
                <tbody class='table-dark'>";

    echo        "<tr>
                    <td>Cyklista</td>
                    <td>Tým</td>
                    <td>Fáze</td>
                    <td>Čas</td>
                    <td>Bonifikace</td>
                    <td>Body</td>
                    <td>Umístění</td>
                    <td>Poznámka</td>
                    <td>Výsledek</td>
                </tr>";

    foreach($array as $row){

    ?>
            <?php                
                echo "<tr>
                        <td>".$row->rider_name."</td>
                        <td>".$row->team_link."</td>
                        <td><a class='races' href='result/".$row->id."'>".$row->id_stage."</td>
                        <td>".$row->time."</td>
                        <td>".$row->bonification."</td>
                        <td>".$row->point."</td>
                        <td>".$row->rank."</td>
                        <td>".$row->note."</td>
                        <td>".$row->type_result."</td>
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