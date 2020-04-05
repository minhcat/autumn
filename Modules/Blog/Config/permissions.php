<?php

return [
    'blog.posts' => [
        'index' => 'blog::post.list resource',
        'create' => 'blog::post.create resource',
        'edit' => 'blog::post.edit resource',
        'destroy' => 'blog::post.destroy resource',
    ],
    'blog.categories' => [
        'index' => 'blog::category.list resource',
        'create' => 'blog::category.create resource',
        'edit' => 'blog::category.edit resource',
        'destroy' => 'blog::category.destroy resource',
    ],
    'blog.tag' => [
        'index' => 'blog::tag.list resource',
        'create' => 'blog::tag.create resource',
        'edit' => 'blog::tag.edit resource',
        'destroy' => 'blog::tag.destroy resource',
    ],
];