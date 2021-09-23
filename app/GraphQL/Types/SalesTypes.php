<?php
namespace App\GraphQL\Types;
use App\Models\Sales;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class SalesTypes extends GraphQLType
{
    protected $attributes = [
        'name' => 'sales',
        'description' => 'A type',
        'model' => Sales::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of a particular book',
            ],
            'books_id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The title of the book',
            ],
            'sum' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the author of the book',
            ],
            'year' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The year which the book was written in',
            ],
        ];
    }
}
