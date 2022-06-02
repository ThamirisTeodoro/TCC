
	<section class="banner-container">
	<div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/crianca3.jpg');" class="banner-single"></div><!--banner-single-->
	<div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/verde4.jpg');" class="banner-single"></div><!--banner-single-->
	<div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/verde7.jpg');" class="banner-single"></div><!--banner-single-->

		<div class="overlay"></div>
		<div class="center">

			<form class= "ajax-form" method = "post" >
				<h2>Digite o email para contato</h2>
				<input type="email" name="email" required />
				<input type= "hidden" name = "identificador" value= "form_home"/> 
				<input type="submit" name="acao" value="Cadastrar">
			</form>
		</div>
		<div class="bullets"></div>
	</section>

	<section class="descricao-autor">
		<div class="center">
			<div class="w100 left ">
				<h2 class= "text-center"><img src="<?php echo INCLUDE_PATH ?>images/thamiris.jpeg" /> <?php echo $infoSite ['nome_autor']; ?></h2>
				<p>
				<?php echo $infoSite ['descricao']; ?>
				</p>
			</div>
			<!--
			<div class="w50 left">
				<img class="float right" src="<?php echo INCLUDE_PATH; ?>images/dinheiro2.jpg">
			</div> -->
			<div class ="clear"></div>
		</div>	
	</section>

	<section class="especialidades">
		<div class="center">
	    <h2 class="title">Tópicos Importantes</h2>

			<div class=" w33 left box-especialidade">
				<!--<h3><i class="fa fa-css3" aria-hidden="true"></i></h3> kçkçkçççkçkçk-->
				
				<a href ="<?php echo INCLUDE_PATH; ?>valor" <h3> <img src="<?php echo $infoSite ['image1']; ?>" </h3>
			
				</a>
				<h4><?php echo $infoSite ['titulo_topicos1']; ?></h4>
				<p><?php echo $infoSite ['descricao1']; ?></p>

			</div><!--box-especialidade-->

			<div class=" w33 left box-especialidade">
				<!--<h3><i class="fa fa-html5" aria-hidden="true"></i></h3>-->

				<a href = "investimentos" <h3><img src="<?php echo $infoSite ['image2']; ?>"</h3>
				</a>
				<h4><?php echo $infoSite ['titulo_topicos2']; ?></h4>
				<p><?php echo $infoSite ['descricao2']; ?></p>
			</div><!--box-especialidade-->

			<div class=" w33 left box-especialidade">
				<a href ='<?php echo INCLUDE_PATH; ?>mesada '<h3><img src="<?php echo $infoSite ['image3']; ?>"</h3>
				</a>

				<h4><?php echo $infoSite ['titulo_topicos3']; ?></h4>
				<p><?php echo $infoSite ['descricao3']; ?></p>
			</div><!--box-especialidade-->
			<div class="clear"></div>

		</div>
	</section>

	<section class="extras">
		<div class="center">
				<div id="sobre" class="w50 left sobre-container">
				<h2 class="title">Sobre educação financeira infantil</h2>
				<?php
					$sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.sobre.assunto` ORDER BY order_id ASC LIMIT 3");
					$sql->execute();
					$sobre = $sql->fetchAll();
					foreach ($sobre as $key => $value) {
				?>
				
				<div class="sobre-single">
					<p class="sobre-descricao">"<?php echo $value ['sobre']; ?>"</p>
					<p class="nome-autor"><?php echo $value['nome']; ?> - <?php echo $value['data']; ?> </p>
				</div><!--depoimento-single-->
				<?php } ?>
				
				
			</div><!--w50-->

			<div id="objetivos" class="w50 left Objetivos-container">
				<h2 class="title">Objetivos</h2>
				<div class="objetivos">
					<ul>
					<?php
					$sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.objetivos` ORDER BY order_id ASC LIMIT 4");
					$sql->execute();
					$objetivos = $sql->fetchAll();
					foreach ($objetivos as $key => $value) {
					?>
					<li><?php echo $value['objetivos']; ?></li>
					<?php } ?>
						
					</ul>
				</div><!--objetivos-->
			</div><!--w50-->

			<div class="clear"></div>
		</div><!--center-->
	</section><!--extras-->
