<?php

$dbcnx = mysqli_connect("127.0.0.1","root","root", "disk");

if ($dbcnx==false) // Если дескриптор равен 0 соединение не установлено

{

echo("<P>В настоящий момент сервер базы данных не доступен, поэтому

корректное отображение страницы невозможно.</P>");

exit();

}

?>


<HTML>
<HEAD>
<title>Видеосалон</title>
<script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</HEAD>
<BODY>

<script>
    $(document).ready(function(){
        $('button.add').on('click', function(){
            var add_janr = $('input.add_janr').val()
            var add_name = $('input.add_name').val()
            var add_ispol = $('input.add_ispol').val()
            var add_year = $('input.add_year').val()
            var add_country = $('input.add_country').val()
            console.log(add_janr)
            
            $.ajax({
                method: "POST",
                url: "php.php",
                data: { add_janr: add_janr, add_name: add_name, add_ispol: add_ispol, add_year: add_year, add_country: add_country}
            })
            .done(function(msg) {
               // alert ("Data saved" + msg);
            });
        })
        
        $('button.update').on('click', function(){
            var update_id_product = $('input.update_id_product').val()
            var update_janr = $('input.update_janr').val()
            var update_name = $('input.update_name').val()
            var update_ispol = $('input.update_ispol').val()
            var update_year = $('input.update_year').val()
            var update_country = $('input.update_country').val()
            console.log(update_janr)
            
            $.ajax({
                method: "POST",
                url: "update.php",
                data: {update_id_product: update_id_product, update_janr: update_janr, update_name: update_name, update_ispol: update_ispol, update_year: update_year, update_country: update_country}
            })
            .done(function(msg) {
                //alert ("Data saved" + msg);
            });
        })
        
        $('button.postup_add').on('click', function(){
            var postup_add_id_product = $('input.postup_add_id_product').val()
            var postup_add_date = $('input.postup_add_date').val()
            var postup_add_number = $('input.postup_add_number').val()
            var postup_add_postav = $('input.postup_add_postav').val()
            var postup_add_count = $('input.postup_add_count').val()
            var postup_add_summ = $('input.postup_add_summ').val()
            console.log(postup_add_postav)
            
            $.ajax({
                method: "POST",
                url: "postup_add.php",
                data: { postup_add_id_product: postup_add_id_product, postup_add_date: postup_add_date, postup_add_number: postup_add_number, postup_add_postav: postup_add_postav, postup_add_count: postup_add_count, postup_add_summ: postup_add_summ}
            })
            .done(function(msg) {
               // alert ("Data saved" + msg);
            });
        
    });
        
    $('button.postup_update').on('click', function(){
            var postup_update_id_postup = $('input.postup_update_id_postup').val()
            var postup_update_id_product = $('input.postup_update_id_product').val()
            var postup_update_date = $('input.postup_update_date').val()
            var postup_update_number = $('input.postup_update_number').val()
            var postup_update_postav = $('input.postup_update_postav').val()
            var postup_update_count = $('input.postup_update_count').val()
            var postup_update_summ = $('input.postup_update_summ').val()
            console.log(postup_update_id_postup)
            
            $.ajax({
                method: "POST",
                url: "postup_update.php",
                data: {postup_update_id_postup: postup_update_id_postup ,postup_update_id_product: postup_update_id_product, postup_update_date: postup_update_date, postup_update_number: postup_update_number, postup_update_postav: postup_update_postav, postup_update_count: postup_update_count, postup_update_summ: postup_update_summ}
            })
            .done(function(msg) {
               alert ("Data saved" + msg);
            });
        })
        
        $('button.sell_add').on('click', function(){
            var sell_add_id_product = $('input.sell_add_id_product').val()
            var sell_add_date = $('input.sell_add_date').val()
            var sell_add_count = $('input.sell_add_count').val()
            var sell_add_summ = $('input.sell_add_summ').val()
          
            
            $.ajax({
                method: "POST",
                url: "sell_add.php",
                data: { sell_add_id_product: sell_add_id_product, sell_add_date: sell_add_date, sell_add_count: sell_add_count, sell_add_summ: sell_add_summ}
            })
            .done(function(msg) {
               // alert ("Data saved" + msg);
            });
        
    });
        
    $('button.sell_update').on('click', function(){
            var sell_update_id_sell = $('input.sell_update_id_sell').val()
            var sell_update_id_product = $('input.sell_update_id_product').val()
            var sell_update_date = $('input.sell_update_date').val()
            var sell_update_count = $('input.sell_update_count').val()
            var sell_update_summ = $('input.sell_update_summ').val()
            
            $.ajax({
                method: "POST",
                url: "sell_update.php",
                data: {sell_update_id_sell: sell_update_id_sell ,sell_update_id_product: sell_update_id_product, sell_update_date: sell_update_date,  sell_update_count: sell_update_count, sell_update_summ: sell_update_summ }
            })
            .done(function(msg) {
               // alert ("Data saved" + msg);
            });
        })
    });
    
</script>

<h3>Сведения о произведениях</h3>
<table>
   <tr>
       <td>ID продукта</td>
       <td>Жанр</td>
       <td>Название</td>
       <td>Исполнители</td>
       <td>Год выпуска</td>
       <td>Страна выпуска</td>
   </tr>
    <?php
        $result = mysqli_query($dbcnx, "select * from product");
        
        while ($r1 = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $r1["id_product"]; ?></td>
            <td><?php echo $r1["janr"]; ?></td>
            <td><?php echo $r1["name"]; ?></td>
            <td><?php echo $r1["author"]; ?></td>
            <td><?php echo $r1["year"]; ?></td>
            <td><?php echo $r1["country"]; ?></td>
        </tr>
    <?php
        }
    ?>
</table>
<br>
<input type="text" placeholder="Жанр" class="add_janr">
<input type="text" placeholder="Название" class="add_name">
<input type="text" placeholder="Исполнители" class="add_ispol">
<input type="number" placeholder="Год выпуска" class="add_year">
<input type="text" placeholder="Страна выпуска" class="add_country">
<button class = "add">Добавить</button>

<br>
<br>
<input type ="number" placeholder="ID продукта" class="update_id_product">
<input type="text" placeholder="Жанр" class="update_janr">
<input type="text" placeholder="Название" class="update_name">
<input type="text" placeholder="Исполнители" class="update_ispol">
<input type="number" placeholder="Год выпуска" class="update_year">
<input type="text" placeholder="Страна выпуска" class="update_country">
<button class = "update">Изменить</button>
    
<h3>Сведения о поступлении видеокассет и дисков</h3>
<table>
   <tr>
       <td>ID поступления</td>
       <td>ID продукта</td>
       <td>Дата поступления</td>
       <td>Номер документа</td>
       <td>Сведения о поставщике</td>
       <td>Количество поставляемых дисков</td>
       <td>Сумма поступления</td>
   </tr>
    <?php
        $result2 = mysqli_query($dbcnx, "select * from postup");
        
        while ($r2 = mysqli_fetch_assoc($result2)){
        ?>
        <tr>
            <td><?php echo $r2["id_postup"]; ?></td>
            <td><?php echo $r2["id_product"]; ?></td>
            <td><?php echo $r2["date"]; ?></td>
            <td><?php echo $r2["number"]; ?></td>
            <td><?php echo $r2["postav"]; ?></td>
            <td><?php echo $r2["count"]; ?></td>
            <td><?php echo $r2["summ"]; ?></td>
        </tr>
    <?php
        }
    ?>
</table>

<br>
<input type ="number" placeholder="ID продукта" class="postup_add_id_product">
<input type="text" placeholder="Дата поступления" class="postup_add_date">
<input type="text" placeholder="Номер документа" class="postup_add_number">
<input type="text" placeholder="Сведения о поставщике" class="postup_add_postav">
<input type="number" placeholder="Количество дисков" class="postup_add_count">
<input type="number" placeholder="Сумма поступления" class="postup_add_summ">
<button class = "postup_add">Добавить</button>
    
<br>
<br>
<input type ="number" placeholder="ID поступления" class="postup_update_id_postup">
<input type ="number" placeholder="ID продукта" class="postup_update_id_product">
<input type="text" placeholder="Дата поступления" class="postup_update_date">
<input type="text" placeholder="Номер документа" class="postup_update_number">
<input type="text" placeholder="Сведения о поставщике" class="postup_update_postav">
<input type="number" placeholder="Количество дисков" class="postup_update_count">
<input type="text" placeholder="Сумма поступления" class="postup_update_summ">
<button class = "postup_update">Изменить</button>
    
    
<h3>Сведения о продажах видеокассет и дисков</h3>
<table>
   <tr>
       <td>ID продажи</td>
       <td>ID продукта</td>
       <td>Дата поступления</td>
       <td>Количество поставляемых дисков</td>
       <td>Сумма поступления</td>
   </tr>
    <?php
        $result3 = mysqli_query($dbcnx, "select * from sell");
        
        while ($r3 = mysqli_fetch_assoc($result3)){
        ?>
        <tr>
            <td><?php echo $r3["id_sell"]; ?></td>
            <td><?php echo $r3["id_product"]; ?></td>
            <td><?php echo $r3["date"]; ?></td>
            <td><?php echo $r3["count"]; ?></td>
            <td><?php echo $r3["summ"]; ?></td>
        </tr>
    <?php
        }
    ?>
</table>
    
<br>
<input type ="number" placeholder="ID продукта" class="sell_add_id_product">
<input type="text" placeholder="Дата поступления" class="sell_add_date">
<input type="number" placeholder="Количество дисков" class="sell_add_count">
<input type="number" placeholder="Сумма продажи" class="sell_add_summ">
<button class = "sell_add">Добавить</button>
    
<br>
<br>
<input type ="number" placeholder="ID продажи" class="sell_update_id_sell">
<input type ="number" placeholder="ID продукта" class="sell_update_id_product">
<input type="text" placeholder="Дата поступления" class="sell_update_date">
<input type="number" placeholder="Количество дисков" class="sell_update_count">
<input type="text" placeholder="Сумма поступления" class="sell_update_summ">
<button class = "sell_update">Изменить</button>
    
</BODY>
</HTML>