<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpParser\Node\Stmt\TryCatch;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithProgressBar;




class ImportUser implements ToModel, WithHeadingRow, WithValidation, SkipsOnError, SkipsOnFailure,WithProgressBar
{
    use Importable, SkipsErrors, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null


    */

    public function model(array $row)
    {
        $user =  new User([
            'name' => $row[0],
            'email' => $row[1],
            'password' => Hash::make($row[2]),
        ]);

        $result = $user->save();
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users',
            'name' => 'required',
            'password' => 'required',
        ];
    }
}
