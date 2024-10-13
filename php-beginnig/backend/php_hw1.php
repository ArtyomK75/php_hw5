<?php
    $a = 3;
    echo ' $a = ' . $a . "<br>";

    $a = 10;
    $b = 2;
    echo ' $a + $b = ' . ($a + $b) . "<br>";
    echo ' $a - $b = ' . ($a - $b) . "<br>";
    echo ' $a * $b = ' . ($a * $b) . "<br>";
    echo ' $a / $b = ' . ($a / $b) . "<br>";

    $c=15;
    $d=2;
    $result = $c + $d;
    echo ' $result = ' . $result . "<br>";

    $a = 10;
    $b = 2;
    $c = 5;
    echo ' $a + $b + $c = ' . ($a + $b + $c) . "<br>";

    $a = 17;
    $b = 10;
    $c = $a - $b;
    $d = 7;
    $result = $c + $d;
    echo ' $result = ' . $result . "<br>";

    $text = 'Привіт, Світ!';
    echo $text . "<br>";

    $text1 = 'Привіт, ';
    $text2 = 'Світ!';
    echo $text1 . "Мир!" . "<br>";

    $text = "Привіт, Світ!";
    echo $text . "<br>";

    $text1 = 'Привіт, ';
    $text2 = 'Світ!';
    echo $text1 . 'Мир!' . "<br>";

    $name = 'Артем';
    echo "Привіт, $name!<br>";

    $age = 30;
    echo "Мені $age років!<br>";

    $text = 'abcde';
    echo "$text[0], $text[2], $text[4]<br>";

    $text[0] = '!';
    echo "$text<br>";

    $num = '12345';
    $sum = $num[0] + $num[1] + $num[2] + $num[3] + $num[4];
    echo "$sum<br>";

    $secondsInHour = 60 * 60;
    $secondsInDay = $secondsInHour * 24;
    $secondsInMonth = $secondsInDay * 30;

    echo 'Seconds in hour: ' . $secondsInHour . '<br>';
    echo 'Seconds in day: ' . $secondsInDay . '<br>';
    echo 'Seconds in month: ' . $secondsInMonth . '<br>';

    $hour = date('H');
    $minute = date('i');
    $second = date('s');
    echo $hour . ':' . $minute . ':' . $second . "<br>";

    $num = 5;
    echo $num * $num . "<br>";

    $var = 47;
    $var += 7;
    $var -= 18;
    $var *= 10;
    $var /= 20;
    echo $var . "<br>";

    $text = 'Я';
    $text .= ' хочу';
    $text .= ' знати';
    $text .= ' PHP!';
    echo $text . "<br>";

    $var = 10;
    $var++;
    $var++;
    $var--;
    echo $var . "<br>";

    $var = 10;
    $var += 7;
    $var++;
    $var--;
    $var += 12;
    $var *= 7;
    $var -= 15;
    echo $var . "<br>";

    $arr = ['a', 'b', 'c'];
    var_dump($arr);
    echo "<br>";

    echo "$arr[0], $arr[1], $arr[2]<br>";

    $arr = ['a', 'b', 'c', 'd'];
    echo "$arr[0]+$arr[1], $arr[2]+$arr[3]<br>";

    $arr = [2, 5, 3, 9];
    $result = ($arr[0] * $arr[1]) + ($arr[2] * $arr[3]);
    echo $result . "<br>";

    $arr[] = 1;
    $arr[] = 2;
    $arr[] = 3;
    $arr[] = 4;
    $arr[] = 5;
    var_dump($arr);
    echo "<br>";

    $arr = ['a' => 1, 'b' => 2, 'c' => 3];
    echo $arr['c'] . "<br>";

    $arr = ['a' => 1, 'b' => 2, 'c' => 3];
    echo $arr['a'] + $arr['b'] + $arr['c'] . "<br>";

    $arr = ['Коля' => '1000$', 'Вася' => '500$', 'Петя' => '200$'];
    echo 'Петя: ' . $arr['Петя'] . ', Коля: ' . $arr['Коля'] . "<br>";

    $arr = [1 => 'Понеділок', 2 => 'Вівторок', 3 => 'Середа', 4 => 'Четвер', 5 => 'П’ятниця', 6 => 'Субота', 7 => 'Неділя'];
    $day = 3;
    echo $arr[$day] . "<br>";

    $arr = [
        'cms' => ['joomla', 'wordpress', 'drupal'],
        'colors' => ['blue' => 'блакитний', 'red' => 'червоний', 'green' => 'зелений']
    ];
    echo $arr['cms'][0] . ', ' . $arr['cms'][2] . ', ' . $arr['colors']['green'] . ', ' . $arr['colors']['red'] . "<br>";

    $arr = [
        'ua' => ['Понеділок', 'Вівторок', 'Середа', 'Четвер', 'П’ятниця', 'Субота', 'Неділя'],
        'en' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
    ];
    echo $arr['ua'][0] . ', ' . $arr['en'][2] . "<br>";

    $lang = 'ua';
    $day = 3;
    echo $arr[$lang][$day - 1];