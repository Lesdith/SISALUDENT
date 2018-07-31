<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call([
            AppointmentsSeeder::class,
            //ClinicStoriesSeeder::class,
            ContactsSeeder::class,
            //DentalStoriesSeeder::class,
            DepartmentsSeeder::class,
            DoctorsSeeder::class,
            GendersSeeder::class,
            LocationsSeeder::class,
            MunicipalitiesSeeder::class,
            PatientsSeeder::class,
            RolesSeeder::class,
            SpecialtiesSeeder::class,
            TeethSeeder::class,
            ToothDiagnosesSeeder::class,
            ToothPositionsSeeder::class,
            ToothStagesSeeder::class,
            ToothTreatmentsSeeder::class,
            ToothTypesSeeder::class,
            TreatmentPlansSeeder::class,

            // PostsTableSeeder::class,
            // CommentsTableSeeder::class,
        ]);
    }
}
