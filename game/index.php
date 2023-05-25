<!DOCTYPE html>
<html>
<head>
    <title>Game with CSS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <table>
        <?php
        function display($a)
        {
            echo "<tr>";
            for ($i = 7; $i >= 5; $i--) {
                echo "<td>" . $a[$i] . "</td>";
            }
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . $a[0] . "</td>";
            echo "<td>" . $a[8] . "</td>";
            echo "<td>" . $a[4] . "</td>";
            echo "</tr>";
            echo "<tr>";
            for ($i = 1; $i <= 3; $i++) {
                echo "<td>" . $a[$i] . "</td>";
            }
            echo "</tr>";
        }

        $arr1 = array();
        $arr2 = array();
        for ($i = 0; $i < 9; $i++) {
            array_push($arr1, 0);
            array_push($arr2, 0);
        }
        $pos1 = 0;
        $pos2 = 0;
        while ($arr1[8] == 0 && $arr2[8] == 0) {
            $dice1 = rand(1, 3);
            $dice2 = rand(1, 3);
            if (8 - $pos1 >= $dice1 && 8 - $pos2 >= $dice2) {
                if (($pos1 + $dice1) != 4 && ($pos2 + $dice2) != 4) {
                    $arr1[$pos1] = 0;
                    $arr2[$pos2] = 0;
                    $pos1 += $dice1;
                    if ($pos1 == $pos2) {
                        $pos2 = 0;
                        $pos2 += $dice2;
                    } else {
                        $pos2 += $dice2;
                    }
                    $arr2[$pos2] = 0;
                    if ($pos2 == $pos1) {
                        $pos1 = 0;
                    }
                } else {
                    $arr1[$pos1] = 0;
                    $pos1 += $dice1;
                    $arr2[$pos2] = 0;
                    $pos2 += $dice2;
                }
            }
            $final = [0, 0, 0, 0, 0, 0, 0, 0, 0];
            $arr1[$pos1] = 1;
            $arr2[$pos2] = 2;
            for ($i = 0; $i < 8; $i++) {
                if ($pos1 == 4 && $pos2 == 4) {
                    $final[4] = 12;
                } else {
                    $final[$i] = $arr1[$i] + $arr2[$i];
                }
            }
            display($final);
        }
        ?>
    </table>
    <br>
    <strong>Final position array (Player 1):</strong>
    <table>
        <?php display($arr1); ?>
    </table>
    <br>
    <strong>Final position array (Player 2):</strong>
    <table>
        <?php display($arr2); ?>
    </table>
</body>
</html>
