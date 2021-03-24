<?php
    
    $data = [
        "postup_update_id_postup" => $_POST['postup_update_id_postup'],
        "postup_update_id_product" => $_POST['postup_update_id_product'],
        "postup_update_date" => $_POST['postup_update_date'],
        "postup_update_number" => $_POST['postup_update_number'],
        "postup_update_postav" => $_POST['postup_update_postav'],
        "postup_update_count" => $_POST['postup_update_count'],
        "postup_update_summ" => $_POST['postup_update_summ']
    ];



$connection = mysqli_connect("127.0.0.1","root","root", "disk");


if ($connection==false) // Если дескриптор равен 0 соединение не установлено

{

echo("<P>В настоящий момент сервер базы данных не доступен, поэтому

корректное отображение страницы невозможно.</P>");

exit();

} 
    $sql = 'UPDATE postup SET id_product = '  . $data["postup_update_id_product"] . ', date = "' . $data["postup_update_date"] . '", number = '  . $data["postup_update_number"] . ',postav = "' . $data["postup_update_postav"] . '",count = ' . $data["postup_update_count"] . ', summ = ' . $data["postup_update_summ"]  . ' WHERE id_postup = ' . $data["postup_update_id_postup"];
    
    $result = mysqli_query($connection, $sql);
    var_dump($sql);
?>