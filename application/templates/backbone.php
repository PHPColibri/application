<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="shortcut icon" type="image/png" href="/favicon.png">

{title}
{keywords}
{description}
<!-- ----- CSS ----- -->
<link   type="text/css" rel="stylesheet" href="<?=RES_CSS?>bootstrap<?=DEBUG?'':'.min'?>.css"/>
<link   type="text/css" rel="stylesheet" href="<?=RES_CSS?>bootstrap-responsive<?=DEBUG?'':'.min'?>.css"/>
{css}

<!-- ----- JavaScript ----- -->
<!--[if lt IE 9]>
  <script src="../assets/js/html5shiv.js"></script>
<![endif]-->
<script type="text/javascript" src="<?=RES_JS?>jquery-1.10.0<?=DEBUG?'':'.min'?>.js"></script>
<script type="text/javascript" src="<?=RES_JS?>bootstrap<?=DEBUG?'':'.min'?>.js"></script>
<script type="text/javascript" src="<?=RES_JS?>rexml.js"></script>
<script type="text/javascript" src="<?=RES_JS?>xmlrpc.js"></script>
<script type="text/javascript" src="<?=RES_JS?>xmlrpc_adapter.js"></script>
<script type="text/javascript" src="<?=RES_JS?>API.js"></script>
{javascript}

</head>


<body>
	
	<? include('backbone/mainmenu.php'); ?>

    <div class="canvas">

		<h1>Colibri Application</h1>
		
		<ul class="divisionmenu nav nav-pills">
			<li><a href="/"        ><i class="icon icon-home"></i> Home</a></li>
			<li><a href="/somepage">Some page</a></li>
		</ul>
		
		<div class="row-fluid">
			<div class="span8">
				{content}
			</div>
			<div class="span4 hidden-phone">
				<div class="well">
					
				</div>
			</div>
		</div>

    </div> <!-- /container -->
</body>
</html>
