<?php
    
    $data = [
        "update_id_product" => $_POST['update_id_product'],
        "update_janr" => $_POST['update_janr'],
        "update_name" => $_POST['update_name'],
        "update_ispol" => $_POST['update_ispol'],
        "update_year" => $_POST['update_year'],
        "update_country" => $_POST['update_country']
    ];



$connection = mysqli_connect("127.0.0.1","root","root", "disk");


if ($connection==false) // Если дескриптор равен 0 соединение не установлено

{

echo("<P>В настоящий момент сервер базы данных не доступен, поэтому

корректное отображение страницы невозможно.</P>");

exit();

} 
    $sql = 'UPDATE product SET janr = ' . '"' . $data["update_janr"] . '"' . ',' . 'name = "' . $data["update_name"] . '",' . 'author = "' . $data["update_ispol"] . '"' . ', year = ' . $data["update_year"] . ',' . 'country = "' . $data["update_country"] . '"' . ' WHERE id_product = ' . $data["update_id_product"];
    
    $result = mysqli_query($connection, $sql);
    var_dump($sql);
?>