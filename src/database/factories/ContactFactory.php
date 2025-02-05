<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Contact::class;

    public function definition()
    {
        $faker = \Faker\Factory::create('ja_JP'); // 日本のデータを生成

        return [
            'first_name' => $faker->firstName, // 日本の名前
            'last_name' => $faker->lastName,   // 日本の苗字
            'gender' => $faker->randomElement(['male', 'female', 'other']),
            'email' => $faker->safeEmail, // 日本語のメール風のデータ
            'tel' => $faker->phoneNumber,
            'address' => $faker->address,
            'building' => $faker->secondaryAddress,
            'detail' => $faker->realText(50), // お問い合わせ内容
            'category_id' =>
            Category::pluck('id')->random(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
