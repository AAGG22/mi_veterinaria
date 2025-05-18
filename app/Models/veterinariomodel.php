<?php 
namespace App\Models;
use CodeIgniter\Model;

class VeterinarioModel extends Model { 
    protected $table = 'veterinarios';
    protected $useAutoIncrement = true; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id', 'nom_ape', 'especialidad', 'telefono', 'f_ingreso', 'f_egreso'];
    protected $useTimestamps = false; // Dates
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = []; // Validation
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
}
?>