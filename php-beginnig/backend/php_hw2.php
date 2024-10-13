<?php
function averageFromArray($numbers) {
    return array_sum($numbers) / count($numbers);
}
echo averageFromArray([1, 2, 3, 4, 5]) . "<br>";

function reverseString($string)
{
    return strrev($string);
}
echo reverseString("Some string") . "<br>";

function increaseByTen($numbers) {
    for ($i = 0; $i < count($numbers); $i++) {
        $numbers[$i] = $numbers[$i] + 10;
    }
    return $numbers;
}
foreach (increaseByTen([1, 2, 3, 4, 5]) as $item) {
    echo $item . "<br>";
}

function countVowels($string) {
    return preg_match_all('/[aeiouAEIOU]/', $string);
}
echo countVowels("This is a test") . "<br>";

function removeDuplicates($array) {
    return array_unique($array);
}
print_r(removeDuplicates([1, 2, 2, 3, 4, 4, 5]));
echo "<br>";

function isPalindrome($word) {
    return $word === strrev($word);
}
echo (isPalindrome("rotor") ? "Yes" : "No") . "<br>";

function evenNumbers($from, $to) {
    $arr = [];
    for ($i = $from; $i <= $to ; $i++) {
        if ($i % 2 === 0) {
            $arr[] = $i;
        }
    }
    return $arr;
}
print_r(evenNumbers(1, 50));
echo "<br>";

function minMax($numbers) {
    return ['min' => min($numbers), 'max' => max($numbers)];
}
print_r(minMax([1, 2, 3, 4, 5]));
echo "<br>";

function sortByKeys($array) {
    ksort($array);
    return $array;
}
print_r(sortByKeys(['b' => 2, 'a' => 1, 'c' => 3]));
echo "<br>";

function factorial($n) {
    return $n <= 1 ? 1 : $n * factorial($n - 1);
}
echo factorial(5) . "<br>";

function primesInRange($start, $end) {
    $primes = [];
    for ($i = $start; $i <= $end; $i++) {
        $isPrime = true;
        for ($j = 2; $j < $i; $j++) {
            if ($i % $j === 0) {
                $isPrime = false;
                break;
            }
        }
        if ($i > 1 && $isPrime) {
            $primes[] = $i;
        }
    }
    return $primes;
}
print_r(primesInRange(1, 50));
echo "<br>";

function mergeWithoutDuplicates($array1, $array2) {
    return array_unique(array_merge($array1, $array2));
}
print_r(mergeWithoutDuplicates([1, 2, 3], [3, 4, 5]));
echo "<br>";

function capitalizeWords($string) {
    return ucwords($string);
}
echo capitalizeWords("it's some test string") . "<br>";


function generatePassword($length) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    return substr(str_shuffle($chars), 0, $length);
}
echo generatePassword(8) . "<br>";

function diagonalSum($matrix) {
    $sum = 0;
    for ($i = 0; $i < count($matrix); $i++) {
        $sum += $matrix[$i][$i];
    }
    return $sum;
}
echo diagonalSum([[1, 2, 3, 4, 5], [4, 5, 6, 7, 8], [7, 8, 9, 10, 11]]) . "<br>";

function removeHtmlTags($string) {
    return strip_tags($string);
}
echo removeHtmlTags("<p>Some text <b>with</b> tags</p>") . "<br>";

function reverseAssocArray($array) {
    return array_flip($array);
}
print_r(reverseAssocArray(['a' => 1, 'b' => 2, 'c' => 3]));
echo "<br>";

function toCamelCase($string) {
    $string = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
    $string[0] = strtolower($string[0]);
    return $string;
}
echo toCamelCase("test_text_in_camel_case") . "<br>";

function isPowerOfTwo($n) {
    return ($n > 0 && ($n & ($n - 1)) === 0);
}
echo (isPowerOfTwo(1024) ? "Yes" : "No") . "<br>";

function sortByKey($array, $key) {
    usort($array, fn($a, $b) => $a[$key] <=> $b[$key]);
    return $array;
}
$objects = [
    ['name' => 'John', 'age' => 30],
    ['name' => 'Jane', 'age' => 25],
    ['name' => 'Doe', 'age' => 35]
];
foreach (sortByKey($objects, 'age') as $item) {
    echo $item . "<br>";
}
