<?php

namespace App\Http\Controllers;

use App\Models\Obr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obrs = Obr::all();
        return response()->json([
            'status' => 200,
            'obrs' => $obrs,
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
            'obrStatus' => 'required',
            'obrDate' => 'required',
            'obr' => 'required',
            'obrRemarks' => 'nullable',
            'obrState' => 'required',
            'obrNumbers' => 'nullable',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create obr.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'obrStatus',
            'obrDate',
            'obr',
            'obrRemarks',
            'obrNumbers',
            'obrState',
            'document_id']);

        $obr = Obr::create($data);

        return response()->json([
            'message' => 'Obr created successfully.',
            'obr' => $obr,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Obr $obr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obr $obr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $document_id)
    {
        $validator = Validator::make($request->all(), [
            'obrStatus' => 'required',
            'obrDate' => 'required',
            'obr' => 'required',
            'obrRemarks' => 'nullable',
            'obrState' => 'required',
            'obrNumbers' => 'nullable',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to update obr.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $obr = Obr::where('document_id', $document_id)->firstOrFail();

        $data = $request->only([
            'obrStatus',
            'obrDate',
            'obr',
            'obrRemarks',
            'obrNumbers',
            'obrState',
            'document_id',
        ]);

        $obr->update($data);

        return response()->json([
            'message' => 'Obr updated successfully.',
            'obr' => $obr,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obr $obr)
    {
        $obr->delete();

        return response()->json([
            'message' => 'Obr deleted successfully.',
        ], 200);
    }
}