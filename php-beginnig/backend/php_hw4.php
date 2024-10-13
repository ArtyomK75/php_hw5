<?php
function sumOfDigits($num, $start) {
    $digits = str_split($num);
    $sum = 0;
    for ($i = 0; $i < 4; $i++) {
        $sum += $digits[$start + $i];
    }
    return $sum;
}

function isValidNumber($num, $maxSum) {
    $numStr = strval($num);
    $length = strlen($numStr);

    for ($i = 0; $i <= $length - 4; $i++) {
        if (sumOfDigits($numStr, $i) > $maxSum) {
            return false;
        }
    }
    return true;
}

function max_sumDig($nMax, $maxSum) {
    $validNumbers = [];
    $totalSum = 0;

    for ($i = 1000; $i <= $nMax; $i++) {
        if (isValidNumber($i, $maxSum)) {
            $validNumbers[] = $i;
            $totalSum += $i;
        }
    }

    $count = count($validNumbers);

    $average = $totalSum / $count;

    $closest = null;
    $minDiff = PHP_INT_MAX;

    foreach ($validNumbers as $num) {
        $diff = abs($num - $average);
        if ($diff < $minDiff || ($diff == $minDiff && $num < $closest)) {
            $closest = $num;
            $minDiff = $diff;
        }
    }

    return [$count, $closest, $totalSum];
}

print_r(max_sumDig(2000, 3));
echo "</BR>";
print_r(max_sumDig(2000, 4));
echo "</BR>";
print_r(max_sumDig(2000, 7));
echo "</BR>";
print_r(max_sumDig(3000, 7));
echo "</BR>";

//2 task

function crazyRabbit($field) {
    $fieldCells = count($field);
        $position = 1;
        $jumpPower = 0;
        $direction = 1;
        while (true) {
            $jumpPower += $field[$position - 1];
            $field[$position - 1] = 0;

            if (array_sum($field) == 0) {
                return true;
            }

            $nextPosition = 0;
            $distanceToLeftWall = $position;
            $distanceToRightWall = $fieldCells - $position;
            $vector = $jumpPower;

            $distanceToWall = 0;
            $crossTheWall = false;
            if ($direction < 0) {
                $distanceToWall = $distanceToLeftWall;
            } else {
                $distanceToWall = $distanceToRightWall;
            }
            $crossTheWall = $vector > $distanceToWall;

            $wasCrossing = false;
            while ($crossTheWall) {
                $wasCrossing = true;
                if ($direction > 0) {
                    $direction = -1;
                    $vector = $vector -  $distanceToRightWall - 1;
                    $crossTheWall = $vector >= $fieldCells;
                    $distanceToLeftWall = $fieldCells;
                    $distanceToRightWall = 1;
                } else {
                    $direction = 1;
                    $vector = $vector -  $distanceToLeftWall + 1;
                    $crossTheWall = $vector >= $fieldCells;
                    $distanceToRightWall = $fieldCells;
                    $distanceToLeftWall = 1;
                }
            }
            if ($wasCrossing) {
                if ($direction > 0) {
                    $nextPosition = $vector;
                } else {
                    $nextPosition = $fieldCells - $vector;
                }
            } else {
                if ($direction > 0) {
                    $nextPosition = $position + $vector;
                } else {
                    $nextPosition = $position - $vector;
                }
            }
            if ($nextPosition == $position) {
                return false;
            }
            echo "current pos - $position next position - $nextPosition power jump is - $jumpPower direction - " . ($direction === 1 ? "right" : "left");
            echo "</BR>";
            $position = $nextPosition;

        }
}

$field = [2, 2, 4, 1, 5, 2, 7];
echo crazyRabbit($field) ? "All beans are eaten" : "Rabbit is looped";
echo "</BR>";

//3 task

function top_3_words($text) {
    $text = strtolower($text);
    $text = preg_replace("/[^a-z']+/", " ", $text);
    $words = preg_split("/\s+/", $text);
    $wordCount = [];

    foreach ($words as $word) {
        if ($word == '' || $word == "'") {
            continue;
        }
        if (array_key_exists($word, $wordCount)) {
            $wordCount[$word] ++;
        } else {
            $wordCount[$word] = 1;
        }
    }

    arsort($wordCount);

    return array_slice(array_keys($wordCount), 0, 3);
}

print_r(top_3_words("In a village of La Mancha, the name of which I have no desire to call to mind, there lived not long since one of those gentlemen that keep a lance in the lance-rack, an old buckler, a lean hack, and a greyhound for coursing. An olla of rather more beef than mutton, a salad on most nights, scraps on Saturdays, lentils on Fridays, and a pigeon or so extra on Sundays, made away with three-quarters of his income."));
echo "</BR>";
print_r(top_3_words("e e e e DDD ddd DdD: ddd ddd aa aA Aa, bb cc cC e e e"));
echo "</BR>";
print_r(top_3_words("  //wont won't won't"));