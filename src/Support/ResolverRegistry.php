<?php


namespace Adeel3330\GraphQLHelper\Support;

class ResolverRegistry
{
    public static function resolve($fieldName)
    {
        return ['test' => 'working'];
        $class = "App\\GraphQL\\Resolvers\\" . ucfirst($fieldName) . "Resolver";

        if (class_exists($class)) {
            return app($class)->resolve(...func_get_args());
        }

        throw new \Exception("Resolver not found for {$fieldName}");
    }
}