<?php

namespace App\Models\Frontend;

use App\Models\Admin\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Employee extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable=[
        'firstname','lastname','birthdate','age','mobile','gender','city','company','email','password','image'
    ];

    
    public function employeeregister($data)
    {
        return  Employee::create($data);
    }

   
        public function showdata()
        {
            return Company::all();
            
        }
  
}
