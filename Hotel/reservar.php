<?php
require_once "Hotel.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hotel = new Hotel();
    $quarto = $_POST["quarto"];
    $hospede = $_POST["hospede"];
    $dias = $_POST["dias"];

    $mensagem = $hotel->reservarQuarto($quarto, $hospede, $dias);

    header('Content-Type: application/json');
    echo json_encode(["mensagem" => $mensagem]);
}
?>
