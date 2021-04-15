<?php

namespace Database\Factories;

use App\Models\Drug;
use Illuminate\Database\Eloquent\Factories\Factory;

class DrugFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Drug::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
//$table->string('name');
//$table->string('s_name');
//$table->string('price');
//$table->text('description');
//$table->integer('count');
//$table->unsignedBigInteger('alternative_id')->nullable();
//$table->string('expired_date');
//$table->integer('buying_count');
//$table->text('place');
    public function definition()
    {
        return [
            'name'=>"panadol".random_int(1,10),
            's_name'=>'panadolto',
            'price'=>random_int(10,100),
            'description'=>'good panadol for helth',
            'count'=>random_int(100,1000),
            'expired_date'=>$this->faker->date('d-m-y'),
            'buying_count'=>random_int(1,1000),
            'place'=>'Locker A section B'

        ];
    }
}
