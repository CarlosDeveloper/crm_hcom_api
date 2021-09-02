<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Services\EmployeeService;
use App\Requests\StoreEmployeeRequest;

class EmployeeController extends Controller
{

    private $employeeService;
    private $companieService;

    public function __construct( EmployeeService $employeeService,
                                 CompanyService $companieService ) {
        $this->employeeService = $employeeService;
        $this->companieService = $companieService;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
           $employees = $this->employeeService->getAll();
            
            return $employees;
        } catch (QueryException $exception) {
            return $exception;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        try{ 
            $employee = $this->employeeService->create( $request->all() );
            return response()->json([
                'response' => true,
                'message' => 'Register ' . $employee->id. ' has been inserted'
            ]);
        } catch (QueryException $exception) {
            return response()->json([
                'response' => false,
                'message' => $exception
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployeeRequest $request, $id)
    {
        try{ 
            $this->employeeService->save( $request->all(), $id );
            $employee = $this->employeeService->findById($id);
            return response()->json([
                'response' => true,
                'message' => 'Register ' . $employee->id. ' has been updated'
            ]);
        } catch (QueryException $exception) {
            return response()->json([
                'response' => false,
                'message' => $exception
            ]);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{ 
            $this->employeeService->delete($id);
            return response()->json([
                'response' => true,
                'message' => 'Register ' . $id. ' has been deleted'
            ]);
        } catch (QueryException $exception) {
            return response()->json([
                'response' => false,
                'message' => $exception
            ]);
        } 
    }
}
