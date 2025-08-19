<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Matter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'matter_id' => ['required','exists:matters,id'],
            'file' => ['required','file','max:10240'] // 10MB example
        ]);

        $file = $validated['file'];
        $path = $file->store('documents/'.date('Y/m'), config('filesystems.default'));

        $doc = Document::create([
            'matter_id' => $validated['matter_id'],
            'uploaded_by' => Auth::id(),
            'original_name' => $file->getClientOriginalName(),
            'path' => $path,
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
        ]);

        return back()->with('success','Document uploaded.');
    }

    public function destroy(Document $document)
    {
        Storage::disk(config('filesystems.default'))->delete($document->path);
        $document->delete();
        return back()->with('success','Document deleted.');
    }
}
