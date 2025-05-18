<?php 
namespace App\Models;
use CodeIgniter\Model;

class MascotaModel extends Model { 
    protected $table = 'mascotas';
    protected $useAutoIncrement = true; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nro_registro', 'nombre', 'especie', 'raza', 'edad', 'f_alta', 'f_def'];
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