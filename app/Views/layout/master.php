<html>
    <head> 
        <title><?=$title?></title>
        <?= $this->include("layout/assets");?> 
 </head> 
 <body>
    <div class="bg">
        <?= $this->include("layout/navbar");?>
        <div class= "container-fluid">
        <!--Dynamický obsah -->
            <?= $this->renderSection("content"); ?>
        </div>
        
    </div>
    <?= $this->include("layout/footer");?>
</body>
</html>