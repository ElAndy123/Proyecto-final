<?php 
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Fast Reserv</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
	<div id="APP" style="text-align: center; ;">
		<div class="container" style="margin-left: auto; margin-right: auto;">
			<div class="row mt-12">
				<div class="col-md-4">
					<div class="card mt-4">
						<div class="card-body">
							<h3>Usuario</h3>
							<input type="text" name="usuario">
							<h3>Clave</h3>
							<input type="password" name="clave">							
						</div>
						<div class="card-footer"> 
							<button id="iniciar_sesion">Iniciar sesion</button>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>	
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>
<!--<form>
	<h2>Usuario</h2>
	<input type="text" name="ususario"> <br>
	<h2>Clave</h2>
	<input type="password" name="clave"> <br> <br>
	<button name="loguear">Iniciar sesion</button>
</form>-->


