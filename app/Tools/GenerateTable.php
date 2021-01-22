<?php namespace app\Tools;

require 'vendor/autoload.php';

use jc21\CliTable;

class GenerateTable {

    public function generateTable($slotResult)
    {
        $tableData = array(
            array(
                'firstCol' => $slotResult[0],
                'secondCol' => $slotResult[3],
                'thirdCol' => $slotResult[6],
                'fourthCol' => $slotResult[9],
                'fifthCol' => $slotResult[12],
            ),
            array(
                'firstCol' => $slotResult[1],
                'secondCol' => $slotResult[4],
                'thirdCol' => $slotResult[7],
                'fourthCol' => $slotResult[10],
                'fifthCol' => $slotResult[13],
            ),
            array(
                'firstCol' => $slotResult[2],
                'secondCol' => $slotResult[5],
                'thirdCol' => $slotResult[8],
                'fourthCol' => $slotResult[11],
                'fifthCol' => $slotResult[14],
            ),
        );


        $table = new CliTable;
        $table->setTableColor('blue');
        $table->setHeaderColor('cyan');
        $table->addField('S', 'firstCol');
        $table->addField('L', 'secondCol');
        $table->addField('O', 'thirdCol');
        $table->addField('T', 'fourthCol');
        $table->addField('S',  'fifthCol');
        $table->injectData($tableData);
        $table->display();
    }

}