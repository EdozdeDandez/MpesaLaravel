<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Repositories\CustomerRepository;
use App\Utilities\AlertUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomersController extends Controller
{
    protected $customerRepository;
    protected $utils;

    public function __construct(CustomerRepository $customerRepository, AlertUtils $utils)
    {
        $this->middleware('auth');
        $this->customerRepository = $customerRepository;
        $this->utils = $utils;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customerRepository->paginated();
        return view('pages.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = auth()->id();
        $customer = $this->customerRepository->create($input);
        if($customer) {
            $this->utils->sendSMS($customer->phone, 'You have been registered as a customer');
            Session::flash('alert-success', 'Customer added!!!');
            return redirect()->route('customers.show');
        }
        Session::flash('alert-danger','');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('pages.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('pages.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $input = $request->all();
        $input['updated_by'] = auth()->id();
        $response = $this->customerRepository->update($input, $customer->id);
        if($response) {
            Session::flash('alert-success', 'Customer updated!!!');
            return redirect()->route('customers.show');
        }
        Session::flash('alert-danger','Could not update record!!!');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $response = $this->customerRepository->delete($customer->id);
        if($response) {
            return redirect()->route('customers.show');
        }
        Session::flash('alert-danger','Could not delete record!!!');
        return redirect()->back();
    }
}
