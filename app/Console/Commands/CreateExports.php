<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateExports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:create {name=null} {--T|--table= : Table for collection in export}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this is for create file excel exports';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $table = $this->option('table');
        if($table !== null) {
            $table = 'use App\\' . $table .';'; 
        }
        if($this->argument('name') !== 'null') {
            $nameFile = $this->argument('name');
        } else {
            $nameFile = $this->ask('Name for file create');
        }
$content = '<?php

namespace App\Exports;

'. $table .'
use Maatwebsite\Excel\Concerns\FromCollection;

class '. $nameFile .'Export implements FromCollection
{
    public function collection()
    {
        return Collection::all();
    }
}
        ';
        if(!is_dir('App/Exports')) {
            mkdir('App/Exports');
        }
        file_put_contents('App/Exports/' . $nameFile . 'Export' . '.php' , $content);
        $this->info($nameFile . ' Excel Export created in directory App/Exports');
    }
}
