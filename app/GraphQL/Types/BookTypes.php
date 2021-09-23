<?php

namespace App\GraphQL\Types;

use App\Models\Books;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use App\GraphQL\Queries\SalesQuery;

class BookTypes extends GraphQLType
{
    protected $attributes = [
        'name' => 'book',
        'description' => 'Collection of books and details of Author',
        'model' => Books::class
    ];


    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Id of a particular book',
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The title of the book',
            ],
            'author_id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the author of the book',
            ],
            'year' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The year which the book was written in',
            ],
            'genre' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The genre the book was published',
            ],
            'created_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The genre the book was published',
            ],
            //relationship
            'sales' => SalesQuery::class,
        ];
    }
}