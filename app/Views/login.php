<?php

echo $this->extend('layout/master');
echo $this->section('content');

echo form_open('login-complete');


if($message != NULL) {
    echo '<div class="pop-up bg-danger">'.$message.
    '</div>';
}

echo '

<div class="text-center">
  <h1 class="text-uppercase login-title"><i class="fa-solid fa-arrows-rotate fa-spin"></i> Přihlášení</h1>
</div>

<div class="login-group">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="email" placeholder="Email" name="email"> 
        <label for="email">Email</label>
    </div>
 
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="pswd" placeholder="Heslo" name="pswd">
        <label for="pswd">Heslo</label>
    </div>
    <button type="submit" class="btn submit mx-auto">Přihlášení</button>';
    echo form_close();
echo '</div>';

?>


<?= $this->endSection();?>