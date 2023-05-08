<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docuements = Document::all();
        return response()->json([
            'status' => 200,
            'docuements' => $docuements,
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
            'projectId' => 'required|unique:documents,projectId',
            'controlNumber' => 'required|unique:documents,controlNumber',
            'projectTitle' => 'required',
            'contractor' => 'nullable',
            // 'barangayDocument' => 'required',
            'municipalityDocument' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create document.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'projectId',
            'controlNumber',
            'projectTitle',
            'contractor',
            'barangayDocument',
            'municipalityDocument']);

        $document = Document::create($data);

        return response()->json([
            'message' => 'Document created successfully.',
            'document' => $document,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $document = Document::find($id);

        if (!$document) {
            return response()->json([
                'message' => 'Document not found.',
            ], 404);
        }

        return response()->json([
            'document' => $document,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            'projectId' => 'required|unique:documents,projectId,' . $id,
            'controlNumber' => 'required|unique:documents,controlNumber,' . $id,
            'projectTitle' => 'required',
            'contractor' => 'nullable',
            // 'barangayDocument' => 'required',
            'municipalityDocument' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to update document.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $document = Document::findOrFail($id);

        $data = $request->only([
            'projectId',
            'controlNumber',
            'projectTitle',
            'contractor',
            'barangayDocument',
            'municipalityDocument']);

        if ($document->projectId === $data['projectId'] && $document->controlNumber === $data['controlNumber']) {
            $keysToRemove = ['projectId', 'controlNumber'];
            foreach ($keysToRemove as $key) {
                if (array_key_exists($key, $data)) {
                    unset($data[$key]);
                }
            }
        }

        $document = Document::updateOrCreate(['id' => $id], $data);

        return response()->json([
            'message' => 'document updated successfully.',
            'document' => $document,
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($document_id)
    // {
    //     $document = Document::where('document_id', $document_id)->first();

    //     if (!$document) {
    //         return response()->json([
    //             'message' => 'Document not found.',
    //         ], 404);
    //     }

    //     $document->delete();

    //     return response()->json([
    //         'message' => 'Document deleted successfully.',
    //     ], 200);
    // }

    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();

        return response()->json([
            'message' => 'Document deleted successfully.',
        ], 200);
    }
}