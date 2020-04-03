<?php

namespace App\Http\Controllers;

use App\Iklan;
use App\Kategori;
use Illuminate\Support\Facades\DB;
use App\Properti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->forget('properti');
        $data = Properti::where('id_user', '=', Auth::user()->id)->orderBy('id', 'desc')->paginate(4);

        // $kat = DB::table('propertis')->join('kategori', 'kategori.id', '=', 'propertis.id_kat');

        $products = Properti::all();

        return view('customer.iklan', compact('data', 'products'));
    }

    public function dash(Request $request)
    {
        $data = Properti::where('id_user', '=', Auth::user()->id)->get();

        // $kat = Kategori::where('id', '=', DB::table('properti')->id_kat)->get();

        $products = Properti::all();

        return view('customer.dashboard', compact('data', 'products'));
    }

    public function createStep1(Request $request)
    {
        $properti = $request->session()->get('properti');
        // dd($properti);
        return view('customer.tambah1',compact('properti'));
    }

    public function PostcreateStep1(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => 'required',
            'id_kat' => 'required',
        ]);
        if(empty($request->session()->get('properti'))){
            $properti = new Properti();
            $properti->fill($validatedData);
            $request->session()->put('properti', $properti);
        }else{
            $properti = $request->session()->get('properti');
            $properti->fill($validatedData);
            $request->session()->put('properti', $properti);
        }
        return redirect('/properti2');
    }

    public function createStep2(Request $request)
    {
        $kat = Kategori::all();
        $properti = $request->session()->get('properti');

        return view('customer.tambah2',compact('properti', 'kat'));
    }

    public function PostcreateStep2(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => 'required',
            'id_kat' => 'required',
            'nama_prop' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
        ]);
        if(empty($request->session()->get('properti'))){
            $properti = new Properti();
            $properti->fill($validatedData);
            $request->session()->put('properti', $properti);
        }else{
            $properti = $request->session()->get('properti');
            $properti->fill($validatedData);
            $request->session()->put('properti', $properti);
        }
        // dd($properti);
        return redirect('/properti3');
    }
    
    public function createStep3(Request $request)
    {  
        $properti = $request->session()->get('properti');
        return view('customer.tambah3',compact('properti'));
    }

    public function PostcreateStep3(Request $request)
    {
        $properti = $request->session()->get('properti');

        if(!isset($properti->Foto1)) {
            $request->validate([
                'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $fileName = "Foto1" . time() . '.' . request()->foto1->getClientOriginalExtension();
            $request->foto1->move('foto1', $fileName);
            $properti = $request->session()->get('properti');
            $properti->Foto1 = $fileName;
            $request->session()->put('properti', $properti);
        }
        if(!isset($properti->Foto2)) {
            $request->validate([
                'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $fileName = "Foto2" . time() . '.' . request()->foto2->getClientOriginalExtension();
            $request->foto2->move('foto2', $fileName);
            $properti = $request->session()->get('properti');
            $properti->Foto2 = $fileName;
            $request->session()->put('properti', $properti);
        }
        if(!isset($properti->Foto3)) {
            $request->validate([
                'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $fileName = "Foto3" . time() . '.' . request()->foto3->getClientOriginalExtension();
            $request->foto3->move('foto3', $fileName);
            $properti = $request->session()->get('properti');
            $properti->Foto3 = $fileName;
            $request->session()->put('properti', $properti);
        }
        if(!isset($properti->Foto4)) {
            $request->validate([
                'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $fileName = "Foto4" . time() . '.' . request()->foto4->getClientOriginalExtension();
            $request->foto4->move('foto4', $fileName);
            $properti = $request->session()->get('properti');
            $properti->Foto4 = $fileName;
            $request->session()->put('properti', $properti);
        }
        // dd($properti);
        //return view('properti.step4',compact('properti'));
        return redirect('/properti4');
    }

    public function removeImage(Request $request)
    {
        $properti = $request->session()->get('properti');

        $properti->Foto1 = null;
        $properti->Foto2 = null;
        $properti->Foto3 = null;
        $properti->Foto4 = null;

        return view('customer.tambah3',compact('properti'));
    }

    public function createStep4(Request $request)
    {
        $properti = $request->session()->get('properti');

        return view('customer.tambah4',compact('properti'));
    }

    public function PostcreateStep4(Request $request)
    {
        $validatedData = $request->validate([
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'alamat' => 'required',
            'alamatmaps' => 'required',
        ]);
        if(empty($request->session()->get('properti'))){
            $properti = new Properti();
            $properti->fill($validatedData);
            $request->session()->put('properti', $properti);
        }else{
            $properti = $request->session()->get('properti');
            $properti->fill($validatedData);
            $request->session()->put('properti', $properti);
        }
        
        // dd($properti);
        $properti->save();
        return redirect('/properti5');

        // return redirect('/data1');
        // return view('properti.step5',compact('properti'));
    }
    public function CreateIklan(Request $request)
    {
        $properti = $request->session()->get('properti');

        return view('customer.last',compact('properti'));
    }

    public function PostIklan(Request $request)
    {
        $validatedData = $request->validate([
            'id_prop' => 'required',
            'id_user' => 'required',
            // 'judul' => 'required',
            'jenis' => 'required',
            'nego' => 'required',
            'sold' => 'required',
            'status' => 'required',
            'dilihat' => 'required',
            // 'tanggal' => 'required',
        ]);
        if(empty($request->session()->get('iklan'))){
            $iklan = new Iklan();
            $iklan->fill($validatedData);
            $request->session()->put('iklan', $iklan);
        }else{
            $iklan = $request->session()->get('iklan');
            $iklan->fill($validatedData);
            $request->session()->put('iklan', $iklan);
        }
        dd($iklan);
        $iklan->save();
        // return redirect('/data1');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Properti  $properti
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $properti = Properti::where('id', $id)->orderBy('id', 'desc')->get();
        // $iklan = Properti::find('$id')->iklan;
        // $kat = Properti::find(1)->myKat;
           return view('customer.lihatIklan', compact('properti'));
        //    return $kat;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Properti  $properti
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $properti = Properti::where('id', $id)->get();
        $kat = Kategori::all();
        $iklan = Properti::find($id)->iklan;
       	return view('customer.editIklan', compact('properti', 'kat', 'iklan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Properti  $properti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $properti = Properti::where('id', $id)->first();

        $foto1_name = $request->foto_1;
        $foto1 = $request->file('foto1');
        $foto2_name = $request->foto_2;
        $foto2 = $request->file('foto2');
        $foto3_name = $request->foto_3;
        $foto3 = $request->file('foto3');
        $foto4_name = $request->foto_4;
        $foto4 = $request->file('foto4');
        if($foto1 != '')
        {
            $request->validate([
                'id_kat'    =>  'required',
                'nama_prop' =>  'required',
                'harga'     =>  'required',
                'deskripsi' =>  'required',
                'fasilitas' =>  'required',
                'provinsi'  =>  'required',
                'kabupaten' =>  'required',
                'kecamatan' =>  'required',
                'alamat'    =>  'required',
                'alamatmaps'=>  'required',
                'jenis'     =>  'required',
                'nego'      =>  'required',
                'sold'      =>  'required',
                'foto1'     =>  'image|max:2048',
                'foto2'     =>  'image|max:2048',
                'foto3'     =>  'image|max:2048',
                'foto4'     =>  'image|max:2048'
            ]);
            $foto1_name = $properti->id.'_foto1'. $foto1->getClientOriginalExtension();
            $request->foto1->move('foto1', $foto1_name);
            $foto2_name = $properti->id.'_foto2'. $foto2->getClientOriginalExtension();
            $request->foto2->move('foto2', $foto2_name);
            $foto3_name = $properti->id.'_foto3'. $foto3->getClientOriginalExtension();
            $request->foto3->move('foto3', $foto3_name);
            $foto4_name = $properti->id.'_foto4'. $foto4->getClientOriginalExtension();
            $request->foto4->move('foto4', $foto4_name);
        }else
        {
            $request->validate([
                'id_kat'    =>  'required',
                'nama_prop' =>  'required',
                'harga'     =>  'required',
                'deskripsi' =>  'required',
                'fasilitas' =>  'required',
                'provinsi'  =>  'required',
                'kabupaten' =>  'required',
                'kecamatan' =>  'required',
                'alamat'    =>  'required',
                'alamatmaps'=>  'required',
                'jenis'     =>  'required',
                'nego'      =>  'required',
                'sold'      =>  'required',
            ]);
        }

        $form_data = array(
            'id_kat'    =>  $request->id_kat,
            'nama_prop' =>  $request->nama_prop,
            'harga'     =>  $request->harga,
            'deskripsi' =>  $request->deskripsi,
            'fasilitas' =>  $request->fasilitas,
            'provinsi'  =>  $request->provinsi,
            'kabupaten' =>  $request->kabupaten,
            'kecamatan' =>  $request->kecamatan,
            'alamat'    =>  $request->alamat,
            'alamatmaps'=>  $request->alamatmaps,
            // 'jenis'     =>  $request->jenis,
            // 'nego'      =>  $request->nego,
            // 'sold'      =>  $request->sold,
            'foto1'     =>  $foto1_name,
            'foto2'     =>  $foto2_name,
            'foto3'     =>  $foto3_name,
            'foto4'     =>  $foto4_name
        );

        // $form = array(
        //     'jenis'     =>  $request->jenis,
        //     'nego'      =>  $request->nego,
        //     'sold'      =>  $request->sold,
        // );

        $iklan = Properti::find($id)->iklan;
        // $validatedData = $request->validate([
        //     'jenis' => 'required',
        //     'nego' => 'required',
        //     'sold' => 'required',
        // ]);
        // $valid = $request->validate([
        //     'jenis'     =>  'required',
        //     'nego'      =>  'required',
        //     'sold'      =>  'required',
        // ]);
        $iklan->jenis = $request->jenis;
        $iklan->nego = $request->nego;
        $iklan->sold = $request->sold;
        // $iklan->update($form);
        $properti->update($form_data);
        // $iklan->update($valid);
        $iklan->save();
        // dd($properti);
        return redirect('/iklan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Properti  $properti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Properti $properti)
    {
        //
    }
}
