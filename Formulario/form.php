<?php
   
  $email = "luis.machado@gmail.com";


  function Validaremail ($email) {

if (filter_var($email,FILTER_VALIDATE_EMAIL)){
   return true;
}
else {
  return false;
}
  
if (Validaremail ($email)){
  echo "Email validado com sucesso";
}
 }

 function Validacpf($cpf) {
  $cpf = $_POST['cpf'];
  $cpf= preg_replace('/[^0-9]/', '', $cpf);
  $D1 = 0;
  $D2= 0;

  for ($i=0, $x= 10; $i <=8 ; $i++, $x--) { 
    $D1 += $cpf[$i] *  $x;
  }
  for ($i=0, $x= 11; $i <9 ; $i++, $x--) {
    $D2 += $cpf[$i] * $x;

    if (str_repeat($i, 11) == $cpf) {
      echo "Não Repita!!";
    }
  }
 }