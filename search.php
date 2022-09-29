<?php
  $host = 'localhost';  // Хост, у нас все локально
  $user = 'root';    // Имя созданного вами пользователя
  $pass = ''; // Установленный вами пароль пользователю
  $db_name = 'RIA';   // Имя базы данных
  $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

// исправить--------------------------------------------------------------------------------------------------
  
  // Ругаемся, если соединение установить не удалось
  if (!$link) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
  }

  
  // $sql = mysqli_query($link, 'SELECT `id`, `model`, `link` FROM `sofa_bed_chair`');
  // while ($result = mysqli_fetch_array($sql)) {
  //   echo "<a href = {$result['link']}>{$result['model']}<br>";
  // }


  // Получаем запрос
  $inputSearch = $_REQUEST['search']; 
   


  // Создаём SQL запрос
  $sql = "SELECT * FROM `sofa_bed_chair` WHERE `model` = '$inputSearch'";
   
  // echo $sql;

  $result = $link -> query($sql);

function doesItExist(array $arr) {
    // Создаём новый массив
    $data = array(
        'model' => $arr['model'] != false ? $arr['model'] : 'Нет данных',
    );
    return $data; // Возвращаем этот массив
}

function countPeople($result) { 
    // Проверка на то, что строк больше нуля
    if ($result -> num_rows > 0) {
        // Цикл для вывода данных
        while ($row = $result -> fetch_assoc()) {
            // Получаем массив с строками которые нужно выводить
            $arr = doesItExist($row);
            // Вывод данных
             echo "Результаты поиска: "."<a  href='$row[link]' style='color:green; text-transform: capitalize ; text-decoration: underline;'> $row[model]</a>";
        }
    // Если данных нет
    } else {
        echo "Введите корректный запрос. <i> Например: Лидер 2 угловой. </i>" . '<br>' . "Писать нужно только модель или категорию отдельно.";
    }

}

?>

