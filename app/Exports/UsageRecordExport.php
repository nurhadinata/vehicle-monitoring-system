<?php

namespace App\Exports;

use App\Models\UsageRecord;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsageRecordExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UsageRecord::all();
    }
}
