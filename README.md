# Laravel GraphQL Helper

A lightweight helper layer for GraphQL in Laravel — focused on **validation, clean resolver structure, and consistent responses**.

> Not a GraphQL engine. Not a replacement for Lighthouse.
> Just clean, Laravel-style developer experience.

---

## 🚀 Why This Package?

Working with GraphQL in Laravel often leads to:

* ❌ No standard validation approach
* ❌ Messy resolver logic
* ❌ Inconsistent response formats

This package solves that by bringing **Laravel-like structure** to GraphQL.

---

## 🔥 Key Feature: `@autoResolver`

No more manual resolver mapping.

Instead of writing:

```graphql
@field(resolver: "App\\GraphQL\\Resolvers\\CreateUserResolver@resolve")
```

Just use:

```graphql
@autoResolver
```

✅ Automatically maps:

```
createUser → App\GraphQL\Resolvers\CreateUserResolver
```

---

## ✨ Features

* ✅ `@autoResolver` directive (auto maps GraphQL fields → resolvers)
* ✅ Artisan generator for resolvers
* ✅ Laravel-style validation inside resolvers
* ✅ Clean and consistent resolver structure
* ✅ Automatic directive namespace registration
* ✅ Standard response helpers
* ✅ Plug & play with Lighthouse

---

## 📦 Installation

```bash
composer require yourname/laravel-graphql-helper
```

---

## ⚙️ Requirements

* PHP ^8.3 | ^8.4
* Laravel ^11 | ^12 | ^13
* Lighthouse GraphQL package

---

## ⚙️ Usage

### 🔹 1. Create a Resolver

```bash
php artisan make:graphql-resolver CreateUser
```

---

### 🔹 2. Resolver Example

```php
namespace App\GraphQL\Resolvers;

use App\Models\User;
use Adeel3330\GraphQLHelper\Base\Resolver;

class CreateUserResolver extends Resolver
{
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function handle($args)
    {
        return User::create($args);
    }
}
```

---

### 🔹 3. Use in GraphQL Schema

```graphql
type Mutation {
    createUser(email: String!, password: String!): User @autoResolver
}
```

---

### 🔹 4. Run Mutation

```graphql
mutation {
  createUser(email: "test@test.com", password: "123456") {
    id
    email
  }
}
```

---

## 🔥 Validation (Automatic)

No need to manually validate — it's handled before execution:

```php
public function rules(): array
{
    return [
        'email' => 'required|email',
    ];
}
```

---

## 📊 Standard Responses

```php
use Adeel3330\GraphQLHelper\Support\GraphQLResponse;

return GraphQLResponse::success($data);

return GraphQLResponse::error('Something went wrong');
```

---

## 🔥 Example Response

```json
{
  "data": {...},
  "message": "Success",
  "status": true
}
```

---

## 🧠 How It Works

* Reads GraphQL field name (`createUser`)
* Converts to class (`CreateUserResolver`)
* Resolves from:

```
App\GraphQL\Resolvers
```

* Executes automatically

---

## ⚙️ Configuration (Optional)

```php
// config/graphql-helper.php

return [
    'resolver_namespace' => 'App\\GraphQL\\Resolvers',
];
```

---

## 📁 Folder Structure

```
app/
└── GraphQL/
    └── Resolvers/
        └── CreateUserResolver.php
```

---

## 🔌 Works With

* Lighthouse GraphQL
* Custom GraphQL implementations

---

## 🎯 Philosophy

* Keep it **minimal**
* Follow **Laravel conventions**
* Improve **developer experience**
* Avoid unnecessary abstraction

---

## 🤝 Contributing

PRs are welcome! Keep it simple and aligned with Laravel philosophy & Xiaroo Team.

---

## 📄 License

MIT
