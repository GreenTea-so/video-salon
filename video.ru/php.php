<?php
    
    $data = [
        "add_janr" => $_POST['add_janr'],
        "add_name" => $_POST['add_name'],
        "add_ispol" => $_POST['add_ispol'],
        "add_year" => $_POST['add_year'],
        "add_country" => $_POST['add_country']
    ];


$connection = mysqli_connect("127.0.0.1","root","root", "disk");


if ($connection==false) // Если дескриптор равен 0 соединение не установлено

{

echo("<P>В настоящий момент сервер базы данных не доступен, поэтому

корректное отображение страницы невозможно.</P>");

exit();

} 
    $sql = 'INSERT INTO product(janr, name, author, year, country) VALUES(' . '"' . $data["add_janr"] . '"' . ',' . '"' . $data["add_name"] . '"' . ',' . '"' . $data["add_ispol"] . '"' . ',' . $data["add_year"] . ',' . '"' . $data["add_country"] . '"' . ')';
    
    $result = mysqli_query($connection, $sql);
    var_dump($sql);
?>