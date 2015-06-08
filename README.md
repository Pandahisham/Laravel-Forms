# Laravel Forms

## Installation

First, pull in the package through Composer.

```js
"require": {
    "draperstudio/laravel-forms": "~1.0"
}
```

And then include the service provider within `app/config/app.php`.

```php
'providers' => [
    'DraperStudio\Forms\FormsServiceProvider'
];
```

If you need to modify the configuration or the views, you can run:

```bash
php artisan vendor:publish
```

The package views will now be located in the `app/resources/views/vendor/forms/` directory and the configuration will be located at `app/config/forms.php`.

## Example

**app/Forms/Auth/Login.php**
```php
<?php
namespace App\Forms\Auth;

use DraperStudio\Forms\Contracts\FormContract;
use DraperStudio\Forms\FormBuilder;

class Login extends FormBuilder implements FormContract
{
    /**
     * The HTTP method for the form.
     *
     * @var string
     */
    protected $method = 'POST';

    /**
     * The route for the form.
     *
     * @var string
     */
    protected $route = 'auth.login';

    /**
     * The submit button text.
     *
     * @var string
     */
    protected $submit = 'Login';

    /**
     * Get the fields that apply to the form.
     *
     * @return array
     */
    public function fields()
    {
        return [
            'username' => [
                'type'        => 'text',
                'label'       => 'Username',
                'placeholder' => 'The username you chose on registration.',
            ],
            'password' => [
                'type'        => 'text',
                'label'       => 'Password',
                'placeholder' => 'Your super secret password.',
            ],
        ];
    }

    /**
     * Get the label widths that apply to the form.
     *
     * @return array
     */
    public function labelWidths()
    {
        return [
            'xs' => 12,
            'sm' => 12,
            'md' => 2,
            'lg' => 2,
        ];
    }

    /**
     * Get the field widths that apply to the form.
     *
     * @return array
     */
    public function fieldWidths()
    {
        return [
            'xs' => 12,
            'sm' => 12,
            'md' => 10,
            'lg' => 10,
        ];
    }

    /**
     * Get the button width that apply to the form.
     *
     * @return array
     */
    public function buttonWidths()
    {
        return [
            'xs' => 12,
            'sm' => 12,
            'md' => 12,
            'lg' => 12,
        ];
    }
}
```

**config/forms.php**
```php
<?php

return [
    'aliases' => [
        'auth' => [
            'login' => 'App\Forms\Login',
        ],
    ],
];
```

**login.blade.php**
```html
@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    // Instead of horizontal you can also use basic or inline
                    {!! forms('auth.login')->horizontal() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

## Result
```html
<form method="POST" action="http://work.bench/login" accept-charset="UTF-8" class="form-horizontal">
    <input name="_token" type="hidden" value="w3FsNGPIjglqMXKKN9kjSqLn5LShv1MMIV5sgikr">

    <div class="form-group">
        <label for="username" class="control-label col-xs-12 col-sm-12 col-md-2 col-lg-2">Username</label>

        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <input class="form-control" placeholder="The username you chose on registration." name="username" type="text" id="username">
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="control-label col-xs-12 col-sm-12 col-md-2 col-lg-2">Password</label>

        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <input class="form-control" placeholder="Your super secret password." name="password" type="text" id="password">
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <input class="btn btn-primary pull-right" type="submit" value="Login">
        </div>
    </div>
</form>
```
