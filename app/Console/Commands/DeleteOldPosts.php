<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Status;
use Carbon\Carbon;

class DeleteOldPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Status::where('created_at', '<=', Carbon::yesterday())->get()->each(function ($status) {
            $status;
        });
    }
}
