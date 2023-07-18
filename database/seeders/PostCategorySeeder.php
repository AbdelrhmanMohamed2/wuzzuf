<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin\Post;
use App\Models\Admin\Admin;
use App\Models\Admin\Comment;
use Illuminate\Database\Seeder;
use App\Models\Admin\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = PostCategory::factory(5)->create();

        foreach ($categories as $category) {
            $sub_categories = PostCategory::factory(5)->create(['parent_id' => $category->id]);
            foreach ($sub_categories as $sub_category) {
                $posts = Post::factory(2)->create(['post_category_id' => $sub_category->id, 'admin_id' => Admin::inRandomOrder()->first()->id]);
                foreach ($posts as $post) {
                    Comment::factory(3)->create(['post_id' => $post->id, 'user_id' => User::inRandomOrder()->first()->id]);
                }
            }
        }
    }
}
