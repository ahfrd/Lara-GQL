<?php

namespace App\GraphQL\Types;
use GraphQL;
use App\Models\Author;
use App\Models\Books;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Illuminate\Support\Carbon;
use App\GraphQL\Queries\BookQuery;
class AuthorTypes extends GraphQLType
{
    protected $attributes = [
        'name' => 'author',
        'description' => 'Collection Author',
        'model' => Author::class
    ];


    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of a particular book',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The title of the book',
            ],
            'address' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the author of the book',
            ],
            'city' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The year which the book was written in',
            ],
            // Relation
            /*'book' => [
                'type'          => Type::listOf(GraphQL::type('book')),
                'description'   => 'A list of posts written by the user',
                'args'          => [
                    'id' => [
                        'type' => Type::int(),
                    ],
                 ],
                // $args are the local arguments passed to the relation
                // $query is the relation builder object
                // $ctx is the GraphQL context (can be customized by overriding `\Rebing\GraphQL\GraphQLController::queryContext`
                'query'         => function(array $args, $query, $ctx) {

                    return Books::where('books.id',  $args['id'])->selectRaw('books.id AS book')->get();

 
                    //return $query->where('books.id',  $args['id']);
                }
            ],*/
          'book' => BookQuery::class,
        ];
    }
}