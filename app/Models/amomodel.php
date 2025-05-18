<?php 
namespace App\Models;
use CodeIgniter\Model;

class AmoModel extends Model { 
    protected $table = 'amos';
    protected $useAutoIncrement = false; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id', 'nom_ape', 'direccion', 'telefono', 'f_alta'];
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