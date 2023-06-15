<?php
namespace App\Models;

use CodeIgniter\Model;

class Userdata extends Model
{
    protected $table='userdata';
    protected $primarykey='ID';
    protected $allowedFields=[
        'FirstName',
        'LastName',
        'email',
        'phone',
    
    ];
}

?>