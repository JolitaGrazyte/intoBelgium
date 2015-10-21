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


        $file = public_path('files').'/provincies.csv';

        $locations = $this->parse_csv($file);

//        dd($locations);

        DB::table('locations')->insert($locations);
    }

    function parse_csv($file, $options = null) {

        $result = [];
        $res = [];
        $delimiter = empty($options['delimiter']) ? ";" : $options['delimiter'];
        $str = file_get_contents($file);
        $lines = explode("\r", $str);

        $field_names = explode($delimiter, array_shift($lines));
        foreach ($lines as $line) {

            // Skip the empty line
            if (empty($line)) continue;
            $fields = explode($delimiter, $line);
            foreach ($field_names as $key => $f) {

                    $result[$f] = $fields[$key];
            }
            $res[] = $result;
        }

        return $res;
    }
}
