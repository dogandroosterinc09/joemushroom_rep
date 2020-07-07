<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

/**s
 * @ Form Request 
 **/
use App\Http\Requests\FaqsRequest\StoreFaqs;
use App\Http\Requests\FaqsRequest\UpdateFaqs;
use App\Http\Requests\FaqsRequest\DeleteFaqs;
/**
 * @ Repository 
 **/
use App\Repositories\FaqsRepository;

class FaqsArchiveController extends Controller
{
    /**
     *@ Repository Implementation 
     **/
    protected $faqs;

    /**
     * Create a new controller instance
     * @param FaqsRepository $FaqsRepository
     * @ Constructor 
     **/
    public function __construct(FaqsRepository $FaqsRepository)
    {
        $this->faqs = $FaqsRepository;
    }

    public function index() 
    {
        $faqs = $this->faqs->showAllfaqs();
        return view('admin.pages.faqs.index', compact('faqs'));
    }

    public function faqsCreate() 
    {
        return view('admin.pages.faqs.create');
    }


    public function faqsEdit($id) 
    {
        $faqs = $this->faqs->faqsEdit($id);
        return view('admin.pages.faqs.edit', compact('faqs'));
    }

    public function storeFaqs(StoreFaqs $request) 
    {

        $storeFaqs = $this->faqs->storeFaqs($request);
        return back()->with('flash_message', [
            'message' => 'Successfully Added',
            'type' => 'success'
        ]);

    }

    public function updateFaqs(UpdateFaqs $request, $id)
    {
        $updateFaqs = $this->faqs->updateFaqs($request, $id);
        return back()->with('flash_message', [
            'message' => 'Successfully Updated',
            'type' => 'success'
        ]);
    }


    public function deleteFaqs(DeleteFaqs $request)
    {
        $updateFaqs = $this->faqs->deleteFaqs($request);
        return back()->with('flash_message', [
            'message' => 'Successfully Deleted',
            'type' => 'success'
        ]);
    }

}
