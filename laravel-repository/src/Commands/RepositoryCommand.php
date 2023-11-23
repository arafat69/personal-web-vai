<?php

namespace Arafat\LaravelRepository\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class RepositoryCommand extends Command
{
    protected $signature = 'make:repository {name} {--model=}';

    protected $description = 'Create a new repository class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $modelName = $this->option('model');

        $className = Str::studly($name);

        $repositoryPath = app_path("Repositories/{$className}.php");

        if (file_exists($repositoryPath)) {
            return $this->error('Repository already exits.');
        }

        if ($modelName) {
            $modelVariable = Str::camel($modelName);
            $stub = file_get_contents(base_path('stubs/repository.model.stub'));
            $stub = str_replace(['{{ ClassName }}', '{{ modelName }}', '{{ modelVariable }}'], [$className, $modelName, $modelVariable], $stub);
        } else {
            $stub = file_get_contents(base_path('stubs/repository.stub'));
            $stub = str_replace('{{ ClassName }}', $className, $stub);
        }

        file_put_contents($repositoryPath, $stub);

        $this->info("Repository created successfully: {$repositoryPath}");
    }
}
