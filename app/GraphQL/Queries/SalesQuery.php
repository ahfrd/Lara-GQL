<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;
use Illuminate\Support\Facades\DB;

use App\Models\Sales;
use App\Models\Books;

use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\SelectFields;

use Rebing\GraphQL\Support\Query;
use Closure;

class SalesQuery extends Query
{
    protected $attributes = [
        'name' => 'sales',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('sales'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
            ],
            'books_id' => [
                'name' => 'books_id',
                'type' => Type::string(),
            ],
            'sum' => [
                'name' => 'title',
                'type' => Type::string(),
            ],
            'year' => [
                'name' => 'year',
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {

        return Sales::whereHas('books', function ($query) use ($root){
            $query->where('id', $root->id);

            })->get();

    }
}
