<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServicesController extends Controller
{
    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->middleware('auth');
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = $this->serviceRepository->paginated();
        return view('pages.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = auth()->id();
        $service = $this->serviceRepository->create($input);
        if($service) {
            Session::flash('alert-success', 'Service added!!!');
            return redirect()->route('services.show');
        }
        Session::flash('alert-danger','');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('pages.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('pages.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $input = $request->all();
        $input['updated_by'] = auth()->id();
        $response = $this->serviceRepository->update($input, $service->id);
        if($response) {
            Session::flash('alert-success', 'Service updated!!!');
            return redirect()->route('services.show');
        }
        Session::flash('alert-danger','');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $response = $this->serviceRepository->delete($service->id);
        if($response) {
            return redirect()->route('services.show');
        }
        Session::flash('alert-danger','Could not delete record!!!');
        return redirect()->back();
    }
}
