<?php
namespace Bantenprov\PelayananKesehatan\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\PelayananKesehatan\Facades\PelayananKesehatan;
use Bantenprov\PelayananKesehatan\Models\PelayananKesehatanModel;

/**
 * The PelayananKesehatanController class.
 *
 * @package Bantenprov\PelayananKesehatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PelayananKesehatanController extends Controller
{
    public function demo()
    {
        return PelayananKesehatan::welcome();
    }

    public function index()
    {

        $pelayanan_kesehatans = PelayananKesehatanModel::orderBy('kunker','asc')->paginate(10);        

        /* $nodes = PelayananKesehatanModel::get()->toTree();

        $traverse = function ($categories, $prefix = '-') use (&$traverse) {
            foreach ($categories as $category) {
                echo $prefix.' '.$category->kunker.' - '.$category->name.'<br>';

                $traverse($category->children, $prefix.'-');
            }
        };

        $traverse($nodes); */


        return view('pelayanan-kesehatan::index',compact('pelayanan_kesehatans'));
        
    }

    public function createRoot()
    {

        return view('pelayanan-kesehatan::create-root');
    }

    public function createChild()
    {
        $unit_kerjas = PelayananKesehatanModel::all();

        return view('pelayanan-kesehatan::create-child',compact('unit_kerjas'));
    }

    public function addChild($id)
    {
        $unit_kerja = PelayananKesehatanModel::where('id',$id)->first();

        return view('pelayanan-kesehatan::add-child',compact('unit_kerja'));
    }

    public function storeRoot(Request $request)
    {
        $request->validate([
            'kunker'            => 'required',
            'leveunker'         => 'required',
            'name'              => 'required',
            'njab'              => 'required',
            'npej'              => 'required',
        ]);

        $check_root = PelayananKesehatanModel::where('id',$request->root);

        if($check_root->get()->isEmpty())
        {
            $unit_kerja = PelayananKesehatanModel::create([
                'kunker' => $request->kunker,
                'kunker_sinjab' => '',
                'kunker_simral' => '',
                'kunker_sinjab' => '',
                'name' => $request->name,
                'levelunker' => $request->levelunker,
                'njab' => $request->njab,
                'npej' => $request->npej
            ]);
        }
        else
        {
            return redirect()->back();
        }

        return redirect()->back();
    }

    public function storeChild(Request $request)
    {
        $request->validate([
            'kunker'            => 'required',
            'name'              => 'required',
            'njab'              => 'required',
            'npej'              => 'required',
        ]);

        $check_root = PelayananKesehatanModel::where('id',$request->root);

            $check_root->first()->children()->create([
                'kunker'            => $request->c_kunker,
                'kunker_simral'     => '',
                'kunker_sinjab'     => '',
                'name'              => $request->c_name,
                'levelunker'        => $check_root->first()->levelunker + 1,
                'njab'              => $request->c_njab,
                'npej'              => $request->c_npej
            ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        $pelayanan_kesehatan = PelayananKesehatanModel::find($id);        

        return view('pelayanan-kesehatan::edit', compact('pelayanan_kesehatan'));
    }

    public function update($id, Request $request)
    {        
        $request->validate([
            'kunker'            => 'required',
            'name'              => 'required',
            /* 'kunker_sinjab'     => 'required',
            // 'kunker_simral'     => 'required', */
            // 'levelunker'        => 'required',
            'njab'              => 'required',
            'npej'              => 'required',
        ]);
        
        PelayananKesehatanModel::find($id)->update([
            'kunker'            => $request->kunker ? $request->kunker : '',
            'name'              => $request->name  ? $request->name : '',
            /* 'kunker_sinjab'     => $request->kunker_sinjab,
            'kunker_simral'     => $request->kunker_simral', */
            // 'levelunker'        => $request->levelunker  ? $request->levelunker : '',
            'njab'              => $request->njab  ? $request->njab : '',
            'npej'              => $request->npej  ? $request->npej : '',
        ]);

        $request->session()->flash('message', 'Successfully modified the pelayanan_kesehatan!');

        return redirect()->route('pelayanan_kesehatan.index');
    }
}