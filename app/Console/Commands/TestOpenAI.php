<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OpenAI\Laravel\Facades\OpenAI; 

class TestOpenAI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-open-a-i';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $models = OpenAI::models()->list();
            $this->info('✅ Conexión exitosa con OpenAI.');
            $this->line('Modelos disponibles:');
            foreach ($models->data as $model) {
                $this->line('- ' . $model->id);
            }
        } catch (\Throwable $e) {
            $this->error('❌ Error: ' . $e->getMessage());
        }
    }
}
