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

        $pelayanan_kesehatans = PelayananKesehatanModel::orderBy('kunker','asc')->get();                

        $nodes = PelayananKesehatanModel::get()->toTree();

        $traverse = function ($categories, $prefix = '-') use (&$traverse) {
            foreach ($categories as $category) {
                echo $prefix.' '.$category->kunker.' - '.$category->name.'<br>';

                $traverse($category->children, $prefix.'-');
            }
        };

        $traverse($nodes);


        return view('pelayanan-kesehatan::unit_kerja.index',compact('pelayanan_kesehatans'));
        
    }

    public function createRoot()
    {

        return view('pelayanan-kesehatan::unit_kerja.create-root');
    }

    public function createChild()
    {
        $unit_kerjas = PelayananKesehatanModel::all();

        return view('pelayanan-kesehatan::unit_kerja.create-child',compact('unit_kerjas'));
    }

    public function addChild($id)
    {
        $unit_kerja = PelayananKesehatanModel::where('id',$id)->first();

        return view('pelayanan-kesehatan::unit_kerja.add-child',compact('unit_kerja'));
    }

    public function storeRoot(Request $request)
    {
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
        $check_root = PelayananKesehatanModel::where('id',$request->root);

            $check_root->first()->children()->create([
                'kunker' => $request->c_kunker,
                'kunker_simral' => '',
                'kunker_sinjab' => '',
                'name' => $request->c_name,
                'levelunker' => $request->c_levelunker,
                'njab' => $request->c_njab,
                'npej' => $request->c_npej
            ]);

        return redirect()->back();
    }
}