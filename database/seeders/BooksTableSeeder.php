<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'title' => 'Things Fall Apart',
                'author' => 'Chinua Achebe',
                'isbn' => '098908',
                'publish_date' => '2000-03-10'
            ],
            [
                'title' => 'Absalom',
                'author' => 'William Faulkner',
                'isbn' => '093908',
                'publish_date' => '2002-03-10'
            ],
            [
                'title' => 'Why We Stuck',
                'author' => 'Colnel Ademoyega',
                'isbn' => '012308',
                'publish_date' => '1989-03-10'
            ]
        ];

        foreach($books as $book){
            Book::create([
                'title' => $book['title'],
                'author' => $book['author'],
                'isbn' => $book['isbn'],
                'publish_date'=> $book['publish_date']
            ]);
        }
        
    }
}
