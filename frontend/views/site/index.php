<?php
/* @var $this yii\web\View */
$this->title = 'Musicae';
$contentGuest = '
<div class="fundoEscuro">
    <div class="fundoEscuroContent">
        <h1 style="color: white;">
            Musicae
        </h1>
        <hr style="width: 25%;">
        <h2>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, hic fugit facilis ipsam voluptatum, quam nihil illum nesciunt magni vitae est minima repellendus! Laudantium aperiam eveniet, aut voluptas consectetur aspernatur!
        </h2>
    </div>
</div>';
$contentLoggado = '
<div class="fundoEscuro">
    <div class="fundoEscuroContent fundoEscuroContentLoggedIn">
        
    </div>
</div>';
if(Yii::$app->user->id != null){
    echo $contentLoggado;
}else{
    echo $contentGuest;
}
?>
<style>
body{
  background-color: #293133;
  background-image: url("https://images.unsplash.com/photo-1442504028989-ab58b5f29a4a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80");
  background-repeat: no-repeat, repeat;
  background-size: cover;
}
</style>