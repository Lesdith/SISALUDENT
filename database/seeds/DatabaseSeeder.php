<?php

use Illuminate\Database\Seeder;
use Sisaludent\Daily_treatment_record;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call([
            UsersSeeder::class,
           // PasswordResetsSeeder::class,
            LocationsSeeder::class,
            DepartmentsSeeder::class,
            MunicipalitiesSeeder::class,
            ToothTypesSeeder::class,
            ToothStagesSeeder::class,
            ToothPositionsSeeder::class,        
            ToothTreatmentsSeeder::class,
            DiagnosesSeeder::class,
            ContactsSeeder::class,
            SpecialtiesSeeder::class,
            GendersSeeder::class,
            PatientsSeeder::class,
            DoctorsSeeder::class,
            TeethSeeder::class,
            TreatmentPlansSeeder::class,
            //ClinicStoriesSeeder::class,
            //DentalStoriesSeeder::class,
            AppointmentsSeeder::class,
            DailyTreatmentRecordsSeeder::class,
           //RolesSeeder::class,
        ]);
    }
}
