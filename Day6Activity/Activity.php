<?php

class Activity
{

    private function setToUpperCase($char) { if ($char >= 'a' && $char <= 'z') return chr(ord($char) - 32); return $char; }

    private function setToLowerCase($char) { if ($char >= 'A' && $char <= 'Z') return chr(ord($char) + 32); return $char; }

    private function countArrayElements($array) { $arrayVal = $array ?? null; $length = 0; if(!$arrayVal){ throw new \InvalidArgumentException("Input array cannot be empty."); } foreach ($array as $item) { $length++; } return $length; }

    private function numToArray($number) { $temp = []; $digits = $number === 0 ? $digits[] = 0 : $temp = []; while ($number > 0) { $digit = $number % 10; $temp[] = $digit; $number = (int)($number / 10); } for ($i = $this->countArrayElements($temp) - 1; $i >= 0; $i--) { $digits[] = $temp[$i]; } return $digits; }
    
    private function multiplyElements($array) { $arrayVal = $array ?? null; $result = 1; if(!$arrayVal){ throw new \InvalidArgumentException("Input array cannot be empty."); } foreach ($array as $items) { $result *= $items; } return $result; }

    private function addAllArray($array) { $sum = 0; foreach ($array as $item) { $sum += $item; } return $sum; }

    private function checkArrayKey($parts){ $arrayLength = $this->countArrayElements($parts); if($arrayLength < 3){ throw new \InvalidArgumentException("Invalid syntax format"); } return $parts[2] . " " . $parts[3] . " " . $parts[0] . " " . $parts[1]; }

    public function minutesConvertToSeconds($numberOfMinutes)
    {
        return ($numberOfMinutes * 60) . ' Seconds';
    }
    
    public function fixImport($statement)
    {
        try{
            $parts = [];
            $word = '';
    
            for ($i = 0; $statement[$i] ?? null; $i++) {
                if ($statement[$i] != ' ') {
                    $word .= $statement[$i];
                } else if ($word != '') {
                    $parts[] = $word;
                    $word = '';
                }
            }
            $parts[] = $word != '' ? $word : '';

            return $this->checkArrayKey($parts);

        }catch(Exception $e){
            return $e->getMessage();
        }
     
    }

    public function alternatingCaps($spongeCase)
    {
        $output = '';
        $isUpperCase = true;

        for ($i = 0; $spongeCase[$i] ?? null; $i++) {

            if ($spongeCase[$i] != ' ' && $isUpperCase) {
                $output .= $this->setToUpperCase($spongeCase[$i]);
                $isUpperCase = !$isUpperCase;
            } else if ($spongeCase[$i] != ' ' && !$isUpperCase) {
                $output .= $this->setToLowerCase($spongeCase[$i]);
                $isUpperCase = !$isUpperCase;
            } else {
                $output .= $spongeCase[$i];
            }
        }

        return $output;
    }
  
    public function bugger($number)
    {
        $times_being_multiplied = 0;
        try{
            while (true) {
                $digits = [];
                $digits = $this->numToArray($number) ?? null;
                $number = $this->multiplyElements($digits);
    
                if ($this->countArrayElements($digits) <= 1)
                    return $times_being_multiplied;
    
                $times_being_multiplied++;
            }
        }catch(Exception $e){
            return $times_being_multiplied;
        }
      
    }

    public function grabNumberSum($string)
    {
        $parts = [];
        $word = '';

        for ($i = 0; true; $i++) {
            $char = $string[$i] ?? null;

            if ($char === null) {
                break;
            }

            if ($char >= '0' && $char <= '9') {
                $word .= $char;
            } else if ($word != '') {
                $parts[] = $word;
                $word = '';
            }
        }

        if ($word != '')
            $parts[] = $word;

        return $this->addAllArray($parts);
    }
}

$Day6 = new Activity();

// echo "<p>" . $Day6->minutesConvertToSeconds(1) . "</p>";

// echo "<p>" . $Day6->fixImport('import object from module_names') . "</p>";

// echo "<p>" . $Day6->alternatingCaps("How are you?") . "</p>";

// echo "<p>" . $Day6->bugger(101) . "</p>";

// echo "<p>" . $Day6->grabNumberSum("aeiou250abc10") . "</p>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="form-con">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
            <p>$minutes <input type="number" value="2" name="minutes-txt">&rarr;<span id="minutes-txt"></span></p>
            <p>$fixImport <input type="text" value="import object from module_name" name="fixImport-txt" class="fixImport-txt">&rarr;<span id="fixImport-txt"></span></p>
            <p>$alternatingCaps = <input type="text" value="OMG this website is awesome!" name="alternatingCaps-txt">&rarr;<span id="alternatingCaps-txt"></span></p>
            <p>$bugger = <input type="number" value="999" name="bugger-txt">&rarr;<span id="bugger-txt"></span></p>
            <p>$grabNumberSum = <input type="text" value="one1two2twenty20" name="grabNumberSum-txt">&rarr;<span id  ="grabNumberSum-txt"></span></p>

            <input type="submit" id="submit" value='submit'>
        </form>

        <?php
                $Day6 = new Activity();
                
               $minutes = $_GET['minutes-txt'] ?? null ? $Day6->minutesConvertToSeconds($_GET['minutes-txt']) : '';
               $fixImport = $_GET['fixImport-txt'] ?? null ? $Day6->fixImport($_GET['fixImport-txt']) : '';
               $alternatingCaps = $_GET['alternatingCaps-txt'] ?? null ? $Day6->alternatingCaps($_GET['alternatingCaps-txt']) : '';
               $bugger = $_GET['bugger-txt'] ?? null ? $Day6->bugger($_GET['bugger-txt']) : '';
               $grabNumberSum = $_GET['grabNumberSum-txt'] ?? null ? $Day6->grabNumberSum($_GET['grabNumberSum-txt']) : '';
        ?>
    </div>

    <script>
            $(document).ready(function(){
                $('#minutes-txt').text('<?php echo $minutes ?>');
                $('#fixImport-txt').text('<?php echo $fixImport ?>');
                $('#alternatingCaps-txt').text('<?php echo $alternatingCaps ?>');
                $('#bugger-txt').text('<?php echo $bugger ?>');
                $('#grabNumberSum-txt').text('<?php echo $grabNumberSum ?>');
            });
    </script>
</body>
</html>