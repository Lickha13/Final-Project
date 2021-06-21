<?php

namespace App\Exports;

use App\Models\SiswaModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SiswaModel::all();
    }

    public function map($siswa): array
    {
        return [
            $siswa->nama_lengkap(),
            $siswa->jenis_kelamin,
            $siswa->agama,
            $siswa->alamat,
            $siswa->rataRataNilai()
        ];
    }

    public function headings(): array
    {
        return [
            'NAMA LENGKAP',
            'JENI KELAMIN',
            'AGAMA',
            'ALAMAT',
            'RATA-RATA NILAI'
        ];
    }
}
