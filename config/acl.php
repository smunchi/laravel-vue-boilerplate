<?php
return [
    'roles' => ['root', 'admin', 'lender', 'customer'],

    'permissions'   => [

        /*== Backend Route web ========================================*/
        'home' => ['root', 'admin', 'lender', 'customer'],
        /*-----products---------------*/
        'backend.product.index' => ['admin'],
        /*-----bucket---------------*/
        'backend.bucket.index' => ['admin'],
        'backend.bucket.create' => ['admin'],
        'backend.bucket.show' => ['admin'],
        'backend.bucket.edit' => ['admin'],
        /*-----lender---------------*/
        'backend.lender.index' => ['admin'],
        'backend.lender.create' => ['admin'],
        'backend.lender.show' => ['admin'],
        'backend.lender.edit' => ['admin'],
        /*-----customer---------------*/
        'backend.customer.index' => ['admin'],
        'backend.customer.show' => ['admin'],
        /*-----application---------------*/
        'backend.application.index' => ['admin'],
        'backend.application.show' => ['admin'],

        /*== Backend Route Api ========================================*/

        /*-----products---------------*/
        'backend.api.product.index' => ['admin'],
        'backend.api.product.create' => ['admin'],
        'backend.api.product.update' => ['admin'],
        'backend.api.product.delete' => ['admin'],
        'backend.api.product.active.toggle' => ['admin'],
        /*-----bucket---------------*/
        'backend.api.bucket.index' => ['admin'],
        'backend.api.bucket.store' => ['admin'],
        'backend.api.bucket.show' => ['admin'],
        'backend.api.bucket.update' => ['admin'],
        'backend.api.bucket.delete' => ['admin'],
        'backend.api.bucket.color' => ['admin'],
        /*-----lender---------------*/
        'backend.api.lender.index' => ['admin'],
        'backend.api.lender.store' => ['admin'],
        'backend.api.lender.update' => ['admin'],
        'backend.api.lender.show' => ['admin'],
        'backend.api.lender.delete' => ['admin'],
        'backend.api.lender.toggle.status' => ['admin'],
        /*-----customer---------------*/
        'backend.api.customer.index' => ['admin'],
        'backend.api.customer.show' => ['admin'],
        'backend.api.customer.delete' => ['admin'],
        'backend.api.customer.toggle.status' => ['admin'],
        /*-----application---------------*/
        'backend.api.application.index' => ['admin'],
        'backend.api.application.show' => ['admin'],
        'backend.api.application.call_credit.show' => ['admin'],
        /*-----call credit---------------*/
        'backend.api.call_credit.api_field.index' => ['admin'],
    ]
];
