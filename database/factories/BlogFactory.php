<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
	$content1 = "<div class='content-blog'>
			<div class='heading'>Lorem ipsum dolor </div>
			<div class='paragraph'>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Sed placeat quisquam sequi porro architecto, tempora, harum ea laborum eius. Nobis, fugiat? Ab dolorem iure magni, tempora! Est numquam rem quod fugit libero aliquam eveniet, asperiores assumenda atque, earum commodi officia dolores qui natus blanditiis.
			</div>
			<div class='heading'>Lorem ipsum dolor </div>
			<div class='paragraph'>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Sed placeat quisquam sequi porro architecto, tempora, harum ea laborum eius.
			</div>
			<div class='heading'>Lorem ipsum dolor </div>
			<div class='paragraph'>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Sed placeat quisquam sequi porro architecto, tempora, harum ea laborum eius. Nobis, fugiat? Ab dolorem iure magni, tempora! Est numquam rem quod fugit libero aliquam eveniet, asperiores.
			</div>
		</div>
	";

	$content2 = "
		<div class='content-blog'>
			<div class='heading'>Lorem ipsum dolor </div>
			<div class='paragraph'>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Sed placeat quisquam sequi porro architecto, tempora, harum ea laborum eius.
			</div>
			<div class='heading'>Lorem ipsum dolor </div>
			<div class='paragraph'>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Sed placeat quisquam sequi porro architecto, tempora, harum ea laborum eius. Nobis, fugiat? Ab dolorem iure magni, tempora! Est numquam rem quod fugit libero aliquam eveniet, asperiores assumenda atque, earum commodi officia dolores qui natus blanditiis.
			</div>
			<div class='heading'>Lorem ipsum dolor </div>
			<div class='paragraph'>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Sed placeat quisquam sequi porro architecto, tempora, harum ea laborum eius.
			</div>
			<div class='heading'>Lorem ipsum dolor </div>
			<div class='paragraph'>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Sed placeat quisquam sequi porro architecto, tempora, harum ea laborum eius. Nobis, fugiat? Ab dolorem iure magni, tempora! Est numquam rem quod fugit libero aliquam eveniet, asperiores.
			</div>
		</div>
	";

    return [
		'title'     => $faker->word,
		'thumbnail' => 'thumbnail.jpg',
		'category'  => $faker->randomElement(['all' , 'contributor' , 'member']),
		'content'   => $faker->randomElement([$content1 , $content2]),
    ];
});
