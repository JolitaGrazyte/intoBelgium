<?php

use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->delete();


        $path = public_path('uploads').'/provincies.csv';


//        $this->csv_to_array($path);

//        $fullcsv = array_map('str_getcsv', str_getcsv($path,"\n"));
//
//        dd($fullcsv);



////        dd($path);
//        $csv = Reader::createFromPath($path);
//        $csv->setOffset(1); //because we don't want to insert the header
//        $csv->each(function ($row)  {
//            DB::table('locations')->insert(
//                array(
//                    'postcode' => $row[0],
//                    'name' => $row[1],
//
//                )
//            );
//        });


        $locations = [
            [
                'name'      => 'Antwerp',
                'postcode'  => 2000
            ],
            [
                'name'      => 'Deurne',
                'postcode'  => 2000
            ],
            [
                'name'      => 'Luchtbal',
                'postcode'  => 2000
            ],
            [
                'name'      => 'Borgerhout',
                'postcode'  => 2000
            ],
            [
                'name'      => 'Brasschaat',
                'postcode'  => 2000
            ],



        ];
        DB::table('locations')->insert($locations);
    }

    function csv_to_array($filename, $delimiter=';')
    {
        if(!file_exists($filename) || !is_readable($filename))
            return FALSE;

        $header = NULL;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== FALSE)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
            {
                if(!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }
}
