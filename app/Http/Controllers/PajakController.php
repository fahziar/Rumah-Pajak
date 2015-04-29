<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pajak;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use Cookie;

class PajakController extends Controller {

	var $CLIENT_ID = "dAU2kooElemk8k6O";
	var $CLIENT_SECRET = "tY1Tp86GAe1mZIUE";
	var $REDIRECT_URI = "http://localhost:8888/test/getacctoken/";
	
    public function search($npwpd){
        $pajaks = Pajak::where('npwpd','=',$npwpd)->get();
        return view('pajak.lunas',compact('pajaks'));
    }

    public function add($npwpd){
        return view('pajak.add',compact('npwpd'));
    }

    public function submit($npwpd){
        $pajak = new Pajak;
        $pajak->npwpd = $npwpd;
        $pajak->kategori = Input::get('kategori');
        $pajak->aset_kepemilikan = Input::get('aset');
        $pajak->jumlah_pajak = 0.1*Input::get('aset');
        $pajak->status_pelunasan = 0;
        $ldate = date('Y-m-d');
        $pajak->tanggal = $ldate;
        $pajak->save();
        return $this->search($npwpd);
    }
	
	public function DukcapilGetAccessToken(){
		if (Input::has('code')){
			$token = null;
			//retry until right
			while(!$token['access_token']){
				$params=[
					'grant_type'=>'authorization_code',
					'client_id'=>$this->CLIENT_ID,
					'client_secret'=>$this->CLIENT_SECRET,
					'redirect_uri'=>$this->REDIRECT_URI,
					'code'=> Input::get('code')
				];
				$options = array(
					CURLOPT_URL => 'http://dukcapil.pplbandung.biz.tm/oauth/access_token',
					CURLOPT_POST => true,
					CURLOPT_POSTFIELDS => http_build_query($params),
					CURLOPT_HTTPHEADER => Array("Content-Type: application/x-www-form-urlencoded"),
					CURLOPT_RETURNTRANSFER => 1
				);
				$ch = curl_init();
				curl_setopt_array($ch,$options);
				$resp = curl_exec($ch);
				curl_close($ch);
				$token = json_decode($resp, true);
			}
			Cookie::queue('access_token',$token['access_token']);
			//TODO to page with Login Success
			return response($token['access_token']);
		} else {
			// redirect to dukcapil
			return Redirect::away('http://dukcapil.pplbandung.biz.tm/oauth/authorize?client_id='.$this->CLIENT_ID.'&redirect_uri='.$this->REDIRECT_URI.'&response_type=code');
		}
	}
	
	public function GetToken(){
		if (Request::hasCookie('access_token')){
			$acc_token=Cookie::get('access_token');
		} else {
			$acc_token=$this->DukcapilGetAccessToken();
		}
		return $acc_token;
	}
	
	public function DukcapilGetDataPenduduk($TOKEN){
		$options = array(
			CURLOPT_URL => 'http://dukcapil.pplbandung.biz.tm/api/penduduk/',
			CURLOPT_POST => false,
			CURLOPT_HTTPHEADER => Array("Authorization: Bearer ".$TOKEN),
			CURLOPT_RETURNTRANSFER => 1
		);
		$ch = curl_init();
		curl_setopt_array($ch,$options);
		$resp = curl_exec($ch);
		curl_close($ch);
		//return $resp?$resp:'false';
		$arr = json_decode($resp, true);
		$arr2['NIK'] = $arr['id'];
		$arr2['Nama'] = $arr['nama_penduduk'];
		$arr2['Alamat'] = $arr['alamat_penduduk'];
		$arr2['Tempat Lahir'] = $arr['tempat_lahir'];
		$arr2['Tgl Lahir'] = date('d-m-Y',strtotime($arr['tgl_lahir']));
		return $arr2;
	}
	
	public function GetDataPenduduk(){	
		//Get Token
		$acc_token=$this->GetToken();
		if (get_class($redir = (object) $acc_token) === 'Illuminate\Http\RedirectResponse'){
			return $redir;
		}
		//Get Data
		//retry 10x until get it right
		for ($i=0;$i<10;$i++){
			$arr = $this->DukcapilGetDataPenduduk($acc_token);
			if ($arr['NIK'])break;
		}
		//if invalid data, get token
		if (!$arr['NIK']){
			return $this->DukcapilGetAccessToken();
		}
		return $arr;
	}
	
	public function Test(){
		$arr=$this->GetDataPenduduk();
		if (get_class($redir = (object) $arr) === 'Illuminate\Http\RedirectResponse'){
			return $redir;
		}
		return 'NIK = '.$arr['NIK'].'<br>'.'Nama = '.$arr['Nama'];
	}
	
	public function deleteAcc(){
		Cookie::queue('access_token','3',-1);
		return response('delete cookie');
	}
}
