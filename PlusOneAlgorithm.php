<?php

error_reporting(E_ALL);


class PlusOneAlgorithm {

	private $largeNumber = "";

	public function __construct($number){

		$this->largeNumber = $number;

	}


    /**
     *
     * it's do calculate largenumber
     * largeNumber + 1
     *
     * @return string
     */
	public function calculate(){

		$totalChar = strlen($this->largeNumber);

		$arrNewChars = [];

		// Sağdan başlayarak tüm rakamlara tek tek bakıyoruz
        // eğer 998 gibi bir rakam var ise 999 yapıp bu durumu tespit ediyoruz
        // tespit ettiğimizde 4. rakama geçmiyor bitiriyoruz.
        // algoritma tüm rakamlara bakması gerekiyor ise bakıyor.
		for ($i=1; $i <= $totalChar; $i++) { 

			$char = $this->largeNumber[strlen($this->largeNumber) - $i];

			if($char == 9) {
				$newChar = 0;
				$arrNewChars[] = $newChar;
			} else {
				
				$newChar = $char + 1;
				$arrNewChars[] = $newChar;
				break;
			}
		}

		// Sadece değişen rakamları bir array'a attık ve ters çevirdik.
		$arrNewChars = array_reverse($arrNewChars);

		// Array içindeki rakamları sayıya dönüştürüyoruz
		$strNewChars = implode("", $arrNewChars);

		// Örn sadece sağdan 3 haneli 200 gibi bir rakam'ın olduğunu tespit ettik
        // Orjinal sayıdaki son 3 haneyi atıp bulduğumuz sayıyı sonuna ekliyoruz
		$newStr = substr($this->largeNumber, 0, strlen($strNewChars) * -1);

		// Yeni sayı oluştu
		$newStr = $newStr . $strNewChars;


		// Oluşan tüm sayıların toplamı 0 ise yani tüm 9'lar 0 oldu ise
        // Örn (999 -> 000 şekline dönüşecektir ya da 9 rakamı 0 olacaktır)
		// başına bir eklemek için incelemeleri yapıyoruz
		$arrAllChar = str_split($newStr);

		$newCharCount = 0;
		foreach ($arrAllChar as $key => $value) {
			$newCharCount = $newCharCount + $value;
		}

		if($newCharCount == 0){
			$newStr = "1" . $newStr;
		}

		return $newStr;


	}



    /**
     * This method using for check result like log
     * it's unimportant
     * @param $val
     */
	private function pr($val){
		echo "<pre>";
		print_r($val);
		echo "</pre>";
		die();
	}

}

?>