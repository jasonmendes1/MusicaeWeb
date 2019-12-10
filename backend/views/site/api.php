<?php
/* @var $this yii\web\View */
$this->title = "Musicae's API";
?>
<style>
body{
  background-color: #293133;
  background-repeat: no-repeat, repeat;
  background-size: cover;
  overflow-y: scroll;
}

h1{
    color: white;
    text-align: center;
    font-size: 64px;
}

.links > a{
    color: #636b6f;
    padding: 0 25px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
    text-align: center;
}
</style>

<body>
<div class="fundoEscuro">
    <div class="Logo">
        <center><img src="../../../frontend/web/images/logotipo.png">
            <h1>Musicae's API:</h1><p><p><p><p><p><p><p><p>
            <div class="links">
                <a href = "/v1/user">Users</a>
                <a href = "/v1/profiles">Profiles</a>
                <a href = "/v1/bandas">Bands</a>
                <a href = "#">Etc</a>
            </div>
        </center>
    </div>
</div>
</body>