<!DOCTYPE html>
<html>
    <head>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand"><img class="logo" src="<?=base_url('assets/images/icon.webp')?>"></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
            <p class="navbar-title">Cy<span style="color:black;">KK</span>ling</p>
            <div class="dropdown">
                
                <button data-mdb-button-init data-mdb-ripple-init data-mdb-dropdown-init class="dropbtn" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-caret-right"></i>
                        Menu
                    <i class="fa-solid fa-caret-left"></i>    
                </button>
                
                <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?=base_url('home')?>"><i class="fa-solid fa-caret-right"></i> Domů</a>
                </div>
            </div>
                <li class="nav-item">
                    <?php
                    if (!$logged){
                        echo anchor('login','Přihlásit',['class' => 'btn']);
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if (!$logged){
                        echo anchor('register','Registrovat',['class' => 'btn']);
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if ($logged){
                        echo anchor('logout','Odhlásit',['class' => 'btn']);
                    }
                    ?>
                </li>
            </ul>
            
        </div>
    </div>
</nav>


</body>
</html>
