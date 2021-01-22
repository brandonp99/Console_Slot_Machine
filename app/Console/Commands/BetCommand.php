<?php namespace app\Console\Commands;

use Illuminate\Console\Command;
use Exception;
use App\Tools\GenerateTable;
use App\Tools\Replace;
use App\Tools\CheckWin;

class BetCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'slots:bet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Bets €1 and spins the slot machine";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $genTable = new GenerateTable();
        $replaceNumbers = new Replace();
        $wins = new CheckWin();

        try {
            $spinResult = [];


        for ($i=0; $i < 15; $i++) {
            $spinResult[$i] = rand(0, 9);
        }

        $replacedResult = $replaceNumbers->findReplace($spinResult);
        $winResult = $wins->checkWin($spinResult);

        $genTable->generateTable($replacedResult);

        $this->info("paylines: " . implode(", ", $winResult[0]));
        $this->info("bet_ammount: 100");
        $this->info("total_win: " . $winResult[1]);
        } catch (Exception $e) {
            $this->error("An error occurred: " . $e);
        }
    }

}