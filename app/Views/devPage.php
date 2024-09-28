<?=$this->extend("layout/master");?>
<?=$this->section("content");?>

<?php
if($message != NULL) {
    echo '<div class="pop-up bg-success">'.$message.
    '</div>';
  }

echo "<table class='table list-table table-hover pt-2 mx-auto'>".
        anchor('race/new','Přidat '."<i class='fa-solid fa-plus'></i>",['class' => 'add-button'])."
        <tbody class='table-dark'>
            <tr>
                <td>No.</td>
                <td>Race</td>
                <td>Country</td>
                <td>Type</td>
                <td></td>
                <td></td>
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
                    <td>".anchor('race/update/'.$row->id,'Upravit',['class' => 'btn'])."</td>
                    <td>".anchor('race/delete/'.$row->id,'Smazat',['class' => 'btn'])."</td>
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