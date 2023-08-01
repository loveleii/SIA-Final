<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Middleware\HandleInertiaRequests;
use Inertia\Inertia;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::orderBy('name')->get();

        return inertia('Customers/Index',[
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Customers/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $fields = $request->validate([
            'name' => 'string|required',
            'location' => 'string|required',
            'phone' => 'string|required',
            'stylist' => 'string|required',
            'price' => 'integer|required',
            'adate' => 'date|required',
            'email' => 'string',
        ]);

        $fileName = null;

        if ($request->pic) {
            $fileName = time() . '.' . $request->pic->extension();
            $request->pic->move(public_path('uploads/pic'), $fileName);
            $fields['pic'] = $fileName;
        }
        Customer::create($fields);

        return redirect()->route('customers')->banner('Customer Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return inertia('Customers/Show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return inertia('Customers/Edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'string|required',
            'location' => 'string|required',
            'phone' => 'string|required',
            'stylist' => 'string|required',
            'price' => 'integer|required',
            'adate' => 'date|required',
        ]);

        $customer->update($request->all());

        $request->session()->flash('flash.banner', 'Customer Info Updated Successfully!');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/customers/' . $customer->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers')->dangerBanner('Customer Removed Successfully!');
    }

    public function search($searchKey) {
        return inertia('Customers/Index', [
            'customers' => Customer::where('name', 'like', "%$searchKey%")->orWhere('location', 'like', "%$searchKey%")->get()
        ]);
    }

    public function toggle(Customer $customer) {
        $customer->available = !$customer->available;
        $customer->save();

        return back();
    }

    public function email(Customer $customer) {
        $customers = Customer::all();


        $filename = 'statements/' . $customer->name . "_" . $customer->id . "";


        Mail::send('email.soa', ['customer'=>$customer], function($message) use ($customer){
            $message->to($customer->email);
            $message->subject('Customers');
        });

        return back();
      }
}
