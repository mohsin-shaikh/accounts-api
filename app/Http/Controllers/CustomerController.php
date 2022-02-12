<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Resources\CustomersResource;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CustomerController extends Controller
{
    /**HTTP Status
     * 1XX Info
     * 2XX Response Successfully
     * 3XX Redirection
     * 4XX Error Client
     * 5XX Error Server
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return CustomersResource::collection(Customer::where('book_id', $request->book)->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Not Used
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->all());

        // return response([
        //     'data' => new CustomersResource($customer)
        // ], Response::HTTP_CREATED);
        return new CustomersResource($customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(int $book, Customer $customer)
    {
        // $customer = Customer::find($customer);
        // if (!$customer) {
        //     throw new HttpException(404, 'Customer not found');
        // }
        return new CustomersResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        // Not Used
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, int $book, Customer $customer)
    {
        // if (!$customer) {
        //     throw new HttpException(400, "Invalid id");
        // }

        // try {
        //     $customer = Customer::find($customer);
        //     if (is_object($customer)) {
        //         $customer->update($request->all());
        //         return new CustomersResource($customer);
        //     } else {
        //         throw new \Exception("Invalid id", 1);
        //     }
        // } catch (\Exception $exception) {
        //     throw new HttpException(400, "Invalid data - {$exception->getMessage()}");
        // }

        $customer->update($request->all());
        return new CustomersResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response(null, 204);
    }
}
