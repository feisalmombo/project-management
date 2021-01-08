<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PORequestMarket;
use App\PORequestItemDetails;
use DB;
use Auth;

class PurchaseOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('managePurchaseOrder.purchaseorder');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('managePurchaseOrder.addpurchaseorder');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $porequestmarket = new PORequestMarket();
        $porequestmarket->marketperson_id  = \Auth::user()->id;
        $porequestmarket->status = "Booked";
        // return json_encode($porequestmarket);
        $porequestmarket->save();

        $this->validate(request(), [
            'purchase_name' => 'required|string',
            'purchase_value' => 'required|string',
            'client_name' => 'required|string',
        ]);

        $porequestItem = new PORequestItemDetails();
        $porequestItem->po_name = $request->purchase_name;
        $porequestItem->po_value = $request->purchase_value;
        $porequestItem->client = $request->client_name;
        $porequestItem->requestmarket()->associate($porequestmarket);
        $st = $porequestItem->save();

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert Purchase Order data');
        }
        return redirect()->back()->with('message', 'Purchase Order is successfully added');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
