<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Contact;

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
        return [
            'category_id' => $this->faker->randomDigitNotNull,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->numberBetween(1,2), 
            'email' => $this->faker->unique()->safeEmail,
            'tell' => $this->faker->phoneNumber,
            'address' => $this->faker->state,
            'building' => $this->faker->streetAddress,
            'detail' => $this->faker->realText(255),
        ];
    }
}
