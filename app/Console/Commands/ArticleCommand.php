<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Article;

class ArticleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status article';

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
        Article::where('published', '<=', now())->update(['status' => 'Published']);
        // $a = now();
        // dd($a);
    }
}
