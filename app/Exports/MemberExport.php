<?php

namespace App\Exports;

use App\Member;
use Maatwebsite\Excel\Concerns\FromCollection;

class MemberExport implements FromCollection
{
    public function collection()
    {
        return Member::all();
    }
}
        