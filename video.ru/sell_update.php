<?php
    
    $data = [
        "sell_update_id_sell" => $_POST['sell_update_id_sell'],
        "sell_update_id_product" => $_POST['sell_update_id_product'],
        "sell_update_date" => $_POST['sell_update_date'],
        "sell_update_count" => $_POST['sell_update_count'],
        "sell_update_summ" => $_POST['sell_update_summ']
    ];



$connection = mysqli_connect("127.0.0.1","root","root", "disk");


if ($connection==false) // Если дескриптор равен 0 соединение не установлено

{

echo("<P>В настоящий момент сервер базы данных не доступен, поэтому

корректное отображение страницы невозможно.</P>");

exit();

} 
    $sql = 'UPDATE sell SET id_product = '  . $data["sell_update_id_product"] . ', date = "' . $data["sell_update_date"]  . '",count = ' . $data["sell_update_count"] . ', summ = ' . $data["sell_update_summ"]  . ' WHERE id_sell = ' . $data["sell_update_id_sell"];
    
    $result = mysqli_query($connection, $sql);
    var_dump($sql);
?>