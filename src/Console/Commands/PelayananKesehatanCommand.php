<?php namespace Bantenprov\PelayananKesehatan\Console\Commands;

use Illuminate\Console\Command;

/**
 * The TarifPelayananKesehatanCommand class.
 *
 * @package Bantenprov\PelayananKesehatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PelayananKesehatanCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:pelayanan-kesehatan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\PelayananKesehatan package';

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
        $this->info('Welcome to command for Bantenprov\PelayananKesehatan package');
    }
}
