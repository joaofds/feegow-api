<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientAppointment extends Model
{
    public $timestamps = false;
    protected $table = 'patient_has_appointment';
    protected $fillable = [
        'specialty_id',
        'professional_id',
        'name',
        'cpf',
        'birthdate',
        'source_id',
    ];
}
