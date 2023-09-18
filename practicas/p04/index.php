<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN”
“http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang= "es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Practica 4: Manejo de variables con PHP </title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    ?>
     <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una
    secuencia compuesta por:</p>
    <p>impar, par, impar</p>
    <p>Estos números deben almacenarse en una matriz de Mx3, donde M es el número de filas y
    3 el número de columnas. Al final muestra el número de iteraciones y la cantidad de
    números generados:</p>
    <?php
        $ban=true;
        $total_num=0;
        $iteraciones=0;
        do{
            $numero1 = rand(1, 999);
            $numero2 = rand(1, 999);
            $numero3 = rand(1, 999);
            $iteraciones ++;
            $total_num += 3;

            $numeros_alt[] = [$numero1, $numero2, $numero3] ;

            if ($numero1 % 2 != 0 && $numero2 % 2 == 0 && $numero3 % 2 != 0) {
                $ban=false; 
            }
        }
        while ($ban); 
        //foreach recorrer el array, la cual son los elementos de fila que contiene los elementos de numeros_alt[]
        foreach ($numeros_alt as $fila) {
            //implode concatena los elementos en fila en este caso los array y son separados con br
            echo implode("  ", $fila) . "<br>";
        }
        echo "Número de iteraciones: $iteraciones<br>";
        echo "Total de números generados: $total_num<br>"
    ?>
     <h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
    pero que además sea múltiplo de un número dado.</p>
    <p>Crear una variante de este script utilizando el ciclo do-while.</p>
    <p>El número dado se debe obtener vía GET.</p>

    <?php
     if (isset($_GET['numero2'])) {
        $num = $_GET['numero2'];


        $numeroalt = rand(1, 100); 

        echo "Número aleatorio generado: $numeroalt <br>";
        echo "Número Ingresado: $num <br> ";

        $esMultiplo = true;

        do {
            if ($num % $numeroalt === 0) {
                $esMultiplo = false;
                echo "<p>$num es un múltiplo de $numeroalt</p>";
            }
            else{
                $numeroalt = rand(1, 100);
            }

        } while ($esMultiplo);
    }

    ?>
    

</body>
</head>