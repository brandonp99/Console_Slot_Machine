<?php namespace app\Tools;

class Replace {

    public function findReplace($slotResult)
    {
        foreach ($slotResult as &$value) {
            switch($value){
                case 0:
                    $value = "9";
                    break;
                case 1:
                    $value = "10";
                    break;
                case 2:
                    $value = "J";
                    break;
                case 3:
                    $value = "Q";
                    break;
                case 4:
                    $value = "K";
                    break;
                case 5:
                    $value = "A";
                    break;
                case 6:
                    $value = "cat";
                    break;
                case 7:
                    $value = "dog";
                    break;
                case 8:
                    $value = "mon";
                    break;
                case 9:
                    $value = "bir";
                    break;
                                                                                                    
            }
        }

        return $slotResult;
        
    }

}