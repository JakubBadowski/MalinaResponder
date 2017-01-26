<?php

// Możliwość ustawienia interwału czasowego. Uwaga! Poniżej 1 s radykalniewzrasta zyżycie procesora! 
if ($argc === 2) {
	$interval = $argv[1];
} else {
	$interval = 1;
}

// Komunikat powitalny 
echo "Pętla nieskończona z interwałem $interval s. Ctrl+C kończy!" . PHP_EOL;

// Pętla nieskończona
while (true) {

	// 
	if (false !== $order = getOrder()) {
		echo $order . PHP_EOL;
	}

	sleep($interval);
}

// Funkcja sprawdza czy jest rozkaz, jeśli tak zwraca nazwę rozkazu, w przeciwnym razie zwraca false
function getOrder()
{
	// Pobranie danych z serwisu
	$data = file_get_contents('http://localhost:9000');
	$data = json_decode($data);

	if (isset($data->order)) {
		// Tutaj tyko logujemy dane, ale mając nazwę rozkazu możemy odpowiednio zareagować (włączyć coś) lub/i odpowiedzieć danymi 
		return $data->order;
	} else {
		return false;
	}
}

// echo getTempInSalon > orders.txt

 ?>