<?php namespace Bantenprov\PelayananKesehatan\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* Model */
use Bantenprov\PelayananKesehatan\Facades\PelayananKesehatan;
use Bantenprov\PelayananKesehatan\Models\TarifModel;
use Bantenprov\MasterTarif\Models\MasterTarifModel;

/* ETC */
use Ramsey\Uuid\Uuid;

/**
 * The TarifController class.
 *
 * @package Bantenprov\PelayananKesehatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class TarifController extends Controller
{

    public function index()
    {

        $tarifs = TarifModel::with('getMasterTarif')->get();

        return view('pelayanan-kesehatan::tarif.index',compact('tarifs'));
    }

    public function create()
    {
        $master_tarifs = MasterTarifModel::all();

        return view('pelayanan-kesehatan::tarif.create', compact('master_tarifs'));
    }

    public function store(Request $request)
    {
        $master_tarif = MasterTarifModel::find($request->master_tarif);

        $request->validate([
            'uraian'            => 'required',
            'tarif'             => 'required',
            'jasa_pelayanan'    => 'required',
            'jasa_sarana'       => 'required',
            'satuan'            => 'required',
            'master_tarif_id'   => 'required',
        ]);

        TarifModel::create([
            'uuid'              => Uuid::uuid5(Uuid::NAMESPACE_DNS, 'bantenprov.go.id'.date('YmdHis')),
            'uraian'            => $request->uraian,
            'tarif'             => $request->tarif,
            'jasa_pelayanan'    => $request->jasa_pelayanan,
            'jasa_sarana'       => $request->jasa_sarana,
            'satuan'            => $request->satuan,
            'master_tarif_id'   => $request->master_tarif_id,
            'user_id'           => \Auth::user()->id,
            'user_update'       => \Auth::user()->id,
        ]);

        $request->session()->flash('message', 'Success add new tarif.');

        return redirect()->route('tarif.index');
    }

    public function show($id)
    {
        $tarif = TarifModel::find($id);

        return view('pelayanan-kesehatan::tarif.show', compact('tarif'));
    }

    public function edit($id)
    {
        $tarif = TarifModel::find($id);
        $master_tarifs = MasterTarifModel::all();

        return view('pelayanan-kesehatan::tarif.edit', compact('tarif','master_tarifs'));
    }

    public function update(Request $request, $id)
    {
        $master_tarif = MasterTarifModel::find($request->master_tarif);

        $request->validate([
            'uraian'            => 'required',
            'tarif'             => 'required|unique:tarifs,id,'.$id,
            'jasa_pelayanan'    => 'required',
            'jasa_sarana'       => 'required',
            'satuan'            => 'required',
            'master_tarif_id'   => 'required',
        ]);

        TarifModel::find($id)->update([
            'uraian'            => $request->uraian,
            'tarif'             => $request->tarif,
            'jasa_pelayanan'    => $request->jasa_pelayanan,
            'jasa_sarana'       => $request->jasa_sarana,
            'satuan'            => $request->satuan,
            'master_tarif_id'   => $request->master_tarif_id,
            'user_update'       => \Auth::user()->id,
        ]);

        $request->session()->flash('message', 'Success update tarif.');

        return redirect()->route('tarif.index');
    }

    public function destroy($id)
    {
        TarifModel::find($id)->delete();

        $request->session()->flash('message', 'Success delete tarif.');

        return redirect()->route('tarif.index');
    }
}
