<?php

use Application\Foundation\API;
use Application\Foundation\Config;
?>

<nav class="navbar navbar-inverse navbar-fixed-top" <?= Config::application('debug') ? 'style="background-color: #030"' : '' ?>>
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Скрыть/показать меню</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                Colibri App
            </a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (API::user()===null) { ?>
                    <li><a href="#">Войти</a></li>
                <?php } else { ?>
                    <li class="login"><a href="/account"><?= 'sdff'//API::user()->login ?></a></li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Выйти"><a href="#logout"><i class="glyphicon glyphicon-off"></i></a></li>
                <?php } ?>
            </ul>
        </div>

    </div>
</nav>

