<?php 

namespace Bantenprov\PelayananKesehatan;

use Bantenprov\PelayananKesehatan\Models\PelayananKesehatanModel;
use Illuminate\Http\Request;
/**
 * The PelayananKesehatan class.
 *
 * @package Bantenprov\PelayananKesehatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PelayananKesehatan
{
    protected $pelayanan_kesehatan_model;
    
    public function __construct()
    {        
        $this->pelayanan_kesehatan_model = new PelayananKesehatanModel();
    }

    public function welcome()
    {
        return 'Welcome to Bantenprov\PelayananKesehatan package';
    }

    public function index()
    {
        return $pelanan_kesehatans = PelayananKesehatanModel::orderBy('kunker','asc')->get();                

        //return view('unit_kerja.index',compact('pelanan_kesehatans'));
        
    }

    public function tree()
    {
        $nodes = PelayananKesehatanModel::get()->toTree();
        
        $traverse = function ($categories, $prefix = '-') use (&$traverse) {
            foreach ($categories as $category) {
                echo $prefix.' '.$category->kunker.' - '.$category->name.' - ['.$category->npej.']<br>';
        
                $traverse($category->children, $prefix.'-');
            }
        };
        
        return $traverse($nodes); 
    }

    public function createRoot()
    {

        return view('unit_kerja.create-root');
    }

    public function createChild()
    {
        return $unit_kerjas = PelayananKesehatanModel::all();

        //return view('unit_kerja.create-child',compact('unit_kerjas'));
    }

    public function addChild($id)
    {
        return $unit_kerja = PelayananKesehatanModel::where('id',$id)->first();

        //return view('unit_kerja.add-child',compact('unit_kerja'));
    }
    
    public function storeRoot($request = array())
    {        
        $check_root = PelayananKesehatanModel::where('id',$request->root);
        
        if($check_root->first()->isEmpty())
        {                        

            $unit_kerja = PelayananKesehatanModel::create([
                'kunker' => $request->kunker,
                'kunker_simral' => '',
                'kunker_sinjab' => '',
                'name' => $request->name,
                'levelunker' => $request->levelunker,
                'npej' => $request->npej,
                'njab' => $request->njab
            ]);
        }
        else
        {
            return redirect()->back();
        }

        

        return redirect()->back();
    }

    public function storeChild($request = array())
    {
        $check_root = PelayananKesehatanModel::where('id',$request->root);
                          
            $check_root->first()->children()->create([
                'kunker' => $request->c_kunker,
                'kunker_simral' => '',
                'name' => $request->c_name,
                'levelunker' => $request->c_levelunker,
            ]);        

        return redirect()->back();
    }
}
