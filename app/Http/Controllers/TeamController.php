<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

/**s
 * @ Form Request 
 **/
use App\Http\Requests\TeamRequest\StoreTeam;
use App\Http\Requests\TeamRequest\UpdateTeam;
use App\Http\Requests\TeamRequest\DeleteTeam;
/**
 * @ Repository 
 **/
use App\Repositories\TeamRepository;

class TeamController extends Controller
{
    /**
     *@ Repository Implementation 
     **/
    protected $member;

    /**
     * Create a new controller instance
     * @param TeamRepository $TeamRepository
     * @ Constructor 
     **/
    public function __construct(TeamRepository $TeamRepository)
    {
        $this->member = $TeamRepository;
    }

    public function index() 
    {
        $member = $this->member->showAllmember();
        return view('admin.pages.team.index', compact('member'));
    }

    public function teamCreate() 
    {
        return view('admin.pages.team.create');
    }


    public function teamEdit($id) 
    {
        $member = $this->member->teamEdit($id);
        return view('admin.pages.team.edit', compact('member'));
    }

    public function storeTeam(StoreTeam $request) 
    {

        $storeTeam = $this->member->storeTeam($request);
        return back()->with('flash_message', [
            'message' => 'Successfully Added',
            'type' => 'success'
        ]);

    }

    public function updateTeam(UpdateTeam $request, $id)
    {
        $updateTeam = $this->member->updateTeam($request, $id);
        return back()->with('flash_message', [
            'message' => 'Successfully Updated',
            'type' => 'success'
        ]);
    }


    public function deleteTeam(DeleteTeam $request)
    {
        $deleteTeam = $this->member->deleteTeam($request);
        return back()->with('flash_message', [
            'message' => 'Successfully Deleted',
            'type' => 'success'
        ]);
    }

}
