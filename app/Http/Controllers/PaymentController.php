<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ps = Payment::all();
        return response()->json([
            'status' => 200,
            'ps' => $ps,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pStatus' => 'required',
            'pDate' => 'required',
            'pAmount' => 'required',
            'pRemarks' => 'nullable',
            'pState' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create payment.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'pStatus',
            'pDate',
            'pAmount',
            'pRemarks',
            'pState',
            'document_id']);

        $p = Payment::create($data);

        return response()->json([
            'message' => 'Payment created successfully.',
            'p' => $p,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return response()->json([
            'message' => 'Payment deleted successfully.',
        ], 200);
    }
}