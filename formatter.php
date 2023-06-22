<?php
$number = 87384334;
$formatType = 'en';

 $formatedNumber == "en" ?
          number_format($number, 0, '', ',') :
          preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $number);

echo($formatedNumber);
