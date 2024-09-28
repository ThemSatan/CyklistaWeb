<?php

echo $this->extend('layout/master');
echo $this->section('content');

echo form_open('register-complete');

echo '

<div class="text-center">
  <h1 class="text-uppercase register-title"><i class="fa-solid fa-arrows-rotate fa-spin"></i> Registrace</h1>
</div>

<div class="register-group">
    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" id="user" placeholder="Enter username" name="user">
        <label for="text">Username</label>
    </div>

    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"> <!-- placeholder u floating placeholderu nechat prazdny, protoze nejde videt -->
        <label for="text">Jméno</label>
    </div>

    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" id="surname" placeholder="Enter surname" name="surname"> <!-- placeholder u floating placeholderu nechat prazdny, protoze nejde videt -->
        <label for="text">Příjmení</label>
    </div>

    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email"> <!-- placeholder u floating placeholderu nechat prazdny, protoze nejde videt -->
        <label for="email">Email</label>
    </div>
 
    <div class="form-floating mt-3 mb-3">
        <input type="password" class="form-control" id="pswd" placeholder="" name="pswd">
        <label for="pwd">Password</label>
    </div>

    <div class="form-floating mt-3 mb-3">
        <input type="password" class="form-control" id="pswd2" placeholder="" name="pswd2">
        <label for="pwd">Password again</label>
    </div>

    <button type="submit" class="btn submit">Registrace</button>
</div>';


echo form_close();
?>


<?= $this->endSection();?>