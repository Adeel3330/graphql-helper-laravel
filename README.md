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

## ✨ Features

* ✅ Laravel-style validation for GraphQL resolvers
* ✅ Clean base resolver class
* ✅ Standard API response helpers
* ✅ Exception → GraphQL error formatting
* ✅ Plug & play with Lighthouse or custom GraphQL setups

---

## 📦 Installation

```bash
composer require yourname/laravel-graphql-helper
```

---

## ⚙️ Usage

### 1. Create a Resolver

```php
use YourName\GraphQLHelper\Base\Resolver;

class CreateUser extends Resolver
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

### 2. Validation (Automatic)

No need to manually validate — it's handled before execution.

---

### 3. Standard Responses

```php
use YourName\GraphQLHelper\Support\GraphQLResponse;

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

## 🧠 Philosophy

* Keep it **minimal**
* Follow **Laravel conventions**
* Improve **developer experience**
* Avoid unnecessary abstraction

---

## 🔌 Works With

* Lighthouse GraphQL
* Custom GraphQL implementations

---

## 🤝 Contributing

PRs are welcome! Keep it simple and aligned with Laravel philosophy & Xiaroo Team.

---

## 📄 License

MIT
