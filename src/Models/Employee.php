<?php
namespace OrganizationalChart\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'reports_to'];

    // Define the manager relationship
    public function manager()
    {
        return $this->belongsTo(Employee::class, 'reports_to');
    }

    // Define the subordinates relationship
    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'reports_to');
    }
}
