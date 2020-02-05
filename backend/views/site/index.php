<?php
/* @var $this yii\web\View */
$this->title = "Musicae";
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

    img{
        height: 300px;
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
        <center><img src="/images/logo_branco.png">
            <h1>Musicae's Home:</h1>
            <br>
            <div class="links">
                <a href = "/user/index">Users</a>
                <a href = "/profile/index">Profiles</a>
                <a href = "/musico/index">Músicos</a>
                <a href = "/banda/index">Bandas</a>
                <a href = "/genero/index">Géneros</a>
                <a href = "/habilidade/index">Habilidades</a>
                <a href = "/banda-habilidades/index">Feed</a>
            </div>
        </center>
    </div>
</div>
</body>