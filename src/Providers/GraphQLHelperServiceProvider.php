<?php

namespace Adeel3330\GraphQLHelper\Providers;

use Adeel3330\GraphQLHelper\Support\GraphQLResponse;
use Illuminate\Support\ServiceProvider;

class GraphQLHelperServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('graphql-helper', function () {
            return new GraphQLResponse();
        });

        $this->mergeConfigFrom(
            __DIR__ . '/../../config/graphql-helper.php',
            'graphql-helper'
        );

        // 🔥 Dynamically add directive namespace
        $this->app->booting(function () {
            $namespaces = config('lighthouse.namespaces.directives', []);

            // Make sure it's an array
            if (!is_array($namespaces)) {
                $namespaces = [$namespaces];
            }

            // Merge package directive namespace
            $namespaces = array_unique(array_merge(
                $namespaces,
                ['Adeel3330\\GraphQLHelper\\Directives']
            ));

            // Set it back into config
            config(['lighthouse.namespaces.directives' => $namespaces]);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/graphql-helper.php' => config_path('graphql-helper.php'),
        ], 'graphql-helper-config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                \Adeel3330\GraphQLHelper\Console\MakeGraphQLResolverCommand::class,
            ]);
        }
    }
}
