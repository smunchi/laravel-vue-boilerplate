<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CallCreditUserElectoralRollTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            INSERT INTO `CallCreditUserElectoralRoll` (`PID`, `UID`, `PAFValid`, `ResidentName`, `ERHistory_StartDate`, `ERHistory_EndDate`, `ERHistory_OptOut`, `ERHistory_RollingRoll`) VALUES
            (1, 1, 1, 'ELVIDGE DOXEY', '2014-01-26', '2014-01-26', 0, 0),
            (1, 2, 1, 'ELVIDGE DOXEY', '2014-01-26', '2014-01-26', 0, 0),
            (1, 3, 1, 'JOHN RICHARD FERRARI', '2011-02-27', '2011-02-27', 0, 0),
            (1, 4, 1, 'ELVIDGE DOXEY', '2014-01-27', '2014-01-26', 0, 0),
            (1, 5, 1, 'ELVIDGE DOXEY', '2014-01-27', '2014-01-26', 0, 0),
            (1, 6, 1, 'ELVIDGE DOXEY', '2014-01-31', '2014-01-26', 0, 0),
            (1, 7, 1, 'ELVIDGE DOXEY', '2014-01-27', '2014-01-26', 0, 0),
            (1, 8, 1, 'ELVIDGE DOXEY', '2014-01-27', '2014-01-26', 0, 0),
            (1, 9, 1, 'ELVIDGE DOXEY', '2014-01-27', '2014-01-26', 0, 0),
            (1, 10, 1, 'ELVIDGE DOXEY', '2014-01-27', '2014-01-26', 0, 0);
        ");
    }
}
