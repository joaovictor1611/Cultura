<?php include '../db_connect.php'; ?>

<?php
 session_start();
  if(isset($_COOKIE['usuario1'])) {

$_SESSION['id1'] =$_COOKIE['id1'];
    $_SESSION['emailUser1'] =$_COOKIE['usuario1'];
    $_SESSION['nomeUser1'] = $_COOKIE['nome1'];
    
 }else{
 if(!isset($_SESSION[nomeUser1])){
    echo "<script> window.location.href=\"../index.php\" </script>";
 }
 if(!isset($_SESSION[emailUser1])){
    echo "<script> window.location.href=\"bloqueio-tela.php\" </script>";
 }else{
    //senão, calculamos o tempo transcorrido
    $dataSalva = $_SESSION["ultimoAcesso1"];
    $agora = date("Y-n-j H:i:s");
    $tempo_transcorrido = (strtotime($agora)-strtotime($dataSalva));

    if($tempo_transcorrido >= 1200) {
     //se passaram 10 minutos ou mais
      echo "
<meta charset=utf-8>
        
      <script> alert('Sua sessão expirou, digite sua senha!'); window.location.href=\"bloqueio-tela.php\" </script>";
      //senão, atualizo a data da sessão
    }else {
    $_SESSION["ultimoAcesso1"] = $agora;
   }
}
 }

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="br">
    <head>
        <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PROCULT - Sistema de Protocolo Secretaria de Cultura</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="../assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="../assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="../assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/visualization/echarts/echarts.js"></script>

	<script type="text/javascript" src="../assets/js/core/app.js"></script>
	<script type="text/javascript" src="../assets/js/pages/user_pages_profile.js"></script>
	<!-- /theme JS files -->
    </head>
    <body>
        <?php include './include/menu.php'; ?>
        <!-- Cover area -->
                            <div class="content">
                              <div class="row">
				<div class="profile-cover">
					<div class="profile-cover-img" style="background-image: url(assets/images/cover.jpg)"></div>
					<div class="media">
						<div class="media-left">
							<a href="#" class="profile-thumb">
								<img src="assets/images/placeholder.jpg" class="img-circle" alt="">
							</a>
						</div>

						<div class="media-body">
				    		<h1>Marquinhos <small class="display-block">Secretaria de Cultura</small></h1>
						</div>

						<div class="media-right media-middle">
							<ul class="list-inline list-inline-condensed no-margin-bottom text-nowrap">
								<li><a href="#" class="btn btn-default"><i class="icon-file-picture position-left"></i> Foto de Capa</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /cover area -->


				<!-- Toolbar -->
				<div class="navbar navbar-default navbar-xs content-group">
					<ul class="nav navbar-nav visible-xs-block">
						<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
					</ul>

					<div class="navbar-collapse collapse" id="navbar-filter">
						
                                                <ul class="nav navbar-nav element-active-slate-400">
							<li><a href="#settings" data-toggle="tab"><i class="icon-cog3 position-left"></i>Informações do Perfil</a></li>
						</ul>
                                                <ul class="nav navbar-nav element-active-slate-400">
							<li><a href="#settings2" data-toggle="tab"><i class="icon-cog3 position-left"></i>Configurações da Conta</a></li>
						</ul>

						<div class="navbar-right">
							<ul class="nav navbar-nav">
								<li class="dropdown">
                                                                                <li><a href="meus_processos.php"><i class="icon-three-bars"></i> Registro de Atividade</a></li>
										</ul>
								</li>
							</ul>
						</div>
					</div>
				</div> 
                                <div class="tab-pane fade" id="settings">

										<!-- Profile info -->
										<div class="panel panel-flat">
											<div class="panel-heading">
												 <legend class="text-bold" class="panel-title" style="color: #696969">Informações do Perfil</legend>
												<div class="heading-elements">
													<ul class="icons-list">
								                		<li><a data-action="collapse"></a></li>
								                		<li><a data-action="reload"></a></li>
								                		<li><a data-action="close"></a></li>
								                	</ul>
							                	</div>
											</div>

											<div class="panel-body">
												<form action="#">
													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<label>Nome do usuário</label>
																<input type="text" value="Eugene" class="form-control">
															</div>
															<div class="col-md-6">
																<label>Nome Completo</label>
																<input type="text" value="Kopyov" class="form-control">
															</div>
														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<div class="col-md-4">
																<label>Cidade</label>
																<input type="text" value="Munich" class="form-control">
															</div>
															<div class="col-md-4">
																<label>Estado</label>
																<input type="text" value="Bayern" class="form-control">
															</div>
															<div class="col-md-4">
																<label>CEP</label>
																<input type="text" value="1031" class="form-control">
															</div>
														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<label>Email</label>
																<input type="text" readonly="readonly" value="eugene@kopyov.com" class="form-control">
															</div>
															<div class="col-md-6">
									                            <label>País</label>
									                            <select class="select">
									                                <option value="germany" selected="selected">Brasil</option> 
									                                <option value="france">França</option> 
									                                <option value="spain">Estados Unidos</option> 
									                                
									                            </select>
															</div>
														</div>
													</div>

							                        <div class="form-group">
							                        	<div class="row">
							                        		<div class="col-md-6">
																<label>Telefone</label>
																<input type="text" value="+99-99-9999-9999" class="form-control">
																<span class="help-block">+99-99-9999-9999</span>
							                        		</div>

															<div class="col-md-6">
																<label>Fazer upload de imagem de perfil</label>
							                                    <input type="file" class="file-styled">
							                                    <span class="help-block">Formatos aceitos: GIF , PNG, JPG . Max 2Mb de tamanho de arquivo</span>
															</div>
							                        	</div>
							                        </div>

							                        <div class="text-right">
							                        	<button type="submit" class="btn btn-primary">Salvar<i class="icon-arrow-right14 position-right"></i></button>
							                        </div>
												</form>
											</div>
										</div>
										<!-- /profile info -->
                                                                            <div class="tab-pane fade" id="settings2">

										<!-- Account settings -->
										<div class="panel panel-flat">
											<div class="panel-heading">
												 <legend class="text-bold" class="panel-title" style="color: #696969">Configurações da Conta</legend>
												<div class="heading-elements">
													<ul class="icons-list">
								                		<li><a data-action="collapse"></a></li>
								                		<li><a data-action="reload"></a></li>
								                		<li><a data-action="close"></a></li>
								                	</ul>
							                	</div>
											</div>

											<div class="panel-body">
												<form action="#">
													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<label>Nome do usuário</label>
																<input type="text" value="Kopyov" readonly="readonly" class="form-control">
															</div>

															<div class="col-md-6">
																<label>Senha atual</label>
																<input type="password" value="password" readonly="readonly" class="form-control">
															</div>
														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<label>Nova senha</label>
																<input type="password" placeholder="Enter new password" class="form-control">
															</div>

															<div class="col-md-6">
																<label>Repita a senha</label>
																<input type="password" placeholder="Repeat new password" class="form-control">
															</div>
														</div>
													</div>

													

							                        <div class="text-right">
							                        	<button type="submit" class="btn btn-primary">Salvar<i class="icon-arrow-right14 position-right"></i></button>
							                        </div>
                                                                                 </form>
                                                                                                    	</div>
													</div>
                                                                                                        
					
						                        
											</div>
                                                                                </div>
										
                                                                                                        <!-- Footer -->
                                                                                      			<div class="footer text-muted">
                                                                                                         &copy; 2015. Limitless Web App Kit and Equipe CEU 2016
                                                                                                        </div>
					<!-- /footer -->                
                              </div>
                            </div>
                            
                                                                                                                   

    </body>
</html>
