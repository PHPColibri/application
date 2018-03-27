    <div class="mainmenu navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="/">Colibri</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
				<? if (API::$user===null) { ?>
				<li><a href="/users/login?onOK=<?=isset($_GET['onOK'])?$_GET['onOK']:$_SERVER['REQUEST_URI']?>">Войти</a></li>
				<li><a href="/users/registration">Регистрация</a></li>
				<? } else { ?>
				<li><a href="/user"><?=API::$user->login?></a></li>
				<? } ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
