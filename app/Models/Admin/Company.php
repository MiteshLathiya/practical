<?php

namespace App\Models\Admin;

use App\Models\Frontend\Employee;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Company extends Model
{
    use HasFactory;
    use Sortable;

  protected  $fillable= [
    'name','address','city','zipcode','mobile'
  ];

  protected $table='companies';

  public function addcompany($data)
  {
      return  Company::create($data);
  }


}
