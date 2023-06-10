<?php

namespace App\Models;

use CodeIgniter\Model;

class AsistenModel extends Model
{
    protected $table = 'asisten';
    protected $primaryKey = 'NIM';
    protected $allowedFields = [
        'NIM',
        'NAMA',
        'PRAKTIKUM',
        'IPK'
    ];
    public function simpan($record)

    {
        $data = [
            'NIM' => $record['nim'],
            'NAMA' => $record['nama'],
            'PRAKTIKUM' => $record['praktikum'],
            'IPK' => $record['ipk']
        ];

        return $this->insert($data, false);
    }
    public function hapus($nim)
    {
        $this->delete($nim);
    }
    public function ambil($nim)
    {
        return $this->where((['nim' => $nim]))->first();
    }
}
