<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Log;

class countLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count:logs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command counting CRUD logs from last 13h 33min';

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
     * @return int
     */
    public function handle()
    {
        $countedTime = date("Y-m-d H:i:s", strtotime("-13 hours -33 minutes"));

        $allLogs = Log::where('created_at', '>', $countedTime)->count();
        $COperations = Log::where('type','C')->where('created_at', '>', $countedTime)->count();
        $ROperations = Log::where('type','R')->where('created_at', '>', $countedTime)->count();
        $UOperations = Log::where('type','U')->where('created_at', '>', $countedTime)->count();
        $DOperations = Log::where('type','D')->where('created_at', '>', $countedTime)->count();
        $COperationsComment = Log::where('type','C')->where('model','C')->where('created_at', '>', $countedTime)->count();
        $ROperationsComment = Log::where('type','R')->where('model','C')->where('created_at', '>', $countedTime)->count();
        $UOperationsComment = Log::where('type','U')->where('model','C')->where('created_at', '>', $countedTime)->count();
        $DOperationsComment = Log::where('type','D')->where('model','C')->where('created_at', '>', $countedTime)->count();
        $COperationsPost = Log::where('type','C')->where('model','P')->where('created_at', '>', $countedTime)->count();
        $ROperationsPost = Log::where('type','R')->where('model','P')->where('created_at', '>', $countedTime)->count();
        $UOperationsPost = Log::where('type','U')->where('model','P')->where('created_at', '>', $countedTime)->count();
        $DOperationsPost = Log::where('type','D')->where('model','P')->where('created_at', '>', $countedTime)->count();

        $this->info("Operations counted from: $countedTime");
        $this->info("All CRUD Operations: $allLogs");
        $this->info("--------------------------------");
        $this->info("Create Operations: $COperations");
        $this->info("Read Operations: $ROperations");
        $this->info("Update Operations: $UOperations");
        $this->info("Delete Operations: $DOperations");
        $this->info("--------------------------------");
        $this->info("Create Operations on Comments: $COperationsComment");
        $this->info("Read Operations on Comments: $ROperationsComment");
        $this->info("Update Operations on Comments: $UOperationsComment");
        $this->info("Delete Operations on Comments: $DOperationsComment");
        $this->info("--------------------------------");
        $this->info("Create Operations on Posts: $COperationsPost");
        $this->info("Read Operations on Posts: $ROperationsPost");
        $this->info("Update Operations on Posts: $UOperationsPost");
        $this->info("Delete Operations on Posts: $DOperationsPost");
    }
}
