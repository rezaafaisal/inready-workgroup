<?php 
    namespace App\Imports;

use App\Models\Profile;
use Illuminate\Support\Collection;

    use App\Models\User;
    use Illuminate\Support\Facades\Hash;
    use Maatwebsite\Excel\Concerns\ToCollection;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithStartRow;


class UserImport implements WithStartRow, ToCollection
{
    public function collection(Collection $rows){
        foreach ($rows as $row) {
            $passwd = Hash::make('inready<>');
            $user = User::create([
                'name' => $row[1],
                'role_id' => 2,
                'username' => $row[0],
                'password' => $passwd
            ]);

            Profile::create([
                'user_id' => $user->id,
                'generation_id' => $this->generation($row[5]),
                'address' => $row[2],
                'whatsapp' => $row[4]
            ]);
        }
    }

    private function generation($generation){
        if($generation == 'Pendiri') return 0;
        else return explode(' ', $generation)[1] + 1;
    }

    public function startRow(): int
    {
        return 2;
    }
}

     