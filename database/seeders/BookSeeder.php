<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $desc = 'Lorem ipsum dolor sit amet. Ut ipsa autem et temporibus incidunt qui optio praesentium quo animi debitis cum eveniet quos ut quod odit non accusamus aliquam. Sit omnis aliquam id ipsam nesciunt et quia odit qui architecto porro ut praesentium totam.

        Sit odit repellendus et alias voluptates quo repellendus autem ea repudiandae nihil. Et incidunt quia qui repudiandae laborum hic commodi provident et rerum quidem qui alias impedit est blanditiis commodi?
        
        Est quibusdam quibusdam qui incidunt porro et totam tenetur 33 omnis consectetur et odio quia. Non modi cumque et animi adipisci rem cumque enim in quia voluptas ut quam cumque.';

        Book::truncate();

        $data = new Book;
        $data->name = "Book 1";
        $data->isbn = Str::random(8);
        $data->description = $desc;
        $data->stock = 10;
        $data->publisher = 'Penerbit 1';
        $data->image = 'https://edit.org/images/cat/book-covers-big-2019101610.jpg';
        $data->save();

        $data = new Book;
        $data->name = "Book 2";
        $data->isbn = Str::random(8);
        $data->description = $desc;
        $data->stock = 10;
        $data->publisher = 'Penerbit 2';
        $data->image = 'https://edit.org/images/cat/book-covers-big-2019101610.jpg';
        $data->save();

        $data = new Book;
        $data->name = "Book 3";
        $data->isbn = Str::random(8);
        $data->description = $desc;
        $data->stock = 10;
        $data->publisher = 'Penerbit 3';
        $data->image = 'https://edit.org/images/cat/book-covers-big-2019101610.jpg';
        $data->save();
    }
}
