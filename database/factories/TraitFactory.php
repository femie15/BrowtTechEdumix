<?php

namespace Database\Factories;

use App\Models\Trait;
use Illuminate\Database\Eloquent\Factories\Factory;

class TraitFactory extends Factory
{
    protected $model = Trait::class;

    public function definition()
    {
        if (method_exists($this->model, 'definition')) {
            return app($this->model)->definition($this->faker);
        }

        return [];
    }
}
