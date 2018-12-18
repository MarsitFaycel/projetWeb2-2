<?php


/**
 *
 */
class Email
{
  public $adressDestination;//addAddress
  public $titre;//subject
  public $msg;//body
  public $chemin;//file
  public $nom;//nom fichier

  public function __construct($adressDestination,$titre,$msg,$chemin,$nom) {
      $this->adressDestination= $adressDestination;
      $this->titre=$titre;
      $this->msg=$msg;
      $this->chemin=$chemin;
      $this->nom=$nom;

  }


public function envoye(){

require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
require '/usr/share/php/libphp-phpmailer/class.smtp.php';
$mail = new PHPMailer;
$mail->setFrom('admin@example.com');
$mail->addAddress($this->adressDestination);
$mail->Subject = $this->titre;//sujet
$mail->Body = $this->msg;//text
$mail->addStringAttachment(file_get_contents($this->chemin), $this->nom);//atacher image
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl';
$mail->Host = 'ssl://smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Port = 465;

//Set your existing gmail address as user name
$mail->Username = 'projetWeb19@gmail.com';

//Set the password of your gmail address here
$mail->Password = 'boudenmarsit2018';
if(!$mail->send()) {
  echo 'Email is not sent.';
  echo 'Email error: ' . $mail->ErrorInfo;
} else {
  echo 'Email has been sent.';
}
}
}
?>
