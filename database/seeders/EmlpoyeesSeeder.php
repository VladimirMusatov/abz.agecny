<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmlpoyeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        //Первый цикл создает 5 сотрудников по иерархии от большей к меньшому подчинению
        for($i = 1;  $i <= 5 ; $i++){

            //Если у сотрудника 1 уровень в должностной иерархии, тогда у него не может быть начальника
            if($i == 1){

                $employer_id = null ;

            } else {

                //Id сотрудника который выше на один уровень
                $employer_id  = Employee::where('subordination_level', $i - 1)->value('id');

            }

             Employee::factory()->create(['subordination_level' => $i, 'employer_id' => $employer_id]);

        }

        for($i = 1; $i <= 4995; $i++){

            $subordination_level = rand(1 , 5);


            //Если у сотрудника 1 уровень в должностной иерархии, тогда у него не может быть начальника
            if($subordination_level == 1){

                $employer_id = null;

            } else {

                //Получение id случайного сотрудника уровень иерархии выше на один чем у сотрудника которого сейчас создает фабрика
                $employer_id  = Employee::where('subordination_level', $subordination_level - 1)->inRandomOrder()->value('id');

            }

            //Создание сотрудника
            Employee::factory()->create(['subordination_level' => $subordination_level, 'employer_id' => $employer_id]);


        }
       
    }
}
