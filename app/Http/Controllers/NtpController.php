<?php

namespace App\Http\Controllers;

use App\Models\Ntp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NtpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ntps = Ntp::all();
        return response()->json([
            'status' => 200,
            'ntps' => $ntps,
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
            'ntpDate' => 'nullable',
            'ntp' => 'required',
            'ntpProjectEngineer' => 'nullable',
            'ntpContractor' => 'nullable',
            'ntpContractAmount' => 'nullable',
            'ntpContractDuration' => 'nullable',
            'ntpRevisedContactAmount' => 'nullable',
            'ntpRevisedContractDuration' => 'nullable',
            'ntpRemarks' => 'nullable',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create ntp.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'ntpDate',
            'ntp',
            'ntpProjectEngineer',
            'ntpContractor',
            'ntpContractAmount',
            'ntpContractDuration',
            'ntpRevisedContactAmount',
            'ntpRevisedContractDuration',
            'ntpRemarks',
            'document_id',
        ]);

        $ntp = Ntp::create($data);

        return response()->json([
            'message' => 'Ntp created successfully.',
            'fb' => $ntp,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ntp $ntp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ntp $ntp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ntp $ntp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ntp = Ntp::find($id);
        $ntp->delete();

        return response()->json([
            'message' => 'Ntp deleted successfully.',
        ], 200);
    }
}