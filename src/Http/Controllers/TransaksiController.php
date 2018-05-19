<?php

namespace Bantenprov\PelayananKesehatan\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* Model */
use Bantenprov\PelayananKesehatan\Facades\PelayananKesehatan;
use Bantenprov\PelayananKesehatan\Models\TarifModel;
use Bantenprov\PelayananKesehatan\Models\TransaksiModel;
use Bantenprov\MasterTarif\Models\MasterTarifModel;
use Bantenprov\DaftarRetribusi\Models\DaftarRetribusiModel;

/* ETC */
use Ramsey\Uuid\Uuid;

/**
 * The TransaksiController class.
 *
 * @package Bantenprov\PelayananKesehatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */

class TransaksiController extends Controller
{
    public function index()
    {

        return view('pelayanan-kesehatan::transaksi.index');
    }

    public function create()
    {
        $random_number = rand(1000000, 9999999). rand(1000000, 9999999);
        $nomor = str_shuffle($random_number);

        session(['nomor' => $nomor]);

        $daftar_retribusis = DaftarRetribusiModel::all();


        return view('pelayanan-kesehatan::transaksi.create', compact('nomor','daftar_retribusis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor'                     => 'unique:transaksies,nomor',
            'total'                     => 'required',
            'grandtotal'                => 'required',
            'denda'                     => 'required',
            'potongan'                  => 'required',
            'daftar_retribusi_id'       => 'required',
        ]);

        $daftar_retribusi = DaftarRetribusiModel::find($request->daftar_retribusi_id);

        $master_tarif = MasterTarifModel::where('daftar_retribusi_id', '=', $daftar_retribusi->id)->where('status', '=', '1')->first();

        TransaksiModel::create([
            'uuid'                      => Uuid::uuid5(Uuid::NAMESPACE_DNS, 'bantenprov.go.id'.date('YmdHis')),
            'nomor'                     => session('nomor'),
            'total'                     => $request->total,
            'grandtotal'                => $request->grandtotal,
            'denda'                     => $request->denda,
            'potongan'                  => $request->potongan,
            'admin_id'                  => \Auth::user()->id,
            'customer_transaksi_id'     => 1,
            'tarif_id'                  => $master_tarif->id,
            'admin_uuid'                => Uuid::uuid5(Uuid::NAMESPACE_DNS, 'bantenprov.go.id'.date('YmdHis')),
            'customer_transaksi_uuid'   => Uuid::uuid5(Uuid::NAMESPACE_DNS, 'bantenprov.go.id'.date('YmdHis')),
            'tarif_uuid'                => $master_tarif->uuid,
        ]);

        $request->session()->flash('message', 'Success add new transaksi');

        return redirect()->route('transaksi.index');
    }

    public function show()
    {

        return view('pelayanan-kesehatan::transaksi.show');
    }

    public function edit()
    {

        return view('pelayanan-kesehatan::transaksi.edit');
    }

    public function update()
    {

        return view('pelayanan-kesehatan::transaksi.index');
    }

    public function destroy()
    {

        return view('pelayanan-kesehatan::transaksi.index');
    }
}
