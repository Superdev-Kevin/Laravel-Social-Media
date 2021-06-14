<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Media;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['email' => 'admin@gmail.com']);
        
	    User::factory(40)->create()->each(function ($user) {
  
		    Post::factory(random_int(1,10))->create(['user_id'=>$user->id])->each(function ($post) use ($user) {
		    	Media::factory()->create(['post_id'=>$post->id, 'path' => '/post-photos/test.png']);
				Like::factory()->create(['post_id'=>$post->id, 'user_id' => $user->id]);
				Comment::factory(random_int(3,27))->create(['post_id'=>$post->id, 'user_id' => $user->id]);
		});
	});

	}
}
