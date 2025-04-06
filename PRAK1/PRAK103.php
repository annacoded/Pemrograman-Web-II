<?php
    $Celcius = 37.841;
    $Fahrenheit = (9/5) * $Celcius + 32;
    $Reamur = (4/5) * $Celcius;
    $Kelvin = $Celcius + 273.15;

    echo "Fahrenheit (F) = " . number_format($Fahrenheit, 4) . "<br>";
    echo "Reamur (R) = " . number_format($Reamur, 4) . "<br>";
    echo "Kelvin (K) = " . number_format($Kelvin, 4) . "<br>" ;
?>