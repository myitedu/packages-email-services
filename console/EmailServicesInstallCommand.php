<?php
namespace Myitedu\EmailServices\Console;

use Illuminate\Console\Command;

class EmailServicesInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emailservices:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Email Services package';

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
        $this->info('Publishing configuration...');

        $this->call('vendor:publish', [
            '--provider' => "Myitedu\\EmailServices\\EmailServicesServiceProvider",
            '--tag' => 'config'
        ]);

        $this->info('Publishing migrations...');

        $this->call('vendor:publish', [
            '--provider' => "Myitedu\\EmailServices\\EmailServicesServiceProvider",
            '--tag' => 'migrations'
        ]);

        if ($this->confirm('Do you want to run the migrations now?', true)) {
            $this->call('migrate');
        }

        $this->info('Email Services package installed successfully.');

        return 0;
    }
}
