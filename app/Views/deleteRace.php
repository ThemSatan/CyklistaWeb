<?=$this->extend("layout/master");?>
<?=$this->section("content");?>
    
<?php
helper('form');
echo form_open('race/delete');
//var_dump($array);
?>

<div class="container pop-up-delete bg-danger">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6"><h1><i class="fa-solid fa-circle-exclamation fa-beat"></i></i> Opravdu vymazat závod z databáze?</h1></div>
                <div class="col-3"></div>
            </div>

    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="id" value="<?=$array->id?>">
    <div style="text-align: center">
    <input class="btn btn-danger" type="submit" value="Potvrdit" id="flexCheckDefault">
    </div>
    <br>
</div>

<?php
echo form_close();
?>



<?=$this->endSection();?>