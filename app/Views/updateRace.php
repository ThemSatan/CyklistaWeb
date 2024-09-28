<?=$this->extend("layout/master");?>
<?=$this->section("content");?>

<?php
if($message != NULL) {
  echo '<div class="pop-up bg-success">'.$message.
  '</div>';
}

?>

<form action="../update" method="post" enctype="multipart/form-data">

<div class="text-center">
  <h1 class="text-uppercase form-title"><i class="fa-solid fa-arrows-rotate fa-spin"></i> Přidat závod</h1>
</div>

    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="<?=$array[0]->id?>">

    <div class="form-group">
      <label for="inputDefault_name" class="form-label mt-4 titles">Název závodu</label>
      <input required="required" type="text" class="form-control" id="inputDefault_name" placeholder="
      <?php
      echo $array[0]->default_name;
      ?>" name="default_name">
    
      <label for="inputName" class="form-label mt-4 titles">Odkaz</label>
      <input required="required" type="text" class="form-control" id="inputLink" aria-describedby="input" placeholder="
      <?php
      echo $array[0]->link;
      ?>" name="link">
    
      <label for="inputCountry" class="form-label mt-4 titles">Stát</label>
      <input required="required" type="text" min="2" max="2" class="form-control" id="inputCountry" aria-describedby="input" placeholder="
      <?php
      echo $array[0]->country;
      ?>" name="country">
    
      <label for="inputType" class="form-label mt-4 titles">Typ závodu</label>
      <input type="hidden" name="id" value="type"/>
      <select required='required' id="inputType" name="type" class="form-control" aria-describedby="input" placeholder="
      <?php
      echo $array[0]->type;
      ?>">
        <option value="">Vyberte typ závodu</option>
        <option value=" ">Žádný</option>
        <option value="ITT">ITT</option>
        <option value="TTT">TTT</option>
      
      </select>
    
    </div>

    <input class="btn submit mt-4" type="submit" value="Potvrdit" id="flexCheckDefault">
    </form>

<?=$this->endSection();?>