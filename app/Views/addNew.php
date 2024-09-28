<?=$this->extend("layout/master");?>
<?=$this->section("content");?>

<?php
if($message != NULL) {
  echo '<div class="pop-up bg-success">'.$message.
  '</div>';
}

?>

<form action="create" method="post" enctype="multipart/form-data">

<div class="text-center">
  <h1 class="text-uppercase form-title"><i class="fa-solid fa-arrows-rotate fa-spin"></i> Přidat závod</h1>
</div>

    <div class="form-group">
      <label for="inputDefault_name" class="form-label mt-4 titles">Název závodu</label>
      <input required="required" type="text" class="form-control" id="inputDefault_name" placeholder="Sem název závodu" name="default_name">
    
      <label for="inputName" class="form-label mt-4 titles">Odkaz</label>
      <input required="required" type="text" class="form-control" id="inputLink" aria-describedby="input" placeholder="Sem odkaz na stránky závodu" name="link">
    
      <label for="inputCountry" class="form-label mt-4 titles">Stát</label>
      <input required="required" type="text" min="2" max="2" class="form-control" id="inputCountry" aria-describedby="input" placeholder="Sem název státu, např.: cz, sk" name="country">
    
      <label for="inputType" class="form-label mt-4 titles">Typ závodu</label>
      <input type="hidden" name="id" value="type"/>
      <select required='required' id="inputType" name="type" class="form-control" aria-describedby="input" placeholder="Vyberte typ závodu">
        <option value="">Vyberte typ závodu</option>
        <option value=" ">Žádný</option>
        <option value="ITT">ITT</option>
        <option value="TTT">TTT</option>
      
      </select>
    
    </div>

    <input class="btn submit mt-4" type="submit" value="Potvrdit" id="flexCheckDefault">
    </form>

<?=$this->endSection();?>