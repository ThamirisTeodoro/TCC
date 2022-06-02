
<?php include ('config.php');?>
<?php Site::updateUsuarioOnline();?>
<?php Site::contador();?>

<?php
	$infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
	$infoSite->execute();
	$infoSite = $infoSite->fetch();
?>


<!DOCTYPE html>
<html>
<head>
    <title><?php echo $infoSite ['titulo']; ?></title>
<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH; ?>estilo/style.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="financeiro,economia,site,infantil">
    <meta name="description" content="Descrição do meu website">
    <meta charset="utf-8" />
</body>
</head>
<body>

        <?php 

            if(isset($_POST['acao']) && $_POST ['identificador']== 'form_home'){
                if($_POST['email'] != ''){
                $email = $_POST ['email'];
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    //Tudo Certo, é um email.
                    //Só Enviar.
                    $mail = new Email ('smtp-mail.outlook.com','educacao-financeira-infantil-teodoro@outlook.com','teste54321','Educacao Financeira');
                    $mail-> addAdress ('thamiristeodoroarruda@gmail.com','Thamiris');
                    $mail-> addAdress ('marcia4229@hotmail.com
                    ','Marcia');
                    $corpo = "E-mail cadastrado na home do site: <hr>$email";
                    $info = array ('assunto'=>'Um novo e-mail cadastrado no site','corpo'=>$email);
                    $mail-> formatarEmail($info);
                    if($mail->enviarEmail()){
                        echo '<script> alert("Enviado com Sucesso.")</script>.';

                    }else{
                        echo '<script> alert("Algo deu Errado.")</script>.';

                    }
                }else{
                    echo '<script> alert("Não é um e-mail válido.")</script>.';
                }
                }else{
                    echo '<script> alert("Campos vazios nao sao permitidos")</script>.';
                }
            } else if(isset($_POST['acao']) && $_POST['identificador']=='form_contato'){

                /*
                    $nome = $_POST['nome'];
                    $email = $_POST['email'];
                    $mensagem = $_POST['mensagem'];
                    $telefone = $_POST['telefone'];
                */
                    $assunto = 'Nova Mensagem do site!';
                    $corpo = '';
                    foreach ($_POST as $key => $value){
                        $corpo.=ucfirst($key).": ".$value ;
                        $corpo.="<hr>";

                    }
                    $info = array('assunto'=>$assunto,'corpo'=>$corpo);
                    $mail = new Email ('smtp-mail.outlook.com','educacao-financeira-infantil-teodoro@outlook.com','teste54321','Educacao Financeira');
                    $mail-> addAdress ('thamiristeodoroarruda@gmail.com','Thamiris');
                    $mail->formatarEmail($info);
                    if($mail->enviarEmail()){
                        echo '<script> alert("Enviado com Sucesso.")</script>.';

                    }else{
                       echo '<script> alert("Algo deu Errado.")</script>.';

                    }
            }

            
            ?>
    <!--acessar texto de acordo com a pagina selecionada -->

    <base base = "<?php echo INCLUDE_PATH; ?>"/>
    <?php
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';

        switch ($url) {
            case 'sobre':
                echo '<target target="sobre" />';
                break;

            case 'objetivos':
                echo '<target target="objetivos" />';
                break;
        }
    ?>



    <!--fim texto de acordo com a pagina selecionada -->
    <header>
        <div class="center">
            <div class="logo left"><a href ="home">Educação</a></div><!--logo-->
            <nav class="desktop right">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>home">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>objetivos">Objetivos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>Painel">Login</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>noticias">Notícias</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>referencia">Referências</a></li>


                </ul>
            </nav>
             <nav class="mobile rigth">
                <div class="botao-menu-mobile">
                <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>home">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>objetivos">Objetivos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>Painel">Login</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>noticias">Notícias</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>referencia">Referências</a></li>


                    
                    
                </ul>
            </nav>
            <div class="clear"></div>
        </div><!--center-->
    </header>


    <div class="container-principal">
	
    <?php

        if(file_exists('pages/'.$url.'.php')){
            include('pages/'.$url.'.php');
        }else{
            //Podemos fazer o que quiser, pois a página não existe.
            if($url != 'sobre' && $url != 'objetivos'){
                $urlPar = explode('/',$url)[0];
                if($urlPar != 'noticias'){
                $pagina404 = true;
                include('pages/404.php');
                }else{
                    include('pages/noticias.php');
                }
            }else{
                include('pages/home.php');
            }
        }

?>

	</div><!--container-principal-->

	<footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
		<div class="center">
			<p><br>Imagens meramente ilustrativas retiradas dos SITES PIXBAY e FREEPIK com certificação CCO<br></p>
		</div><!--center-->
	</footer>

 


    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>
        
    

   
    
            <!--adcmaapa-->
    <?php
        if ($url == 'contato'){

            
    ?>
      <?php } ?>

              <!--fimmaapa-->

      <script src="<?php echo INCLUDE_PATH; ?>pages/jsPages/formulario.js"></script>


      <script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>



      <?php

if(is_array($url) && strstr($url[0],'noticias') !== false) {
?>
<script>
    $(function(){
       //alert('carr');
        $('select').change(function(){
            location.href=include_path+"noticias/"+$(this).val();
        })
    })
    
</script>
<?php
}
?>


    

    

    </body>
</html>
