<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Services\EmailService;
use App\Services\ImageService;
use Illuminate\Database\QueryException;
use App\Requests\StoreCompanyRequest;

class CompanyController extends Controller
{

    private $companieService;
    private $imageService;
    private $emailService;

    public function __construct( CompanyService $companieService,
                                 ImageService $imageService,
                                 EmailService $emailService ) {
        $this->companieService = $companieService;
        $this->imageService = $imageService;
        $this->emailService = $emailService;
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
            $companies = $this->companieService->getAll();
            return $companies;
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
    public function store(StoreCompanyRequest $request)
    {
        try{ 
            $companie = $this->companieService->create( $request->validated() );
            if( $request->logo ){
                $name = $this->imageService->saveImage($request, $companie->id);
                $companie->fill( array( 'logo' => $name ) );
                $companie->save();
            }

            $this->emailService->sendEmail($companie->email, $companie->name);
            return response()->json([
                'response' => true,
                'message' => 'Register ' . $companie->id. ' has been inserted'
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
    public function update(StoreCompanyRequest $request, $id)
    {
        try{
            
            $this->companieService->save( $request->validated(), $id );
            $companie = $this->companieService->findById($id);
            if( $request->logo ){
                $name = $this->imageService->saveImage($request, $id);
                $companie->fill( array( 'logo' => $name ) );
                $companie->save();
            }
            return response()->json([
                'response' => true,
                'message' => 'Register ' . $companie->id. ' has been updated'
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
            $this->companieService->delete($id);
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
