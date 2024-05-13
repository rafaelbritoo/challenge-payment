<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustumerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'cpf' => DocumentTypeEnum::CPF->value,
            'cnpj' => DocumentTypeEnum::CPF->value,
            'email' => $this->faker->email,
            'document_type' => DocumentTypeEnum::CPF->value,
            'document_number' => $this->faker->randomNumber(5)
        ];
    }
}
