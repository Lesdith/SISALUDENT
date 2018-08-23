<?php

use Illuminate\Database\Seeder;
use Sisaludent\Daily_treatment_record;
use Sisaludent\Perform_treatment;

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
            
            //RolesSeeder::class,
            UsersSeeder::class,
           // PasswordResetsSeeder::class,
            LocationsSeeder::class,
            ServicesSeeder::class,
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
            DetailTreatmentPlansSeeder::class,
            PaymentsSeeder::class,
            PerformTreatmentsSeeder::class,
            ClinicHistoriesSeeder::class,
            DentalHistoriesSeeder::class,
            AppointmentsSeeder::class,
            SpecialExamsSeeder::class,
            //ReservationMethodsSeeder::class,
            
        ]);
    }
}
