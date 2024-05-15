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

        try {
            $this->call('vendor:publish', [
                '--provider' => "Myitedu\\EmailServices\\EmailServicesServiceProvider",
                '--tag' => 'config'
            ]);
            $this->info('Configuration published successfully.');
        } catch (\Exception $e) {
            $this->error('Failed to publish configuration: ' . $e->getMessage());
        }

        $this->info('Publishing migrations...');
        try {
            $this->call('vendor:publish', [
                '--provider' => "Myitedu\\EmailServices\\EmailServicesServiceProvider",
                '--tag' => 'migrations'
            ]);
            $this->info('Migrations published successfully.');
        } catch (\Exception $e) {
            $this->error('Failed to publish migrations: ' . $e->getMessage());
        }

        if ($this->confirm('Do you want to run the migrations now?', true)) {
            try {
                $this->call('migrate');
                $this->info('Migrations run successfully.');
            } catch (\Exception $e) {
                $this->error('Failed to run migrations: ' . $e->getMessage());
            }
        }

        $this->info('Email Services package installed successfully.');
    }

}
