<?php

// задача решена с использованием треугольных чисел
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);




$matrix = array(array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9),
    array(10, 11, 12),);


    
function getNumRectangles($array) {
    if (getCountArr($array, $level = -1, $deep = array('find' => false, 'level' => 0))['level'] > 1) {
        $numVerticalRect = '';
        $numHorizontRect = '';
        $finalNumHorizontRect = '';
        $finalNumVertRect = '';
        $comonRezVertRect = '';
        $comonRezNumHorizRect = '';

    foreach ($array as $key=>$value) {
        for ($i = 1; $i<=$key; $i++) {
            $numVerticalRect = $i;
        }
        $numHorizontRect = count($value) - 1;
        // print_r(implode(" ",$value) . "<br>"); // просмотр матрицы
    }
    
        // определяем количество горизональних прямоугольников
        $finalNumHorizontRect = getNumHorizontRectangles($numHorizontRect);

        //определяем общее число горизонтальных прямоугольников
        //умножаем количество горизонтальных прямоугольников в одном этаже на количество этажей матрицы
        $comonRezNumHorizRect = $finalNumHorizontRect * $numVerticalRect;
        
        //определяем общее число вертикальных прямоугольников
        $comonRezVertRect = ($numVerticalRect-1) * $finalNumHorizontRect;

        $total = $comonRezVertRect + $comonRezNumHorizRect;
        return $total;
    } else {
        return false;
    }
}


// определение уровня вложености
function getCountArr($arr , $level = -1, $deep = array('find' => false, 'level' => 0)) {
    $level++;
    if (sizeof($arr)) {
        foreach ($arr as $key=>$val) {
            $deep = array('find' => true,'level'  => $level+1);
            
            if (is_array($val)) {
                $deep = getCountArr($val, $level, $deep ); break;
            }   
        }
        return $deep;
    } else {
        return false;
    }
    
}

//получение числа горизонтальных прямоугольников на одном этаже
function getNumHorizontRectangles($n) {
    $finalNumHorizontRect = $n*($n+1);
    $finalNumHorizontRect = $finalNumHorizontRect/2;
    return $finalNumHorizontRect;
}

$total = getNumRectangles($matrix);
//вывод количества
echo $total;