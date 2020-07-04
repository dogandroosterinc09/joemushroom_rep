<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

/**s
 * @ Form Request 
 **/
use App\Http\Requests\FacilityRequest\StoreFacility;
use App\Http\Requests\FacilityRequest\UpdateFacility;
use App\Http\Requests\FacilityRequest\DeleteFacility;
/**
 * @ Repository 
 **/
use App\Repositories\FacilityRepository;

class FacilityController extends Controller
{
    /**
     *@ Repository Implementation 
     **/
    protected $facility;

    /**
     * Create a new controller instance
     * @param FacilityRepository $FacilityRepository
     * @ Constructor 
     **/
    public function __construct(FacilityRepository $FacilityRepository)
    {
        $this->facility = $FacilityRepository;
    }

    public function index() 
    {
        $facility = $this->facility->showAllfacility();
        return view('admin.pages.facilities.index', compact('facility'));
    }

    public function facilityCreate() 
    {
        return view('admin.pages.facilities.create');
    }


    public function facilityEdit($id) 
    {
        $facility = $this->facility->facilityEdit($id);
        return view('admin.pages.facilities.edit', compact('facility'));
    }

    public function storeFacility(StoreFacility $request) 
    {

        $storeFacility = $this->facility->storeFacility($request);
        return back()->with('flash_message', [
            'message' => 'Successfully Added',
            'type' => 'success'
        ]);

    }

    public function updateFacility(UpdateFacility $request, $id)
    {
        $updateFacility = $this->facility->updateFacility($request, $id);
        return back()->with('flash_message', [
            'message' => 'Successfully Updated',
            'type' => 'success'
        ]);
    }


    public function deleteFacility(DeleteFacility $request)
    {
        $updateFacility = $this->facility->deleteFacility($request);
        return back()->with('flash_message', [
            'message' => 'Successfully Deleted',
            'type' => 'success'
        ]);
    }

}
