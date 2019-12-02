<?php
// echo Yii::$app->user->identity->username;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
//var_dump(Yii::$app->authManager);
?>
<style>
body{
  background-color: #293133;
  background-image: url("https://images.unsplash.com/photo-1442504028989-ab58b5f29a4a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80");
  background-repeat: no-repeat, repeat;
  background-size: cover;
  overflow-y: scroll;
}
</style>
<div class="fundoEscuro">
    <div class="fundoEscuroContent fundoEscuroContentLoggedIn">
        <img style="border-radius: 50%; width: 150px; height: 150px;" src="https://randomuser.me/api/portraits/men/93.jpg" alt="">
    <h1><?php echo Yii::$app->user->identity->username?></h1>
    
    </div>
</div>