<?php 
// Uwierzytelnienie TODO:


// Pobierz rozkaz ze stosu
$order = file_get_contents('orders.txt');
$order = trim($order);

// Jeśli coś jest - wysyłaj
if ($order) {
	$data = ['order' => $order];
	// Usuń rozkaz ze stosu
	file_put_contents('orders.txt', "");
} else {
	$data = [];
}

//Response
header('Content-Type: application/json');
echo json_encode($data);

 ?>