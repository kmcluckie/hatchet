<?php

namespace Database\Seeders;

use JeroenZwart\CsvSeeder\CsvSeeder;

class LocationSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeders/office-data.csv';
        $this->delimiter = ',';
        $this->tablename = 'locations';
        $this->mapping = ['name', 'price', 'offices', 'tables', 'sqm'];
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        parent::run();
    }
}
