<!DOCTYPE html>
<html lang="en">
<head>
    <title>Лабораторная работа 4</title>

</head>
<body>
Лабораторная работа 4
<form method="post">
    <textarea style = "width: 200px; height: 120px;" id="matrix" name = "matrix" placeholder="Введите матрицу"><?=$_POST['matrix']?></textarea><br>
    Начальная вершина
    <input  type = "text" name = "start"  value = '<?= $_POST[start]?>'><br>
    Конечная вершина
    <input  type = "text" name = "end"  value = '<?= $_POST[end]?>'><br>
    <input type="submit" value="Рассчитать">
</form>

<?php

if ($_POST[start] == "" ){
    exit('Введите первую вершину');
}
if ($_POST[end] == ""){
    exit('Введите вторую вершину');
}
$start = $_POST[start] - 1;
$end = $_POST[end] - 1;
$matrix = explode("\r\n", trim($_POST[matrix], " "));
for($i = 0; $i < count($matrix); $i++) {
    $matrix[$i] = explode(" ", $matrix[$i]);
    if (count($matrix) != count($matrix[$i])) {
        exit('Матрица введена неверно');
    }
}
for ($i = 0; $i < count($matrix); $i++) {
    $metka[$i] = 999;
}
$minindex = $start;
$index[0] = $start;
$metka[$minindex] = 0;
while ($minindex != -999) { 
    for ($i = 0; $i < count($matrix); $i++) {
        if (!array_search($i, $index) && $matrix[$minindex][$i] != '0') { 
            $temp = $metka[$minindex] + $matrix[$minindex][$i];
            if ($metka[$i] > $temp) {
                $metka[$i] = $temp;
            }
        }
    }
    $minindex = -999;
    $minmetka = 999;
    for ($i = 0; $i < count($matrix); $i++)  {
        $bool = true;
        for ($j = 0; $j < count($index); $j++) {
            if ($i == $index[$j]) {
                $bool = false;
            }
        }
        if ($bool) {
            if ($minmetka > $metka[$i]) {
                $minmetka = $metka[$i];
                $minindex = $i;
            }
        }
    }

    if ($minindex >= 0) {
        array_push($index,$minindex);
    }
}
echo('Кратчайший путь: ' . $metka[$_POST[end]-1]);
?>

</body>
</html>