<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboard.event.index', [
            'events' => Event::filter()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'nama_event' => 'required',
            'deskripsi' => 'required',
            'cafe_id' => 'required'
        ]);

        if ($request->file('gambar')) {
            $validasiData['gambar'] = $request->file('gambar')->store('post-images');
        };

        Event::create($validasiData);

        return redirect('/dashboard/event')->with('success', 'Event Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('dashboard.event.edit', [
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validasiData = $request->validate([
            'nama_event' => 'required',
            'deskripsi' => 'required',
        ]);
        if ($request->file('gambar')) {
            if (isset($request->gambar_lama)) {
                Storage::delete($request->gambar_lama);
            }
            $validasiData['gambar'] = $request->file('gambar')->store('post-images');
        }

        Event::Where('id', $event->id)->update($validasiData);

        return redirect()->back()->with('success', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if (isset($event->gambar)) {
            Storage::delete($event->gambar);
        }

        Event::where('id', $event->id)->delete();

        return redirect()->back()->with('error', 'Berhasil Di Hapus');
    }
}
