<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layanan = Layanan::all();
        return view('layanan.index', [
            'layanan' => $layanan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validateWithBag('addLayanan', [
            'name' => ['string', 'required', 'max:255'],
            'jenis' => ['string', 'required', 'max:255'],
            'minimal_order' => ['nullable', 'integer'],
            'harga' => ['required', 'string'],
            'estimasi' => ['required', 'string'],
            'icon' => ['nullable', 'string'],
            'keterangan' => ['nullable', 'string'],
        ]);

        Layanan::create([
            'name' => $request->name,
            'jenis' => $request->jenis,
            'minimal_order' => $request->minimal_order,
            'harga' => $request->harga,
            'estimasi' => $request->estimasi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan');
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
        $data = Layanan::findOrFail($id);

        return view('layanan.partial.edit-layanan', [
            'data' => $data
        ]);
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
        $request->validateWithBag('editLayanan', [
            'name' => ['string', 'required', 'max:255'],
            'jenis' => ['string', 'required', 'max:255'],
            'minimal_order' => ['nullable', 'integer'],
            'harga' => ['required', 'string'],
            'estimasi' => ['required', 'string'],
            'keterangan' => ['nullable', 'string'],
        ]);

        $data = Layanan::findOrFail($id);

        $data->update([
            'name' => $request->name,
            'jenis' => $request->jenis,
            'minimal_order' => $request->minimal_order,
            'harga' => $request->harga,
            'estimasi' => $request->estimasi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('layanan.edit', $data->id)->with('success', 'Layanan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Layanan::findOrFail($id);
        $data->delete();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus');
    }
}
