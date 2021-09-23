<?php

namespace App\GraphQL\Queries;

use App\Models\Books;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\SelectFields;

use Rebing\GraphQL\Support\Query;
use Closure;

class BookQuery extends Query
{
    protected $attributes = [
        'name' => 'book',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('book'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
            ],
            'author_id' => [
                'name' => 'author_id',
                'type' => Type::string(),
            ],
            'title' => [
                'name' => 'title',
                'type' => Type::string(),
            ],
            'year' => [
                'name' => 'year',
                'type' => Type::string(),
            ],
            'genre' => [
                'name' => 'genre',
                'type' => Type::string(),
            ],
            'created_at' => [
                'name' => 'created_at',
                'type' => Type::string(),
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo,SelectFields $fields, Closure $getSelectFields)
    {
        if(isset($args['id'])){
             return Books::whereHas('author', function ($query) use ($root){
                $query->where('id', $root->id);
            })->where('id',$args['id'])->get();
        }
       return Books::whereHas('author', function ($query) use ($root){
            $query->where('id', $root->id);
        })->get();
        
        //return Books::all();
    }
}