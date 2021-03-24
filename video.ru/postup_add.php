<?php
    
    $data = [
        "postup_add_id_product" => $_POST['postup_add_id_product'],
        "postup_add_date" => $_POST['postup_add_date'],
        "postup_add_number" => $_POST['postup_add_number'],
        "postup_add_postav" => $_POST['postup_add_postav'],
        "postup_add_count" => $_POST['postup_add_count'],
        "postup_add_summ" => $_POST['postup_add_summ']
    ];


$connection = mysqli_connect("127.0.0.1","root","root", "disk");


if ($connection==false) // Если дескриптор равен 0 соединение не установлено

{

echo("<P>В настоящий момент сервер базы данных не доступен, поэтому

корректное отображение страницы невозможно.</P>");

exit();

} 
    $sql = 'INSERT INTO postup(id_product, date, number, postav, count, summ) VALUES('  . $data["postup_add_id_product"]  . ',' . '"' . $data["postup_add_date"] . '"' . ','  . $data["postup_add_number"]  . ', "' . $data["postup_add_postav"] . '",' . $data["postup_add_count"] . ',' . $data["postup_add_summ"] . ')';
    
    $result = mysqli_query($connection, $sql);
    var_dump($sql);
?>