<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory for generating fake Contact model data.
 *
 * This factory is used in testing and seeding to create fake contacts
 * with random but valid name, email, and phone data.
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Contact>
 */
class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\App\Models\Contact>
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>  The array of default fake attributes for a Contact.
     */
    public function definition(): array
    {
        return [
            'name'  => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->numerify('##########'), // 10-digit number
        ];
    }
}
