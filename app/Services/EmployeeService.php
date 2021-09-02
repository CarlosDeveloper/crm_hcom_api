<?php

namespace App\Services;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeService {

    //variables
    //model and table companies
    protected $model;

    public function __construct( Employee $model) {
        $this->model = $model;
    }

    public function getAll() {
        return $this->model->with('company')->paginate(10);
    }

    public function create( array $request ) {
        
        return $this->model->create($request);
     
    }

    public function findByID($id) {
        return $this->model->find($id);
    }

    public function save( array $request, $id) {
        return $this->model->find($id)->update($request);
    }

    public function delete( $id) {
        return  $this->model->find($id)->delete();
    }
}