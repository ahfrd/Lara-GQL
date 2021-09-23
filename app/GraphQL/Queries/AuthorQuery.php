<?php

namespace App\GraphQL\Queries;

use App\Models\Author;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\SelectFields;

use Rebing\GraphQL\Support\Query;
use Closure;

class AuthorQuery extends Query
{
    protected $attributes = [
        'name' => 'author',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('author'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
            ],
            'city' => [
                'name' => 'city',
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo,SelectFields $fields, Closure $getSelectFields)
    {
        if(isset($args['id'])){
            return Author::where('id',$args['id'])->get();
        }
        
        return Author::all();
    }
}