<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Siswa;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_siswa=\App\Siswa::where(
        'nama_depan','LIKE','%'.$request->cari.'%')->paginate(20);
        }else{
           $data_siswa=\App\Siswa::all(); 
        }
    	
    	return view('siswa.index', ['data_siswa'=> $data_siswa]);
    }

    public function create(Request $request)
    {
       
        $this->validate($request,[
            'nama_depan'=> 'required|min:5',
            'nama_belakang'=> 'required|min:5',
            'email' => 'required|email|unique:users',
            'jenis_kelamin'=>'required',
            'agama'=>'required',
            'avatar'=>'required|file|image|mimes:jpeg,png,jpg|max:9048',
            

        ]);


        //insert ke tabel user
        $user= new  \App\User;
        $user->role='siswa';
        $user->name=$request->nama_depan;
        $user->email=$request->email;
        $user->password=bcrypt('rahasia');
        $user->save();
         //insert ke tabel siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa= \App\Siswa::create($request->all());
        
    	return redirect('/siswa')->with('status','Data Mahasiswa berhasil Ditambahkan'); 
    }

    public function edit(Siswa $siswa)
    {
    	 
    	
    	return view('/siswa/edit', compact('siswa'));
    }

    public function update(Request $request,$id)
    {   
        
    	// dd($request->all());
    	$siswa=\App\Siswa::find($id);
    	$siswa->update($request->all());
        if($request->hasFile('avatar')){ 
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
    	return redirect('/siswa')->with('status','Data siswa berhasil diubah'); 
    }

    public function delete($id)
    {   
        $siswa=\App\Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('status','Data siswa berhasil dihapus!'); 
    }

    public function profile(Siswa $siswa)
    {
       
        $matapelajaran=\App\Mapel::all();

        //menyiapkan data untuk chart
        $categories=[];
        $data=[];

        foreach($matapelajaran as $mp){
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
            $categories[] = $mp->nama;
            $data[]=$siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai; 
        }
    }



        // dd($mapel); 
        return view('siswa.profile',['siswa'=>$siswa,'matapelajaran'=>$matapelajaran,'categories'=> $categories,'data'=>$data]);
    } 

    public function addnilai(Request $request,$idsiswa)
    {
      // dd($request->all());
        $siswa=\App\Siswa::find($idsiswa);
        if ($siswa->mapel()->where('mapel_id', $request->mapel)->exists()) {
            return redirect('siswa/'.$idsiswa.'/profile')->with('status','Data matapelajaran sudah ada!');
        }
        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);
        return redirect('siswa/'.$idsiswa.'/profile')->with('status','Data nilai berhasil dimasukan!');
    }

    public function deletenilai($idsiswa,$idmapel)
    {
        $siswa= \App\Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('status','Data nilai berhasil dihapus!');
    }

     public function exportExcel() 
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }

      public function exportPdf() 
    {
        $siswa = \App\Siswa::all();
        $pdf = PDF::loadView('export.siswapdf', ['siswa'=> $siswa]);
        return $pdf->download('siswa.pdf');
    }

   public function profilesaya()
   {
        return view('siswa.profilesaya');
   } 
}

