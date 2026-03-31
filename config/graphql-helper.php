<?php

return [
    'debug' => env('GRAPHQL_HELPER_DEBUG', true),

    'default_success_message' => 'Success',
    'default_error_message' => 'Something went wrong',
    'directive_namespace' => 'Adeel3330\\GraphQLHelper\\Directives',
    'resolver_namespace' => 'App\\GraphQL\\Resolvers',
];