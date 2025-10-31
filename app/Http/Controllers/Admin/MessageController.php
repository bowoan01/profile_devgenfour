<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MessageController extends Controller
{
    public function index(): View
    {
        $messages = Message::latest()->paginate(20);

        return view('admin.messages.index', compact('messages'));
    }

    public function show(Message $message): View
    {
        if (! $message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.messages.show', compact('message'));
    }

    public function update(MessageRequest $request, Message $message): RedirectResponse
    {
        $message->update($request->validated());

        return redirect()->route('admin.messages.show', $message)->with('status', 'Status pesan diperbarui.');
    }

    public function destroy(Message $message): RedirectResponse
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('status', 'Pesan berhasil dihapus.');
    }
}
