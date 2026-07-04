<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ChatGatewayException;
use App\Http\Controllers\Controller;
use App\Http\Requests\KnowledgeDocumentRequest;
use App\Jobs\ProcessKnowledgeDocument;
use App\Models\KnowledgeDocument;
use App\Services\ChatGatewayClient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class KnowledgeDocumentController extends Controller
{
    public function index(): View
    {
        $documents = KnowledgeDocument::query()->ordered()->paginate(20);

        return view('backend.knowledge-documents.index', compact('documents'));
    }

    public function create(): View
    {
        return view('backend.knowledge-documents.create');
    }

    public function store(KnowledgeDocumentRequest $request): RedirectResponse
    {
        $file = $request->file('file');
        $path = $file->store('knowledge-documents', 'public');

        $document = KnowledgeDocument::query()->create([
            'title' => $request->input('title') ?: $file->getClientOriginalName(),
            'original_filename' => $file->getClientOriginalName(),
            'disk' => 'public',
            'path' => $path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'status' => 'pending',
            'uploaded_by' => auth()->id(),
        ]);

        ProcessKnowledgeDocument::dispatch($document->id);

        return redirect()->route('admin.knowledge-documents.index')
            ->with('status', 'Document uploaded — it will appear in the chatbot once processing finishes.');
    }

    public function destroy(KnowledgeDocument $knowledge_document, ChatGatewayClient $gateway): RedirectResponse
    {
        try {
            $gateway->ingest([
                'source_type' => 'document',
                'source_id' => "document:{$knowledge_document->id}",
                'action' => 'delete',
            ]);
        } catch (ChatGatewayException $e) {
            Log::error('Failed to remove document from knowledge base: '.$e->getMessage());
        }

        Storage::disk($knowledge_document->disk)->delete($knowledge_document->path);
        $knowledge_document->delete();

        return redirect()->route('admin.knowledge-documents.index')->with('status', 'Document deleted successfully.');
    }
}
