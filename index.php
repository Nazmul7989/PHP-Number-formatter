<? php
  $value = 2724242422;
  $formatType = "en";

   public function formatNumber($value, $formatType)
    {
        $number = $this->makeStringToNumber($value);

        if ($formatType == 'en') {
          //For English format (Inserting comma before each thee digits from last side)
            $digitCount = strlen($number);
            $result = $digitCount / 3;

            $firstPortion = '';

            if (!is_int($result)) {
                $roundResult = floor($result);
                $remaining = $roundResult * 3;
                $newNumber = substr($number, -$remaining);
                $firstPortion = substr_replace($number, '', -$remaining);
                $number = $newNumber;
            }

            $numberParts = str_split($number, 3);

            $formatNumber = implode(',', $numberParts);

            $formattedNumber = $firstPortion ? $firstPortion . ',' . $formatNumber : $formatNumber;

        } else {
          //For Bangla format (Inserting comma befor three digits from last side and then inseting comma bebore each two digits from right side for remaining amount)
            $lastThreeDigits = substr($number, -3);
            $remainingDigits = substr_replace($number, '', -3);
            $digitCount = strlen($remainingDigits);
            $oddEven = $digitCount % 2;

            $firstDigit = '';

            if ($oddEven != 0) {
                $characterPosition = 0;
                $firstDigit = substr($remainingDigits, $characterPosition, 1);
                $remainingDigits = substr($remainingDigits, $characterPosition + 1);
            }

            $numberParts = str_split($remainingDigits, 2);

            $remainingFormattedDigits = implode(',', $numberParts);

            $formattedNumber = $firstDigit ? $firstDigit . ',' . $remainingFormattedDigits . ',' . $lastThreeDigits : $remainingFormattedDigits . ',' . $lastThreeDigits;

        }
      echo($formattedNumber);
    }


   public function makeStringToNumber($number)
    {
        $number = str_replace(",", "", $number);
        $number = str_replace(" ", "", $number);
        return $number;
    }
