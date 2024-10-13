<?php
    $testFile = fopen('./storage/test.txt', 'w');
    fwrite($testFile, 'Hello Palmo');
    fclose($testFile);
    $testFile = fopen('./storage/test.txt', 'r');
    $text = fread($testFile, filesize('./storage/test.txt'));
    fclose($testFile);
    echo $text;
    echo "</br>";

    $testFile = fopen('./storage/test2.txt', 'w');
    fwrite($testFile, '');
    fclose($testFile);
    unlink('./storage/test2.txt');
    $testDir = './storage/TestDir';
    $arr = ['test1','test2','test3'];
    mkdir($testDir, 0777);
    foreach ($arr as $value) {
        $curDir = $testDir . '/' . $value;
        mkdir($curDir, 0777);
        $fileName = $curDir . '/Hello.txt';
        $testFile = fopen($fileName, 'w');
        fwrite($testFile, 'Hello world');
        fclose($testFile);
        $testFile = fopen($fileName, 'r');
        $text = fread($testFile, filesize($fileName));
        fclose($testFile);
        echo $text;
        echo "</br>";
    }

    function defineProperties($pathFileOrDir) {
        if (is_dir($pathFileOrDir)) {
            return $pathFileOrDir . ' - It`s a directory';
        } elseif (is_file($pathFileOrDir)) {
            return $pathFileOrDir . ' - It`s a file';
        }
        return 'It`s not a file and not a directory';
    }
    echo defineProperties($testDir);
    echo "</br>";
    echo defineProperties('./storage/test.txt');
    echo "</br>";

    echo time();
    echo "</br>";
    echo mktime(0,0,0,3,1,2025);
    echo "</br>";
    echo mktime(0,0,0,12,31);
    echo "</br>";
    echo time() - mktime(13,12,59,3,15,2000);
    echo "</br>";
    echo (time() - mktime(7,23,48)) / 3600;
    echo "</br>";

    echo date( "Y-m-d");
    echo "</br>";
    echo date( "d-m-Y");
    echo "</br>";
    echo date( "d-m-y");
    echo "</br>";
    echo date( "H:i:s");
    echo "</br>";
    echo date( "d.m.Y", mktime(0,0,0,12,12,2025));
    echo "</br>";

    $week = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    $currentDay = date('w');
    echo $week[$currentDay];
    echo "<br>";
    echo "06.06.2006 was : " . $week[date('w', strtotime('2006-06-06'))];
    echo "<br>";
    echo "My birthday was : " . $week[date('w', strtotime('1975-11-05'))];
    echo "</br>";

    $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    echo $month[date('n') - 1];
    echo "<br>";
    echo date('t');
    echo "<br>";
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['year'])) {
        $isLeap = date('L', strtotime('01-01-' . $_POST['year'])) ? 'Leap' : 'no leap';
        echo 'The ' . $_POST['year'] . ' is ' . $isLeap;
        echo "</br>";
    }

?>
<form method="post">
    Input year: <input type="number" name="year" required>
    <input type="submit" value="Check">
</form>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dateInEUFormat'])) {
        $inputDate = $_POST['dateInEUFormat'];
        $dateParts = explode('.', $inputDate);
        $timestamp = mktime(0, 0, 0, $dateParts[1], $dateParts[0], $dateParts[2]);
        echo $week[date('w', $timestamp)];
        echo "</br>";
    }
?>
<form method="post">
    Input date in format (31.12.2025): <input type="text" name="dateInEUFormat" required>
    <input type="submit" value="Day of week is">
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dateInUSFormat'])) {
        $inputDate = $_POST['dateInUSFormat'];
        $dateParts = explode('-', $inputDate);
        $timestamp = mktime(0, 0, 0, $dateParts[1], $dateParts[2], $dateParts[0]);
        echo $month[date('n', $timestamp) - 1];
        echo "</br>";
    }
?>

<form method="post">
    Input date in format (2025-12-31): <input type="text" name="dateInUSFormat" required>
    <input type="submit" value="Month name is">
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date1']) && isset($_POST['date2'])) {
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
        $timestamp1 = strtotime($date1);
        $timestamp2 = strtotime($date2);

        if ($timestamp1 > $timestamp2) {
            echo "$date1 > $date2<br>";
        } elseif ($timestamp1 < $timestamp2) {
            echo "$date1 < $date2<br>";
        } else {
            echo "$date1 = $date2<br>";
        }
    }
?>

<form method="post">
    First date in format (2025-12-31): <input type="text" name="date1" required>
    Second date in format (2025-12-31): <input type="text" name="date2" required>
    <input type="submit" value="Compare dates">
</form>

<?php
$dateStringUS = '2025-12-31';
$dateStringEU = date('d-m-Y', strtotime($dateStringUS));
echo "Date in format '31-12-2025': $dateStringEU<br>";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['datetime'])) {
    $dateTime = $_POST['datetime'];
    $timestamp = strtotime($dateTime);
    echo "Date in format '12:13:59 31.12.2025': " . date('H:i:s d.m.Y', $timestamp);
    echo "</br>";
}
?>

<form method="post">
    Enter date and time in format (2025-12-31T12:13:59): <input type="text" name="datetime" required>
    <input type="submit" value="Change format">
</form>

<?php
$date = '2025-12-31';
$datetime = date_create($date);
date_modify($datetime, '+2 days');
echo "Changed $date add 2 days : " . date_format($datetime, 'Y-m-d');
echo "</br>";
$datetime = date_create($date);
date_modify($datetime, '+1 month +3 days');
echo "Changed $date add 1 month and 3 days : " . date_format($datetime, 'Y-m-d');
echo "</br>";
$datetime = date_create($date);
date_modify($datetime, '+1 year');
echo "Changed $date add 1 year : " . date_format($datetime, 'Y-m-d');
echo "</br>";
$datetime = date_create($date);
date_modify($datetime, '-3 days');
echo "Changed $date -3 days : " . date_format($datetime, 'Y-m-d');
echo "</br>";

$currentTimestamp = time();
$newYearTimestamp = strtotime('next year January 1');
$daysToNewYear = ($newYearTimestamp - $currentTimestamp) / (60 * 60 * 24);
echo "Days to new year: " . ceil($daysToNewYear);
echo "</br>";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['friday13Year'])) {
    $year = (int)$_POST['friday13Year'];
    $fridays = [];
    for ($month = 1; $month <= 12; $month++) {
        $timestamp = strtotime("$year-$month-13");
        if (date('w', $timestamp) == 5) { // 5 - п'ятниця
            $fridays[] = date('Y-m-d', $timestamp);
        }
    }
    echo "Fridays in $year year " . implode(', ', $fridays);
    echo "</br>";
}
?>

<form method="post">
    Enter year for find all 13 fridays: <input type="number" name="friday13Year" required>
    <input type="submit" value="Find fridays">
</form>

<?php
$hundredDaysAgo = strtotime('-100 days');
echo "Day of week 100 days ago: " . $week[date('w', $hundredDaysAgo)] . "<br>";
?>