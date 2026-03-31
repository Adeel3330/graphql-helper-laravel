<?php


namespace Adeel3330\GraphQLHelper\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeGraphQLResolverCommand extends Command
{
    protected $signature = 'make:graphql-resolver {name}';
    protected $description = 'Create a new GraphQL resolver';

    public function handle()
    {
        $name = $this->argument('name');
        $className = $name . 'Resolver';

        $path = app_path("GraphQL/Resolvers/{$className}.php");

        if (File::exists($path)) {
            $this->error('Resolver already exists!');
            return;
        }

        File::ensureDirectoryExists(app_path('GraphQL/Resolvers'));

        File::put($path, $this->getStub($className));

        $this->info("Resolver created: {$className}");
    }

    protected function getStub($className)
    {
        return <<<PHP
<?php

namespace App\GraphQL\Resolvers;

use Adeel3330\GraphQLHelper\Base\Resolver;

class {$className} extends Resolver
{
    public function rules(): array
    {
        return [
            //
        ];
    }

    public function handle(\$args)
    {
        return [];
    }
}
PHP;
    }
}