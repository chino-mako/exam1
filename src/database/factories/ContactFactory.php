<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 5), // カテゴリID（1〜5の範囲でランダム）
            'first_name' => $this->faker->firstName(),         // 名前
            'last_name' => $this->faker->lastName(),           // 苗字
            'gender' => $this->faker->randomElement(['1', '2']), // 性別 男性=1, 女性=2
            'email' => $this->faker->unique()->safeEmail(),    // メールアドレス
            'tel' => $this->faker->phoneNumber(),              // 電話番号
            'address' => $this->faker->address(),              // 住所
            'building' => $this->faker->secondaryAddress(),    // 建物名
            'detail' => $this->faker->text(120),               // 問い合わせ内容
        ];
    }
}
