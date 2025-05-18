<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $modelA = new \App\Models\AmoModel();
        $totalA = $modelA->countAllResults();

        $modelM = new \App\Models\MascotaModel();
        $totalM =  $modelM->countAllResults();

        $data = ['totalA' => $totalA, 'totalM' => $totalM, ];
        
        return view('layouts/header', ['title' => 'Inicio',])
        . view('layouts/menu')
        . view('index', $data)
        .view('layouts/footer');
    }

     public function getMascota($pet_id){
        $model = new \App\Models\MascotaModel();
        $mascota = $model->where('nro_registro', $pet_id)->first();;
        $pet = [
            'nro_reg' => $mascota['nro_registro'],
            'petNombre' => $mascota['nombre'],
            'petEspecie' => $mascota['especie'],
            'petRaza' => $mascota['raza'],
            'petEdad' => $mascota['edad'],
            'petFechaA' => $mascota['f_alta'],
            'petFechaF' => $mascota['f_def'],
        ];
        $data = [
            'pet' => $pet,
            'title' => 'Mascota: '. $pet['petNombre'],
        ];

        return view('display/pet', $data);
    }
    public function getAmo($amo_id){
        $model = new \App\Models\AmoModel();
        $owner = $model->where('id', $amo_id)->first();;
        $amo = [
            'dni' => $owner['id'],
            'ownerNomApe' => $owner['nom_ape'],
            'ownerDire' => $owner['direccion'],
            'ownerTel' => $owner['telefono'],
            'ownerFechaA' => $owner['f_alta'],
        ];
        $data = [
            'owner' => $amo,
            'title' => 'Amo: '. $amo['ownerNomApe'],
        ];

        return view('display/owner', $data);
    }
    public function getVet($vet_id){
        $model = new \App\Models\VeterinarioModel();
        $vete = $model->where('id', $vet_id)->first();;
        $vet = [
            'id' => $vete['id'],
            'vetNomApe' => $vete['nom_ape'],
            'vetEspec' => $vete['especialidad'],
            'vetTel' => $vete['telefono'],
            'vetIngreso' => $vete['f_ingreso'],
            'vetEgreso' => $vete['f_egreso'],
        ];
        $data = [
            'vet' => $vet,
            'title' => 'Veterinario: '. $vet['vetNomApe'],
        ];

        return view('display/vet', $data);
    }


    public function getCargarRel(){
        $amoM= new \App\Models\AmoModel();
        $mascotaM= new \App\Models\MascotaModel();

        $amosr = $amoM -> select('id') -> findAll();
        $amos = ['' => 'DNI'];
        foreach ($amosr as $a) {
            $amos[$a['id']] = $a['id'];
        }

        $mascotasr= $mascotaM -> findAll();
        $mascotas = ['' => 'Numero de registro'];
        foreach ($mascotasr as $m) {
            $mascotas[$m['nro_registro']] = $m['nro_registro'] . '. ' . $m['nombre'];
        }


        return view('create/rel', [
            'amos' => $amos,
            'mascotas' => $mascotas,
            'title' => 'Cargar relación',
        ]);
    }
    public function crearRel() {
        $validate = service('validation'); //llamo al servicio de validacion
        $validate -> setRules ([
            'selectowner' => 'required',
            'selectpet' => 'required' ] , [
            'selectowner' => ['required' => 'Debe ingresar el documento del amo'] ,
            'selectpet' => ['required' => 'Debe ingresar el numero de registro de la mascota']
        ]);
        if (!$validate -> withRequest($this->request) -> run()) {
            return redirect() -> back() -> withInput() -> with('errors',$validate->getErrors());
        }

        $data = array( 'id_amo' => $this->request->getPost('selectowner'), 
                        'id_mascota' => $this->request->getPost('selectpet'), 
                        'estado' =>  1,
                        'fecha' => date('Y-m-d')
        );
        $save_bdd = new \App\Models\RelacionAMModel();
        $save_bdd -> insert($data);

        return redirect()->to(base_url('cargar/rel'))->with('success', '😺👩🏻 Relacion creada.');
    }


    public function getCargarVet(){
        return view('create/vet',['title' => 'Cargar veterinario']);
    }
    public function crearVet() {
        $validate = service('validation'); //llamo al servicio de validacion
        $validate -> setRules ([
            'nomape' => 'required|min_length[5]',
            'espec' => 'required',
            'tel' => 'required|regex_match[/^[0-9]{7,15}$/]',
            'fingreso' => 'required' 
        ] , [
            'nomape' => ['required' => 'Debe ingresar el nombre completo',
                        'min_length' => 'El nombre es demasiado corto'] ,
            'espec' => ['required' => 'Debe ingresar la especialidad'] , 
            'tel' => ['required' => 'Debe ingresar un telefono',
                    'regex_match' => 'Ingrese un telefono valido'] , 
            'fingreso' => ['required' => 'Debe ingresar la fecha de ingreso']
        ]);
        if (!$validate -> withRequest($this->request) -> run()) {
            return redirect() -> back() -> withInput() -> with('errors',$validate->getErrors());
        }

        $data = array( 'nom_ape' => $this->request->getPost('nomape'), 
                        'especialidad' => $this->request->getPost('espec'), 
                        'telefono' =>  $this->request->getPost('tel'),
                        'f_ingreso' => $this->request->getPost('fingreso')
        );
        $save_bdd = new \App\Models\VeterinarioModel();
        $save_bdd -> insert($data);

        return redirect()->to(base_url('cargar/vet'))->with('success', '🩺🐷 Veterinario guardado.');
    }
    public function editVet($vet_id){
        $validate = service('validation');
        $validate->setRules([
                'vetNomApeEdit' => 'required|min_length[5]',
                'vetEspecEdit' => 'required',
                'vetTelEdit' => 'required|regex_match[/^[0-9]{7,15}$/]',
                'vetIngresoEdit' => 'required'
            ],
            [
                'vetNomApeEdit' => [
                    'required' => 'Debe ingresar el nombre completo',
                    'min_length' => 'El nombre es demasiado corto'
                ],
                'vetEspecEdit' => ['required' => 'Debe ingresar la especialidad'],
                'vetTelEdit' => [
                    'required' => 'Debe ingresar un telefono',
                    'regex_match' => 'Ingrese un telefono valido'
                ],
                'vetIngresoEdit' => ['required' => 'Debe ingresar la fecha de ingreso']
            ]
        );
        if (!$validate->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('modalTarget', 'modalEditVet' . $vet_id)->with('errors', $validate->getErrors());
        }

        $data = array(
            'nom_ape' => $this->request->getPost('vetNomApeEdit'),
            'especialidad' => $this->request->getPost('vetEspecEdit'),
            'telefono' =>  $this->request->getPost('vetTelEdit'),
            'f_ingreso' => $this->request->getPost('vetIngresoEdit')
        );

        $modelV = new \App\Models\VeterinarioModel();
        $modelV->where('id', $vet_id)->set($data)->update();

        return redirect()->back()->with('success', '🩺✔️ Información actualizada.');
    }


    public function crearPet(){
        // validaciones
        $validate = service('validation');
        $validate -> setRules ([
                'petNombre' => 'required|alpha_numeric_punct|min_length[2]|max_length[20]',
                'petEspecie' => 'required|alpha_space|min_length[3]|max_length[20]',
                'petRaza' => 'required|alpha_space|min_length[2]|max_length[25]',
                'petAnios' => 'permit_empty|integer|min_length[1]|max_length[2]',
                'petMeses' => 'permit_empty|integer|min_length[1]|max_length[2]|less_than[13]',
                'petDias' => 'permit_empty|min_length[1]|max_length[2]|less_than[46]',
            ],
            [
                'petNombre' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_numeric_punct' => 'Sólo puedes utilizar estos caracteres: - _ ! # * $ % & + = : . ~ |',
                    'min_length' => 'El nombre debe contener al menos 2 caracteres',
                    'max_length' => 'El nombre no puede contener más de 20 caracteres',
                ],                                                                                                                  
                'petEspecie' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_space' => 'Sólo se pueden ingresar letras o espacios',
                    'min_length' => 'El campo debe contener al menos 3 caracteres',
                    'max_length' => 'El nombre no puede contener más de 20 caracteres',
                ],
                'petRaza' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_space' => 'Sólo se pueden ingresar letras o espacios',
                    'min_length' => 'El campo debe contener al menos 2 caracteres',
                    'max_length' => 'El nombre no puede contener más de 25 caracteres',
                ],
                'petAnios' => [
                    'integer' => 'Sólo se pueden ingresar números',
                    'min_length' => 'Cantidad de caracteres inválida',
                    'max_length' => 'Cantidad de caracteres inválida',
                ],
                'petMeses' => [
                    // 'required_without' => 'Debe cargar una edad',
                    'integer' => 'Sólo se pueden ingresar números',
                    'min_length' => 'Cantidad de caracteres inválida',
                    'max_length' => 'Cantidad de caracteres inválida',
                    'less_than' => 'El valor máximo admitido es de 12 meses',
                ],
                'petDias' => [
                    // 'required_without' => 'Debe cargar una edad',
                    'min_length' => 'Cantidad de caracteres inválida',
                    'max_length' => 'Cantidad de caracteres inválida',
                    'less_than' => 'Pasados los 45 dias, por favor cargar Edad aproximando a meses',
                ],
            ]);

        if (!$validate -> withRequest($this->request) -> run()) {
            return redirect()->back()->withInput()->with('modalTarget', 'modalCreatePet')->with('errors',$validate->getErrors());
        }

        // validar que se ingrese una edad y formatear
        $errors = [];
        $petA = $this->request->getPost('petAnios');
        $petM = $this->request->getPost('petMeses');
        $petD = $this->request->getPost('petDias');

        if($petA == '' && $petM == '' && $petD == ''){
            $errors['petEdad'] = 'El campo edad es obligatorio';
        }else if ($petA == '' && $petM != '' && $petD != ''){
            $edad = $petM .' meses y '. $petD .' dias';
        }else if ($petA != '' && $petM != ''){
            $edad = $petA .' años y '. $petM .' meses';
        }else if ($petA != ''){
            $edad = $petA .' años';
        }else if ($petM != ''){
            $edad = $petM .' meses';
        }else if ($petD != ''){
            $edad = $petD .' dias';
        }

        // validar que la cant de años tenga sentido
        $especie = $this->request->getPost('petEspecie');
        $anios = $this->request->getPost('petAnios');
        $limite = strcasecmp($especie, 'tortuga') ? 25 : 150;

        if ($anios > $limite) {
            $errors['petAnioLimite'] = 'La edad no puede ser mayor a ' . $limite;
        }

        if (!empty($errors)) {
            return redirect()->back()
                ->withInput()
                ->with('modalTarget', 'modalCreatePet')
                ->with('errors', $errors);
        }

        // guardar
        $data = ['nombre' => ucwords($this->request->getPost('petNombre')), 
                    'especie' => ucfirst($this->request->getPost('petEspecie')), 
                    'raza' =>  ucfirst($this->request->getPost('petRaza')),
                    'edad' =>  $edad,
                    'f_alta' => date('Y-m-d'),
                ];

        $modelPet = new \App\Models\MascotaModel();
        $modelPet -> insert($data);

        return redirect()->back()->with('success', '🐾 Mascota cargada.');
    }
    public function editPet($pet_id){
        $validate = service('validation');
        $validate->setRules(
            [
                'petNombreEdit' => 'required|alpha_numeric_punct|min_length[2]|max_length[20]',
                'petEspecieEdit' => 'required|alpha_space|min_length[3]|max_length[20]',
                'petRazaEdit' => 'required|alpha_space|min_length[2]|max_length[25]',
                'petAniosEdit' => 'permit_empty|integer|min_length[1]|max_length[2]',
                'petMesesEdit' => 'permit_empty|integer|min_length[1]|max_length[2]|less_than[13]',
                'petDiasEdit' => 'permit_empty|min_length[1]|max_length[2]|less_than[46]',
            ],
            [
                'petNombreEdit' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_numeric_punct' => 'Sólo puedes utilizar estos caracteres: - _ ! # * $ % & + = : . ~ |',
                    'min_length' => 'El nombre debe contener al menos 2 caracteres',
                    'max_length' => 'El nombre no puede contener más de 20 caracteres',
                ],
                'petEspecieEdit' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_space' => 'Sólo se pueden ingresar letras o espacios',
                    'min_length' => 'El campo debe contener al menos 3 caracteres',
                    'max_length' => 'El nombre no puede contener más de 20 caracteres',
                ],
                'petRazaEdit' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_space' => 'Sólo se pueden ingresar letras o espacios',
                    'min_length' => 'El campo debe contener al menos 2 caracteres',
                    'max_length' => 'El nombre no puede contener más de 25 caracteres',
                ],
                'petAniosEdit' => [
                    'integer' => 'Sólo se pueden ingresar números',
                    'min_length' => 'Cantidad de caracteres inválida',
                    'max_length' => 'Cantidad de caracteres inválida',
                ],
                'petMesesEdit' => [
                    'integer' => 'Sólo se pueden ingresar números',
                    'min_length' => 'Cantidad de caracteres inválida',
                    'max_length' => 'Cantidad de caracteres inválida',
                    'less_than' => 'El valor máximo admitido es de 12 meses',
                ],
                'petDiasEdit' => [
                    'min_length' => 'Cantidad de caracteres inválida',
                    'max_length' => 'Cantidad de caracteres inválida',
                    'less_than' => 'Pasados los 45 dias, por favor cargar Edad aproximando a meses',
                ],
            ]
        );

        if (!$validate->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()
                ->with('modalTarget', 'modalEditPet' . $pet_id)->with('errors', $validate->getErrors());
        }

        $errors = [];
        // validar que la cant de años tenga sentido
        $especie = $this->request->getPost('petEspecieEdit');
        $anios = $this->request->getPost('petAniosEdit');
        $limite = strcasecmp($especie, 'tortuga') ? 25 : 150;

        if ($anios > $limite) {
            $errors['petAnioLimite'] = 'La edad no puede ser mayor a ' . $limite;
        }

        if (!empty($errors)) {
            return redirect()->back()
                ->withInput()
                ->with('modalTarget', 'modalEditPet' . $pet_id)
                ->with('errors', $errors);
        }

        // formatear edad
        $petA = $anios;
        $petM = $this->request->getPost('petMesesEdit');
        $petD = $this->request->getPost('petDiasEdit');

        if ($petA == '' && $petM == '' && $petD == '') {
            $edad = $this->request->getPost('edadSaved');
        } else if ($petA == '' && $petM != '' && $petD != '') {
            $edad = $petM . ' meses y ' . $petD . ' dias';
        } else if ($petA != '' && $petM != '') {
            $edad = $petA . ' años y ' . $petM . ' meses';
        } else if ($petA != '') {
            $edad = $petA . ' años';
        } else if ($petM != '') {
            $edad = $petM . ' meses';
        } else if ($petD != '') {
            $edad = $petD . ' dias';
        }

        // guardar
        $data = [
            'nombre' => ucwords($this->request->getPost('petNombreEdit')),
            'especie' => ucfirst($this->request->getPost('petEspecieEdit')),
            'raza' =>  ucfirst($this->request->getPost('petRazaEdit')),
            'edad' =>  $edad,
        ];

        $modelPet = new \App\Models\MascotaModel();
        $modelPet->where('nro_registro', $pet_id)->set($data)->update();

        return redirect()->back()->with('success', '🐾✔️ Información actualizada.');
    }


    public function crearOwner(){
        $validate = service('validation');
        $validate -> setRules ([
                'ownerNomApe' => 'required|alpha_space|min_length[2]|max_length[20]',
                'ownerDni' => 'required|integer|min_length[4]|max_length[9]',
                'ownerTel' => 'required|regex_match[/^\+?[0-9]{7,15}$/]',
                'ownerDire' => 'required',
            ],
            [
                'ownerNomApe' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_space' => 'Sólo se pueden ingresar letras o espacios',
                    'min_length' => 'El nombre debe contener al menos 2 caracteres',
                    'max_length' => 'El nombre no puede contener más de 20 caracteres',
                ], 
                'ownerDni' => [
                    'required' => 'Este campo es obligatorio',
                    'integer' => 'El DNI es inválido. Ingrese sólo números',
                    'min_length' => 'El DNI es inválido',
                    'max_length' => 'El DNI es inválido. Ingrese hasta 9 números',
                ], 
                'ownerTel' => [
                    'required' => 'Este campo es obligatorio',
                    'regex_match' => 'Teléfono inválido. Ingrese sólo números y/o \'+\'',
                ], 
                'ownerDire' => [
                    'required' => 'Este campo es obligatorio',
                ],  
            ]);

        if (!$validate -> withRequest($this->request) -> run()) {
            return redirect()->back()->withInput()->with('modalTarget', 'modalCreateOwner')->with('errors',$validate->getErrors());
        }

        // guardar d
        $data = [ 'id' => $this->request->getPost('ownerDni'), 
                    'nom_ape' => ucwords($this->request->getPost('ownerNomApe')), 
                    'direccion' => ucfirst($this->request->getPost('ownerDire')),
                    'telefono' => $this->request->getPost('ownerTel'), 
                    'f_alta' => date('Y-m-d'),
                ];

        $modelA = new \App\Models\AmoModel();
        $modelA -> insert($data);

        return redirect()->back()->with('success', '🧑🏽 Amo cargado.');
    }
    public function editOwner($amo_id){
        $validate = service('validation');
        $validate -> setRules ([
                'ownerNomApeEdit' => 'required|alpha_space|min_length[2]|max_length[20]',
                'ownerDniEdit' => 'required|integer|min_length[4]|max_length[9]',
                'ownerTelEdit' => 'required|regex_match[/^\+?[0-9]{7,15}$/]',
                'ownerDireEdit' => 'required',
            ],
            [
                'ownerNomApeEdit' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_space' => 'Sólo se pueden ingresar letras o espacios',
                    'min_length' => 'El nombre debe contener al menos 2 caracteres',
                    'max_length' => 'El nombre no puede contener más de 20 caracteres',
                ], 
                'ownerDniEdit' => [
                    'required' => 'Este campo es obligatorio',
                    'integer' => 'El DNI es inválido. Ingrese sólo números',
                    'min_length' => 'El DNI es inválido',
                    'max_length' => 'El DNI es inválido. Ingrese hasta 9 números',
                ], 
                'ownerTelEdit' => [
                    'required' => 'Este campo es obligatorio',
                    'regex_match' => 'El teléfono es inválido. Ingrese entre 7 y 15 números',
                ], 
                'ownerDireEdit' => [
                    'required' => 'Este campo es obligatorio',
                ],  
            ]);

        if (!$validate -> withRequest($this->request) -> run()) {
            return redirect()->back()->withInput()->with('modalTarget', 'modalEditOwner' . $amo_id)->with('errors',$validate->getErrors());
        }
        // guardar
        $data = [ 'id' => $this->request->getPost('ownerDniEdit'), 
                    'nom_ape' => ucwords($this->request->getPost('ownerNomApeEdit')), 
                    'direccion' => ucfirst($this->request->getPost('ownerDireEdit')),
                    'telefono' => $this->request->getPost('ownerTelEdit'), 
                ];

        $modelA = new \App\Models\AmoModel();
        $modelA ->where('id', $amo_id)->set($data)->update();

        return redirect()->back()->with('success', '🐾✔️ Información actualizada.');
    }


    public function getEliminarRel() {
        $amoM= new \App\Models\AmoModel();

        $amosr = $amoM -> select('id') -> findAll();
        $amos = ['' => 'DNI'];
        foreach ($amosr as $a) {
            $amos[$a['id']] = $a['id'];
        }

        return view('remove/rel', [
            'amos' => $amos,
            'title' => 'Eliminar relación'
        ]);
    }
    public function getMascotas() {
        helper(['form']);

        $amoM = new \App\Models\AmoModel();
        $relM = new \App\Models\RelacionAMModel();
        $mascotaM = new \App\Models\MascotaModel();

        $amoSeleccionado = $this->request->getGet('selectowner');

        $amosr = $amoM -> select('id') -> findAll();
        $amos = ['' => 'DNI'];
        foreach ($amosr as $a) {
            $amos[$a['id']] = $a['id'];
        }

        $mascotas = ['' => 'Número de Registro'];
        if ($amoSeleccionado) {
            $relaciones = $relM
                ->where('id_amo', $amoSeleccionado)
                ->where('estado', 1)
                ->findAll();

            foreach ($relaciones as $rel) {
                $m = $mascotaM->where('nro_registro', $rel['id_mascota'])->first();
                if ($m) {
                    $mascotas[$m['nro_registro']] = $m['nro_registro'];
                    // $mascotas[$m['nombre']] = $m['nombre'];
                }
            }
        }
        return view('remove/rel', 
        [
            'amos' => $amos,
            'mascotas' => $mascotas,
            'amoSeleccionado' => $amoSeleccionado,
            'title' => 'Eliminar relación'
        ]);
    }
    public function eliminarRel() {
        $validate = service('validation');
        $validate -> setRules ([
            'selectowner' => 'required',
            'selectpet' => 'required',
            'fbaja' => 'required' ] , [
            'selectowner' => ['required' => 'Debe ingresar el documento del amo'] ,
            'selectpet' => ['required' => 'Debe ingresar el nombre de la mascota'] ,
            'fbaja' => ['required' => 'Debe ingresar la fecha']
        ]);
        if (!$validate -> withRequest($this->request) -> run()) {
            return redirect() -> back() -> withInput() -> with('errors',$validate->getErrors());
        }

        $idAmo = $this->request->getPost('selectowner');
        $idMascota = $this->request->getPost('selectpet'); 
        $causa = $this->request->getPost('causa');
        $fecha = $this->request->getPost('fbaja');

        $relacionM = new \App\Models\RelacionAMModel();
        $mascotaM = new \App\Models\MascotaModel();

        $relacionM->where([
            'id_amo'     => $idAmo,
            'id_mascota' => $idMascota
        ])->set([
            'estado' => $causa,
            'fecha'  => $fecha
        ])->update();

        //Caso fallecimiento
        if ($causa == -1) {
            $mascotaM->where('nro_registro', $idMascota)
                ->set(['f_def' => $fecha])
                ->update();
        }

        return redirect()->to('/')->with('success', '😿 Relacion eliminada.');
    }

    public function getEliminarVet() {
        $vetM = new \App\Models\VeterinarioModel();
        $vetsr = $vetM
            ->select('id, nom_ape')
            ->where('f_egreso', '')
            ->findAll();
        
        $veterinarios = ['' => 'Seleccionar veterinario'];
        foreach ($vetsr as $v) {
            $veterinarios[$v['id']] = $v['id'] . '. ' . $v['nom_ape'];
        }

        return view('remove/vet', [
            'veterinarios' => $veterinarios,
            'title' => 'Eliminar veterinario'
        ]);
    }
    public function eliminarVet() {
        $validate = service('validation');
        $validate -> setRules ([
            'selectvet' => 'required'
            ] , [
            'selectvet' => ['required' => 'Debe ingresar el veterinario'] 
        ]);
        if (!$validate -> withRequest($this->request) -> run()) {
            return redirect() -> back() -> withInput() -> with('errors',$validate->getErrors());
        }

        $idVet = $this->request->getPost('selectvet');
        $fecha = $this->request->getPost('fbaja');

        $vetM = new \App\Models\VeterinarioModel();

        $vetM->where( 'id', $idVet)->set('f_egreso', $fecha)->update();

        return redirect()->to('/')->with('success', '🙋🏼‍♀️ Veterinario eliminado.');
    }
    
 
    public function getSearchPets(){
        $amoM= new \App\Models\AmoModel();

        $amosr = $amoM -> findAll();
        $amos=['' => 'DNI'];
        foreach ($amosr as $a) {
            $amos[$a['id']] = $a['id'];
        }

        return view('search/pets', [
            'amos' => $amos,
            'title' => 'Buscar'
        ]);
    }
    public function searchPets() {
        $amoM= new \App\Models\AmoModel();
        $amosr = $amoM -> findAll();
        $amos = ['' => 'DNI'];
        foreach ($amosr as $a) {
            $amos[$a['id']] = $a['id'];
        }

        $idAmo = $this->request->getPost('selectowner');

        $relM = new \App\Models\RelacionAMModel();
        $mascM= new \App\Models\MascotaModel();

        $mascotasA = [];
        $mascotasF = [];
        $mascotasV = [];

        $relaciones = $relM->where('id_amo', $idAmo)->findAll();

        foreach ($relaciones as $rel) {
            $mascota = $mascM->where('nro_registro', $rel['id_mascota'])->first();
            if ($mascota) {
                $item = [
                    'nreg' => $mascota['nro_registro'],
                    'nombre' => $mascota['nombre']
                ];

                switch ($rel['estado']) {
                    case 1:
                        $mascotasA[] = $item;
                        break;
                    case 0:
                        $mascotasV[] = $item;
                        break;
                    case -1:
                        $mascotasF[] = $item;
                        break;
                }
            }
        }

        return view('search/pets', [
            'mascotasA' => $mascotasA,
            'mascotasF' => $mascotasF,
            'mascotasV' => $mascotasV,
            'amos' => $amos,
            'idAmo' => $idAmo,
            'title' => 'Buscar'
        ]);
    }
    public function getSearchOwners(){
        $mascM= new \App\Models\MascotaModel();

        $mascr = $mascM -> where ('f_def', '') -> findAll();
        $mascotas=['' => 'Mascota'];
        foreach ($mascr as $m) {
            $mascotas[$m['nro_registro']] = $m['nro_registro'] . '. ' . $m['nombre'];
        }

        return view('search/owners', [
            'mascotas' => $mascotas,
            'title' => 'Buscar'
        ]);
    }
    public function searchOwners() {
        $mascM= new \App\Models\MascotaModel();
        $mascr = $mascM -> where ('f_def', '') -> findAll();
        $mascotas=['' => 'Mascota'];
        foreach ($mascr as $m) {
            $mascotas[$m['nro_registro']] = $m['nro_registro'] . '. ' . $m['nombre'];
        }

        $nReg = $this->request->getPost('selectpet');

        $relM = new \App\Models\RelacionAMModel();
        $amoM= new \App\Models\AmoModel();

        $amosA = [];
        $amosV = [];

        $relaciones = $relM->where('id_mascota', $nReg)->findAll();

        foreach ($relaciones as $rel) {
            $amo = $amoM->where('id', $rel['id_amo'])->first();
            if ($amo) {
                $item = [
                    'dni' => $amo['id'],
                    'nombre' => $amo['nom_ape']
                ];

                switch ($rel['estado']) {
                    case 1:
                        $amosA[] = $item;
                        break;
                    case 0:
                        $amosV[] = $item;
                        break;
                }
            }
        }

        return view('search/owners', [
            'amosA' => $amosA,
            'amosV' => $amosV,
            'mascotas' => $mascotas,
            'nReg' => $nReg,
            'title' => 'Buscar'
        ]);
    }


    public function mostrar() {
        $amoM = new \App\Models\AmoModel();
        $mascotaM = new \App\Models\MascotaModel();
        $vetM = new \App\Models\VeterinarioModel();
        $relM = new \App\Models\RelacionAMModel();

        $filtro = $this->request->getGet('filtro') ?? 'mascotas';
        $data = [
            'amos' => $amoM->findAll(),
            'mascotas' => $mascotaM->findAll(),
            'veterinarios' => $vetM->findAll(),
            /* Solo mascotas no fallecidas para el dropdown y listado general
            'mascotas' => $mascotaM->where('f_def', '')->findAll(),
            'veterinarios' => $vetM->where('f_egreso', '')->findAll(),
            */
            'filtro' => $filtro,
            
        ];

        if ($filtro === 'mascota_por_amo') {
            $idAmo = $this->request->getGet('id_amo');
            $data['mascotas'] = $idAmo
                ? $mascotaM->select('mascotas.*')
                    ->join('amo-mascota', 'amo-mascota.id_mascota = mascotas.nro_registro')
                    ->where('amo-mascota.id_amo', $idAmo)
                    ->where('amo-mascota.estado', 1)
                    ->where('mascotas.f_def', '') // Excluir mascotas fallecidas
                    ->findAll()
                : [];
            $data['id_amo'] = $idAmo;
        } elseif ($filtro === 'amo_por_mascota') {
            $idMascota = $this->request->getGet('id_mascota');
            $data['amos'] = $idMascota
                ? $amoM->select('amos.*')
                    ->join('amo-mascota', 'amo-mascota.id_amo = amos.id')
                    ->where('amo-mascota.id_mascota', $idMascota)
                    ->where('amo-mascota.estado', 1)
                    ->findAll()
                : [];
            $data['id_mascota'] = $idMascota;
        }

        return view('layouts/header', ['title' => 'Mostrar'])
            . view('layouts/menu')
            . view('display/mostrar', $data)
            . view('layouts/footer');
    }
}