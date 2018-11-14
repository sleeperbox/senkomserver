<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;
use App\Berita;
use App\Galerivideos;
use App\Galeri;
use App\User;
use Telegram;

class BeritaController extends Controller
{
	public function index()
	{
        if(Session::get('login')){
            return redirect('/admin/dashboard');
        }
	    $tgl = date('Y-m-d');
        $tanggal = $tgl;
        $data = Berita::where('tgl',$tanggal)->get();
        $galeris = Galeri::orderBy('created_at', 'asc')->take(3)->get();
        $videos = Galerivideos::orderBy('created_at', 'asc')->take(3)->get();
		return view('home_component.index', compact('data', 'galeris', 'videos'));
    }
    public function berita(Request $request)
    {
        $tanggal = $request->tgl;
        $data = Berita::where('tgl',$tanggal)->get();
        $galeris = Galeri::orderBy('created_at', 'asc')->take(3)->get();
        $videos = Galerivideos::orderBy('created_at', 'asc')->take(3)->get();
        if(count($data) == 0){ 
            Session::flash('berita', 'Tidak ada Berita');
            Session::flash('tgl', $tanggal);
            return redirect('/');
        }else{
            return view('home_component.index', compact('data', 'galeris', 'videos'));
        }
    }

    public function loadberita(Request $request)
    {
        $tgl = $request->tgl_berita;
            $datas = Berita::orderBy('id', 'dsc')->where('tgl',$tgl)->paginate(5);
            return view('data_berita', compact('datas'));
    }

    public function loadberitajam(Request $request)
    {
        $tgl = $request->tgl_berita;
            $datas = Berita::orderBy('id', 'dsc')->where('tgl',$tgl)->paginate(5);
            return view('data_beritajam', compact('datas'));
    }

	public function tampil(Request $request){
        $tgl = $request->tgl;
        $format = date('Y-m-d', strtotime($tgl));
        $data = Berita::where('tgl',$format)->paginate(5);
        return view('berita_component.index',compact('data'));
    }
	public function kirim(Request $request){
        $callsign = $request->callsign;
        $nomor = $request->tlp;
        $pesan = $request->pesan;
        $status_tampil = "tampil";
        $status_pemantauan = "tidak tampil";
        $recaptcha = new \ReCaptcha\ReCaptcha('6Lf3uncUAAAAALLt8wE-X5DJ55s-Tnaf0YGRyDde');
        $resp = $recaptcha->verify(Input::get('g-recaptcha-response'), $_SERVER['REMOTE_ADDR']);
        if ($resp->isSuccess()){
            $data = new Berita();
            $data->callsign = $request->callsign;
            $data->tlp = $request->tlp;
            $data->pesan = $request->pesan;
            $data->tgl = $request->tgl;
            $data->jam = $request->jam;
            $data->status_tampil = $status_tampil;
            $data->status_pemantauan = $status_pemantauan;
            $data->save();
            // Telegram::sendMessage([
            // 'chat_id' => '@senkomtelegram', 
            // 'text' => 'Dari: '. $nomor .' Pesan: ' . $pesan .' Callsign: ' . $callsign,
            // 'parse_mode' => 'HTML'
            // ]);
            //$config = Configuration::getDefaultConfiguration();
            // $config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU0MDA1OTk0MCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjYyOTA1LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.CCQ1yUpCU6curWt8Cs3e77UOR2242cprPwJvjl58Kus');
            // $apiClient = new ApiClient($config);
            // $messageClient = new MessageApi($apiClient);

            //Sending a SMS Message
            // $kirimpes = 'Dari '.$callsign."\r\n No. ".$nomor."\r\n ".$pesan;
            // $sendMessageRequest1 = new SendMessageRequest([
            // 'phoneNumber' => "0816863212",
            // 'message' => $kirimpes,
            // 'deviceId' => 103891
            // ]);

            // $sendMessages = $messageClient->sendMessages([
            // $sendMessageRequest1
            // ]);
			Session::flash('alert', 'Berita Berhasil di input');
            return back();
		}else{
            //$errors = $resp->getErrorCodes();
            Session::flash('message', 'Kode Captcha Salah');
            return back();
        }
	}
    public function berita_apk(Request $request){
        $callsign = $request->callsign;
        $nomor = $request->tlp;
        $pesan = $request->pesan;
        $status_tampil = "tampil";
        $status_pemantauan = "tidak tampil";
        $recaptcha = new \ReCaptcha\ReCaptcha('6LcsQ3UUAAAAAGK8O86zrgrVeY4HOLOurUlocwTv');
        $resp = $recaptcha->verify(Input::get('g-recaptcha-response'), $_SERVER['REMOTE_ADDR']);
        if ($resp->isSuccess()){
            $data = new Berita();
            $data->callsign = $request->callsign;
            $data->tlp = $request->tlp;
            $data->pesan = $request->pesan;
            $data->tgl = $request->tgl;
            $data->jam = $request->jam;
            $data->status_tampil = $status_tampil;
            $data->status_pemantauan = $status_pemantauan;
            $data->save();
            // Telegram::sendMessage([
            // 'chat_id' => '@senkomtelegram', 
            // 'text' => 'Dari: '. $nomor .' Pesan: ' . $pesan .' Callsign: ' . $callsign,
            // 'parse_mode' => 'HTML'
            // ]);
            //$config = Configuration::getDefaultConfiguration();
            // $config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU0MDA1OTk0MCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjYyOTA1LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.CCQ1yUpCU6curWt8Cs3e77UOR2242cprPwJvjl58Kus');
            // $apiClient = new ApiClient($config);
            // $messageClient = new MessageApi($apiClient);

            //Sending a SMS Message
            // $kirimpes = 'Dari '.$callsign."\r\n No. ".$nomor."\r\n ".$pesan;
            // $sendMessageRequest1 = new SendMessageRequest([
            // 'phoneNumber' => "0816863212",
            // 'message' => $kirimpes,
            // 'deviceId' => 103891
            // ]);

            // $sendMessages = $messageClient->sendMessages([
            // $sendMessageRequest1
            // ]);
            Session::flash('alert', 'Berita Berhasil di input');
            return back();
        }else{
            //$errors = $resp->getErrorCodes();
            Session::flash('message', 'Kode Captcha Salah');
            return back();
        }
    }

}
