<?php namespace app\Tools;

class CheckWin {

    public function checkWin($slotResult)
    {
        $winlines = array(
            array(0,3,6,9,12),
            array(1,4,7,10,13),
            array(2,5,8,11,14),
            array(0,4,8,10,12),
            array(2,4,6,10,14),
        );

        $wins = [];
        $winSymbols = [];
            
        for ($i=0; $i < count($winlines); $i++) {
            $counter = 2;

            for ($x=2; $x < count($winlines); $x++) { 
                if ($slotResult[$winlines[$i][$x-1]] === $slotResult[$winlines[$i][$x]] && $slotResult[$winlines[$i][$x-2]] === $slotResult[$winlines[$i][$x]]) {
                    $counter++;                
                }
            }

            if ($counter >= 3) {
                array_push($wins, implode(" ",$winlines[$i]) . ":" . $counter);
                array_push($winSymbols, $counter);
            }
            
        }

        $winnings = $this->findWinnings($winSymbols);

        return array($wins, $winnings);
        
    }

    public function findWinnings($symbols){
        $lineWinnings = 0;
        $winnings = 0;
        
        foreach ($symbols as &$value) {
            switch($value){
                case 3:
                    $lineWinnings = (20 / 100) * 100;
                    break;
                case 4:
                    $lineWinnings = (200 / 100) * 100;
                    break;
                case 5:
                    $lineWinnings = (1000 / 100) * 100;
                    break;     
            }

            $winnings = $winnings + $lineWinnings;
        }

        return $winnings;
    }

}