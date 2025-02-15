<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PackagesLaravel\Blog\Models\Post;
use PackagesLaravel\Blog\Models\Topic;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Topic::truncate();
        Post::truncate();

        $user = User::query()->updateOrCreate([
            'email' => 'example@email.dev',
        ], [
            'name' => 'Example',
            'password' => bcrypt('example'),
        ]);

        $topic = $user->topics()->updateOrCreate([
            'slug' => 'example',
        ], [
            'name' => 'Example',
        ]);

        $user->posts()->updateOrCreate([
            'topic_id' => $topic->id,
            'slug' => Str::slug('Emmet Lorem Ipsum'),
        ], [
            'title' => 'Emmet Lorem Ipsum',
            'content' => file_get_contents(database_path('seeders/posts/emmet-lorem-ipsum.htm')),
            'image' => 'https://cdn.pixabay.com/photo/2019/04/26/17/47/color-4158152_1280.jpg',
        ]);

        $user->posts()->updateOrCreate([
            'topic_id' => $topic->id,
            'slug' => Str::slug('Is Lorem Ipsum A Language?'),
        ], [
            'title' => 'Is Lorem Ipsum A Language?',
            'content' => file_get_contents(database_path('seeders/posts/is-lorem-ipsum-a-language.htm')),
            'image' => 'https://cdn.pixabay.com/photo/2018/02/06/14/08/color-3134831_1280.jpg',
        ]);

        $user->posts()->updateOrCreate([
            'topic_id' => $topic->id,
            'slug' => Str::slug('Is Lorem Ipsum Simply Meaning?'),
        ], [
            'title' => 'Is Lorem Ipsum Simply Meaning?',
            'content' => file_get_contents(database_path('seeders/posts/is-lorem-ipsum-simply-meaning.htm')),
            'image' => 'https://cdn.pixabay.com/photo/2019/07/07/07/01/abstract-4321879_1280.jpg',
        ]);

        $user->posts()->updateOrCreate([
            'topic_id' => $topic->id,
            'slug' => Str::slug('Why Is HTML Text?'),
        ], [
            'title' => 'Why Is HTML Text?',
            'content' => file_get_contents(database_path('seeders/posts/why-is-html-text.htm')),
            'image' => 'https://cdn.pixabay.com/photo/2018/07/04/13/37/background-3516145_1280.jpg',
        ]);

        $user->posts()->updateOrCreate([
            'topic_id' => $topic->id,
            'slug' => Str::slug('What Is Pseudo-Latin Lorem Ipsum?'),
        ], [
            'title' => 'What Is Pseudo-Latin Lorem Ipsum?',
            'content' => file_get_contents(database_path('seeders/posts/what-is-pseudo-latin-lorem-ipsum.htm')),
            'image' => 'https://cdn.pixabay.com/photo/2014/09/30/22/50/sandstone-467714_1280.jpg',
        ]);

        $user->posts()->updateOrCreate([
            'topic_id' => $topic->id,
            'slug' => Str::slug('Why Does Everyone Use Lorem Ipsum?'),
        ], [
        'title' => 'Why Does Everyone Use Lorem Ipsum?',
            'content' => file_get_contents(database_path('seeders/posts/why-does-everyone-use-lorem-ipsum.htm')),
            'image' => 'https://cdn.pixabay.com/photo/2022/06/25/08/43/space-7283103_1280.jpg',
        ]);

        $user->posts()->updateOrCreate([
            'topic_id' => $topic->id,
            'slug' => Str::slug('What Does Lorem Ipsum Text Mean in English?'),
        ], [
            'title' => 'What Does Lorem Ipsum Text Mean in English?',
            'content' => file_get_contents(database_path('seeders/posts/what-does-lorem-ipsum-text-mean-in-english.htm')),
            'image' => 'https://cdn.pixabay.com/photo/2017/08/07/17/10/abstract-2605811_1280.jpg',
        ]);

        $user->posts()->updateOrCreate([
            'topic_id' => $topic->id,
            'slug' => Str::slug('How to Code Lorem Ipsum?'),
        ], [
            'title' => 'How to Code Lorem Ipsum?',
            'content' => file_get_contents(database_path('seeders/posts/how-to-code-lorem-ipsum.htm')),
            'image' => 'https://cdn.pixabay.com/photo/2017/07/07/18/55/background-2482326_1280.jpg',
        ]);

        $user->posts()->updateOrCreate([
            'topic_id' => $topic->id,
            'slug' => Str::slug('How to Write Lorem Ipsum?'),
        ], [
            'title' => 'How to Write Lorem Ipsum?',
            'content' => file_get_contents(database_path('seeders/posts/how-to-write-lorem-ipsum.htm')),
            'image' => 'https://cdn.pixabay.com/photo/2018/07/04/13/37/background-3516145_1280.jpg',
        ]);
    }
}
