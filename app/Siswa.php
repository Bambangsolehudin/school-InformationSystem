<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    
    protected $table='siswa';
    protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','agama','alamat','avatar','user_id'];

public function getAvatar(){
    if (!$this->avatar) {
    	return asset('images/default.png');
    }
        return asset('images/'.$this->avatar);
    
	}

	public function mapel()
	{
		return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
	}

    public function rataRataNilai()
    {
        //ambil nilai
        $total=0;
        $hitung=0;
        foreach($this->mapel as $mapel){
           $total += $mapel->pivot->nilai;
           $hitung++;
        }
        $rata=@($total/$hitung);
        return round($rata);
    }

    public function nama_lengkap(){
        return $this->nama_depan.' '.$this->nama_belakang;
    }

    
}
