<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once ('classes/vendor/phpmailer/src/PHPMailer.php');
require_once ('classes/vendor/phpmailer/src/SMTP.php');
require_once ('classes/vendor/phpmailer/src/Exception.php');

    class Email{

        private $mailer;

       public function __construct($host,$username,$senha,$name){


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Load Composer's autoloader
require 'classes/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$this->mailer = new PHPMailer(true);

            //Server settings
            $this->mailer->SMTPDebug = '0';                      //Enable verbose debug output
            $this->mailer->isSMTP();                                            //Send using SMTP
            $this->mailer->Host       = $host;                     //Set the SMTP server to send through
            $this->mailer->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mailer->Username   = $username;                     //SMTP username
            $this->mailer->Password   = $senha;                               //SMTP password
            $this->mailer->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
            $this->mailer->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $this->mailer->setFrom($username,$name);
    
            //Content
            $this->mailer->isHTML(true);       
            $this->mailer->Charset = 'UTF-8';                           //Set email format to HTML
    
}

        public function addAdress ($email,$nome){
            $this-> mailer->addAddress($email, $nome);     

} 
        public function formatarEmail($info){
            $this->mailer->Subject = $info['assunto'];
            $this->mailer->Body = $info ['corpo'];
            $this->mailer->AltBody = strip_tags($info['corpo']);

        }
        public function enviarEmail (){
            if($this->mailer->send()){
                return true;
            }else{
                return false;
            }

        }

    }


?>


       
