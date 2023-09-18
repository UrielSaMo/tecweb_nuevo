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
    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’
    a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
    el valor en cada índice. Es decir:</p>
    <pre>
        [97] => a
        [98] => b
        [99] => c
    </pre>
    <p>Crea el arreglo con un ciclo for</p>
    <p>Lee el arreglo y crea una tabla en XHTML con echo y un ciclo foreach</p>
    <?php

        $arreglo = array();

        for ($c_ascii = 97; $c_ascii <= 122; $c_ascii++) {
            //chr() se usa para convertir un número  de código ASCII (que se encuentra en $arreglo) en el carácter correspondiente. 
            $arreglo[$c_ascii] = chr($c_ascii); 
        }

        echo '<table border="1">';
        echo "<tr>";
        echo '<td>Índice</td><td>Letra </td>';
        echo "</tr>";
        foreach ($arreglo as $arr_indice => $arreglo) {
            echo "<tr>";
            echo "<td>$arr_indice</td><td>$arreglo</td>";
            echo "</tr>";
        }

        echo '</table>';
    ?>
     <h2>Ejercicio 5</h2>
    <p>Usar las variables $edad y $sexo en una instrucción if para identificar una persona de
    sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de
    bienvenida apropiado. Por ejemplo: </p>
    <p>Bienvenida, usted está en el rango de edad permitido.</p>
    <p>En caso contrario, deberá devolverse otro mensaje indicando el error.</p>
    <p>Los valores para $edad y $sexo se deben obtener por medio de un formulario en
    HTML.</p>
    <p>Utilizar el la Variable Superglobal $_POST (revisar documentación).</p>

    <form action="index.php" method="post">
        <label for="edad">Indique su edad: </label>
        <input type="number" id="edad" name="edad">
        <br>
        <label for="sexo">Indique su sexo: </label>
        <input type="text" id="sexo" name="sexo">
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $edad = ($_POST["edad"]);
        $sexo = ($_POST["sexo"]);

        if($edad >= 18 && $edad <= 35 && $sexo == "femenino"){
            echo "Bienvenida, usted está en el rango de edad permitido.<br>";
        }
        else{
            echo "ERROR <br>";
        }
        echo "Edad: $edad<br>";
        echo "Sexo: $sexo<br>";
    }
    ?>
</body>
</head>