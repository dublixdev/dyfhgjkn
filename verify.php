<?php 

include_once __DIR__.'/open-budget-inshaallah.php';

$open = new OpenBudget();

extract($_POST);

$open->setID($id);
$open->setNumber($phone);

$is_create_room = $open->verify($otpCode,$grToken);

if($is_create_room)
{
    $open->saveHtmlToFile($is_create_room,$id.'.html');
    
header("location: page/".$id.".html");
}else
{
echo json_encode([
          'ok'=>false
        ]);
}