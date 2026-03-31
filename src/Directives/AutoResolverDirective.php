<?php
namespace Adeel3330\GraphQLHelper\Directives;

use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Support\Contracts\FieldResolver;
use Nuwave\Lighthouse\Schema\Values\FieldValue;

class AutoResolverDirective extends BaseDirective implements FieldResolver
{
    public static function definition(): string
    {
        return <<<'GRAPHQL'
        """
        Automatically resolve GraphQL fields using naming convention
        """
        directive @autoResolver on FIELD_DEFINITION
        GRAPHQL;
    }

    public function resolveField(FieldValue $fieldValue): callable
    {
        return function ($root, array $args, $context, $info) {

            $fieldName = $info->fieldName;

            $namespace = config('graphql-helper.resolver_namespace', 'App\\GraphQL\\Resolvers');

            $class = $namespace . '\\' . ucfirst($fieldName) . 'Resolver';

            if (!class_exists($class)) {
                throw new \Exception("Resolver {$class} not found");
            }

            return app($class)->resolve($root, $args, $context, $info);
        };
    }
}