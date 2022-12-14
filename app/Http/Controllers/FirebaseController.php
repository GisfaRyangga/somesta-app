<?php

namespace App\Http\Controllers;
use Exception;
use App\Exports\PerusahaanExport;
use App\Imports\PerusahaanImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Firebase\Auth\Token\Exception\InvalidToken;
use Kreait\Firebase\Exception\Auth\RevokedIdToken;
use App\Models\Perusahaan;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Ramsey\Uuid\Type\Integer;


use function JmesPath\search;

class FirebaseController extends Controller
{
    protected $auth, $database;

    public function __construct()
    {
        $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/project-fbs-bf0e7-firebase-adminsdk-mflgt-4fd32b3d7d.json')
        ->withDatabaseUri('https://project-fbs-bf0e7-default-rtdb.asia-southeast1.firebasedatabase.app/');

        $this->auth = $factory->createAuth();
        $this->database = $factory->createDatabase();
    }

    public function signUp()
    {
        $email = "angelicdemon@gmail.com";
        $pass = "coba";

        try {
            $newUser = $this->auth->createUserWithEmailAndPassword($email, $pass);
            dd($newUser);
        } catch (\Throwable $e) {
            switch ($e->getMessage()) {
                case 'The email address is already in use by another account.':
                    dd("Email sudah digunakan.");
                    break;
                case 'A password must be a string with at least 6 characters.':
                    dd("Kata sandi minimal 6 karakter.");
                    break;
                default:
                    dd($e->getMessage());
                    break;
            }
        }
    }

    public function about(){
        if ($this->userCheck() == true){
            return view('about', ['title' => 'about']);
        }else if($this->userCheck() == false){
            return redirect('/login')->with('login-error',"Anda belum login.");
        }
    }

    public function signIn(Request $request)
    {
        $email = $request->username;
        $pass = $request->password;

        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($email, $pass);
            // dump($signInResult->data());

            // before
            $ref = $this->database->getReference('dbAdmin')->getValue();
            foreach($ref as $admin_id=>$data){
                foreach($data as $current_admin=>$creds){
                    if($current_admin == "email"){
                        if ($creds == $email){
                            if (array_search('super_admin',$data,true) == true){
                                $this_user_role = "super_admin";
                                Session::put('thisUserRole', $this_user_role);
                            }elseif(array_search('admin',$data,true) == true){
                                $this_user_role = "admin";
                                Session::put('thisUserRole', $this_user_role);
                            }
                            break;
                        }
                    }
                }
            }


            Session::put('firebaseUserId', $signInResult->firebaseUserId());
            Session::put('idToken', $signInResult->idToken());
            Session::put('email', $email);
            Session::save();

            // dump($signInResult);
            // dump($email);

            // dd($signInResult);
            return redirect('/about');
        } catch (\Throwable $e) {
            switch ($e->getMessage()) {
                case 'INVALID_PASSWORD':
                    return redirect('/login')->with('login-error','Username/password salah');
                    break;
                case 'EMAIL_NOT_FOUND':
                    return redirect('/login')->with('login-error','Username/password salah');
                    break;
                default:
                    return redirect('/login')->with('login-error',$e->getMessage());
                    break;
            }
        }
    }

    public function signOut()
    {
        if (Session::has('firebaseUserId') && Session::has('idToken')) {
            // dd("User masih login.");
            $this->auth->revokeRefreshTokens(Session::get('firebaseUserId'));
            Session::forget('firebaseUserId');
            Session::forget('idToken');
            Session::forget('email');
            Session::forget('thisUserRole');
            Session::save();
            // dd("User berhasil logout.");
            return redirect('/login')->with('login-error','Anda telah logout.');
        } else {
            // dd("User belum login.");
            return redirect('/login')->with('login-error','Anda belum login.');
        }
    }

    public function userCheck()
    {
        // $idToken = "eyJhbGciOiJSUzI1NiIsImtpZCI6ImY4MDljZmYxMTZlNWJhNzQwNzQ1YmZlZGE1OGUxNmU4MmYzZmQ4MDUiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20vcHJvamVjdC1mYnMtYmYwZTciLCJhdWQiOiJwcm9qZWN0LWZicy1iZjBlNyIsImF1dGhfdGltZSI6MTY2ODk0ODU2NSwidXNlcl9pZCI6Ik5FS2JSN0N5Q2hoS3htTEtjUGlRRVhmMmpiMDIiLCJzdWIiOiJORUtiUjdDeUNoaEt4bUxLY1BpUUVYZjJqYjAyIiwiaWF0IjoxNjY4OTQ4NTY1LCJleHAiOjE2Njg5NTIxNjUsImVtYWlsIjoiYW5nZWxpY2RlbW9uQGdtYWlsLmNvbSIsImVtYWlsX3ZlcmlmaWVkIjpmYWxzZSwiZmlyZWJhc2UiOnsiaWRlbnRpdGllcyI6eyJlbWFpbCI6WyJhbmdlbGljZGVtb25AZ21haWwuY29tIl19LCJzaWduX2luX3Byb3ZpZGVyIjoicGFzc3dvcmQifX0.eTpZxjKiEkGr9LuBhjJ_EKAubZcqJj0rS8kZ9YJlshEQHcB_17ejiJH99GakR_U055CMy-r4YoymA5gon8MZPYTTE5sVDNju7Xc7eteH2p1zPVYshFnTQr97iRmC-zXcqf8ff5n7LFaN00zP4k32At_bfHgCb7YUbqWipb1TNc-yw8AXuVAMOKimkDb-tYBnpksCEagiDOn-4b52ZjT1vRWKCU_9LCNNdcAIBFb2qZj-mJmggNCckl1VBz1Dz_SDmDKwz5v7GuuY1Tp1P9vqNp7V9brl2XrskGBoQ-KfehJYdQ2PCS71Fa7_6vv-FRV1j7o06hQMeI4CuRC8oGJ7Lw";

        // $this->auth->revokeRefreshTokens("");
        if (Session::has('firebaseUserId') && Session::has('idToken')) {
            // dd("User masih login.");
            return true;
        } else {
            // dd("User sudah logout.");
            return false;
        }

        // try {
        //     $verifiedIdToken = $this->auth->verifyIdToken($idToken, $checkIfRevoked = true);
        //     dump($verifiedIdToken);
        //     dump($verifiedIdToken->claims()->get('sub')); // uid
        //     dump($this->auth->getUser($verifiedIdToken->claims()->get('sub')));
        // } catch (\Throwable $e) {
        //     dd($e->getMessage());
        // }

        // try {
        //     $verifiedIdToken = $this->auth->verifyIdToken(Session::get('idToken'), $checkIfRevoked = true);
        //     $response = "valid";
        //     // dd("Valid");
        //     // $uid = $verifiedIdToken->getClaim('sub');
        //     // $user = $auth->getUser($uid);
        //     // dump($uid);
        //     // dump($user);
        // } catch (\InvalidArgumentException $e) {
        //     // dd('The token could not be parsed: '.$e->getMessage());
        //     $response = "The token could not be parsed: " . $e->getMessage();
        // } catch (InvalidToken $e) {
        //     // dd('The token is invalid: '.$e->getMessage());
        //     $response = "The token is invalid: " . $e->getMessage();
        // } catch (RevokedIdToken $e) {
        //     $response = "revoked";
        // } catch (\Throwable $e) {
        //     if (substr(
        //         $e->getMessage(),
        //         0,
        //         21
        //     ) == "This token is expired") {
        //         $response = "expired";
        //     } else {
        //         $response = "something_wrong";
        //     }
        // }
        // return $response;
    }

    public function read(){
        if ($this->userCheck() == true){
            $ref = $this->database->getReference('dbCustomer/')->getValue();
            $local_id = 1;
            return view('show', ['title' => 'show'], compact('ref','local_id'));
        }else if($this->userCheck() == false){
            return redirect('/login')->with('login-error',"Anda belum login.");
        }
    }

    public function update(){
        
        if ($this->userCheck() == true){
            // before
            $ref = $this->database->getReference('tumbuhan/dikotil')->getValue();
            dump($ref);

            // update data
            $ref = $this->database->getReference('tumbuhan')
            ->update(["dikotil" => "mangga"]);

            // after
            $ref = $this->database->getReference('tumbuhan/dikotil')->getValue();
            dump($ref);
        }else if($this->userCheck() == false){
            return redirect('/login')->with('login-error',"Anda belum login.");
        }
    }

    public function edit($data){
        if ($this->userCheck() == true){
            $ref = $this->database->getReference('dbCustomer/'.$data)->getValue();
            $data_id = $data;
            $ref_longitude =  $this->database->getReference('dbCustomer/'.$data."/koor_longitude")->getValue();
            $ref_latitude =  $this->database->getReference('dbCustomer/'.$data."/koor_latitude")->getValue();
            $ref_combined_coords = $ref_latitude.", ".$ref_longitude;
            return view('edit', ['title' => 'show'], compact('ref','ref_combined_coords','data_id'));
        }else if($this->userCheck() == false){
            return redirect('/login')->with('login-error',"Anda belum login.");
        }
    }

    public function updateThisPerusahaan(Request $request, $id){
        if ($this->userCheck() == true){
            $splittedKoordinat = explode(',',$request->koordinat);
            $ref = $this->database->getReference('dbCustomer/'.$id)
                ->set([
                    "nama" => $request->nama,
                    "group" => $request->group,
                    "status" => $request->status,
                    "koor_latitude" => floatval($splittedKoordinat[0]),
                    "koor_longitude" => floatval($splittedKoordinat[1]),
                    "lokasi" => $request->lokasi,
                    "kebutuhan" => $request->kebutuhan,
                    "jenis" => $request->jenis,
                    "tipe_customer" => $request->tipe_customer,
                    "dilayani" => $request->dilayani,
                    "penyalur" => $request->penyalur,
                    "pelayanan" => $request->pelayanan,
                ]);
            return redirect('/show')->with('pesan','Data perusahaan berhasil diperbarui');
        }else if($this->userCheck() == false){
            return redirect('/login')->with('login-error',"Anda belum login.");
        }
    }

    public function set(Request $request)
    {
        if ($this->userCheck() == true){
            // before
            $ref = $this->database->getReference('dbCustomer')->getValue();

            //initiate auto increment function
            $highest_id = 0;
            foreach($ref as $nums=>$d){
                $highest_id = $nums;
            }
            $autoIncrementID = $highest_id+1;

            try {
                //split coords
                $splittedKoordinat = explode(',',$request->koordinat);
                
            if ($ref == null) {
                $ref = $this->database->getReference('dbCustomer/1')
                ->set([
                    "nama" => $request->nama,
                    "group" => $request->group,
                    "status" => $request->status,
                    "koor_latitude" => floatval($splittedKoordinat[0]),
                    "koor_longitude" => floatval($splittedKoordinat[1]),
                    "lokasi" => $request->lokasi,
                    "kebutuhan" => $request->kebutuhan,
                    "jenis" => $request->jenis,
                    "tipe_customer" => $request->tipe_customer,
                    "dilayani" => $request->dilayani,
                    "penyalur" => $request->penyalur,
                    "pelayanan" => $request->pelayanan,
                ]);
                return redirect('/form')->with('pesan','Data Berhasil ditambahkan');
            }
            
            else {
                $ref = $this->database->getReference('dbCustomer/'.$autoIncrementID)
                ->set([
                    "nama" => $request->nama,
                    "group" => $request->group,
                    "status" => $request->status,
                    "koor_latitude" => floatval($splittedKoordinat[0]),
                    "koor_longitude" => floatval($splittedKoordinat[1]),
                    "lokasi" => $request->lokasi,
                    "kebutuhan" => $request->kebutuhan,
                    "jenis" => $request->jenis,
                    "tipe_customer" => $request->tipe_customer,
                    "dilayani" => $request->dilayani,
                    "penyalur" => $request->penyalur,
                    "pelayanan" => $request->pelayanan,
                ]);
                // dump($autoIncrementID);
                return redirect('/form')->with('pesan','Data Berhasil ditambahkan');
            }
            // dump([
            //     "nama" => $request->nama,
            //     "group" => $request->group,
            //     "status"=> $request->status,
            //     "koor_latitude" => $splittedKoordinat[0],
            //     "koor_longitude" => $splittedKoordinat[1],
            //     "lokasi"=> $request->lokasi,
            //     "kebutuhan"=> $request->kebutuhan,
            //     "jenis"=> $request->jenis,
            //     "tipe_customer" => $request->tipe_customer,
            //     "dilayani"=> $request->dilayani,
            //     "penyalur"=> $request->penyalur,
            //     "pelayanan"=> $request->pelayanan,
            // ]);

            
            
            // dump($ref);
            // $ref = $this->database->getReference('dev/3')->getValue();
            // dump($ref);

            // after
            // $ref = $this->database->getReference('dbCustomer/namaPerusahaan')->getValue();
            // dump($ref);
            }
            
            catch(Exception $e) {
                return redirect('/form')->with('pesan','Format tidak sesuai. Silahkan isi form dengan format yang sesuai');
            }

        }else if($this->userCheck() == false){
            return redirect('/login')->with('login-error',"Anda belum login.");
        }
    }

    public function addAdmin(Request $request)
    {
        if ($this->userCheck() == true){
            // before
            $ref = $this->database->getReference('dbAdmin')->getValue();

            //initiate auto increment function
            $highest_id = 0;
            foreach($ref as $nums=>$d){
                $highest_id = $nums;
            }
            $autoIncrementID = $highest_id+1;

            $fullName = $request->firstname." ".$request->lastname;


            if ($ref == null) {
                $ref = $this->database->getReference('dbAdmin/1')
                ->set([
                    "fullName" => $fullName,
                    // "username" => $request->username,
                    "email" => $request->email,
                    "password" => $request->password,
                    "admin_type" => $request->admin_type,
                ]);

                $email = $request->email;
                $pass = $request->password;
                try {
                    $this->auth->createUserWithEmailAndPassword($email, $pass);
                } catch (\Throwable $e) {
                    switch ($e->getMessage()) {
                        case 'The email address is already in use by another account.':
                            // dd("Email sudah digunakan.");
                            return redirect('/register_form')->with('register-error','Email sudah digunakan.');
                            break;
                        case 'A password must be a string with at least 6 characters.':
                            // dd("Kata sandi minimal 6 karakter.");
                            return redirect('/register_form')->with('register-error','Kata sandi minimal 6 karakter.');
                            break;
                        default:
                            // dd($e->getMessage());
                            return redirect('/register_form')->with('register-error',$e->getMessage());
                            break;
                    }
                }
            }
            
            else {
                $ref = $this->database->getReference('dbAdmin/'.$autoIncrementID)
                ->set([
                    "fullName" => $fullName,
                    // "username" => $request->username,
                    "email" => $request->email,
                    "password" => $request->password,
                    "admin_type" => $request->admin_type,
                ]);

                $email = $request->email;
                $pass = $request->password;
                try {
                    $this->auth->createUserWithEmailAndPassword($email, $pass);
                } catch (\Throwable $e) {
                    switch ($e->getMessage()) {
                        case 'The email address is already in use by another account.':
                            // dd("Email sudah digunakan.");
                            return redirect('/register_form')->with('register-error','Email sudah digunakan.');
                            break;
                        case 'A password must be a string with at least 6 characters.':
                            // dd("Kata sandi minimal 6 karakter.");
                            return redirect('/register_form')->with('register-error','Kata sandi minimal 6 karakter.');
                            break;
                        default:
                            // dd($e->getMessage());
                            return redirect('/register_form')->with('register-error',$e->getMessage());
                            break;
                    }
                }
            }
            return redirect('/register_form')->with('pesan','Admin Berhasil ditambahkan');
        }else if($this->userCheck() == false){
            return redirect('/login')->with('login-error',"Anda belum login.");
        }
    }
    
    public function delete($id)
    {
        if ($this->userCheck() == true){
            // before
            $ref = $this->database->getReference('dbCustomer/'.$id)->getValue();

            /**
             * 1. remove()
             * 2. set(null)
             * 3. update(["key" => null])
             */

            // remove()
            $ref = $this->database->getReference('dbCustomer/'.$id)->remove();

            // set(null)
            $ref = $this->database->getReference('dbCustomer/'.$id)
                ->set(null);

            // update(["key" => null])
            // $ref = $this->database->getReference('hewan/karnivora/harimau')
            //     ->update(["benggala" => null]);
            return redirect('/show')->with('pesan','Data perusahaan berhasil dihapus');
        }else if($this->userCheck() == false){
            return redirect('/login')->with('login-error',"Anda belum login.");
        }
    }
    
	public function export_excel()
	{
        $ref = $this->database->getReference('dbCustomer')->getValue();
        
        $allPerusahaanData = [];
        $individualPerusahaan = [];

        //beri nama untuk tiap kolom
        array_push($allPerusahaanData,[
            'nama',
            'group',
            'status',
            'koor_longitude',
            'koor_latitude',
            'lokasi',
            'kebutuhan',
            'jenis',
            'tipe_customer',
            'dilayani',
            'penyalur',
            'pelayanan',
        ]);

        foreach($ref as $nums=>$d){
            if ($d == !NULL){
                array_push($individualPerusahaan,$d['nama'         ]);
                array_push($individualPerusahaan,$d['group'        ]);
                array_push($individualPerusahaan,$d['status'       ]);
                array_push($individualPerusahaan,$d['koor_longitude']);
                array_push($individualPerusahaan,$d['koor_latitude']);
                array_push($individualPerusahaan,$d['lokasi'       ]);
                array_push($individualPerusahaan,$d['kebutuhan'    ]);
                array_push($individualPerusahaan,$d['jenis'        ]);
                array_push($individualPerusahaan,$d['tipe_customer']);
                array_push($individualPerusahaan,$d['dilayani'     ]);
                array_push($individualPerusahaan,$d['penyalur'     ]);
                array_push($individualPerusahaan,$d['pelayanan'    ]);
                array_push($allPerusahaanData, $individualPerusahaan);
                $individualPerusahaan = [];
            }
            

        }
        // dump($allPerusahaanData);
        $export = new PerusahaanExport([
            $allPerusahaanData
        ]);

        return Excel::download($export, 'SOMESTA_Customer_Perusahaan.xlsx');
	}

    public function import_excel(Request $request)
    {
        $ref = $this->database->getReference('dbCustomer')->getValue();
        
        // initiate auto increment function
        $highest_id = 0;
        foreach($ref as $nums=>$d){
            $highest_id = $nums;
        }
        $autoIncrementID = $highest_id+1;

        

        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand()."_".$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('uploaded_file',$nama_file);
 
		// import data
		// $importan = Excel::import(PerusahaanImport, public_path('/uploaded_file/'.$nama_file));
        $importedPerusahaan = (new PerusahaanImport)->toArray(public_path('/uploaded_file/'.$nama_file));

        // imported reference
        // ^ array:12 [???
        // 0 => "PT Bintang Makmur"
        // 1 => "grup1"
        // 2 => "status3"
        // 3 => 106.83169397795
        // 4 => -6.2320093203783
        // 5 => "Jawa Barat"
        // 6 => 973347
        // 7 => "perusahaan"
        // 8 => "customer baik"
        // 9 => "pertamina1"
        // 10 => "Pertamina Mining Division"
        // 11 => "Pertamina Jawa Tengah"
        // ]

        
        foreach($importedPerusahaan as $structure=>$all){
            foreach($all as $data){
                if ($data == !NULL){
                    if($data[0] != 'nama' && $data[0] != NULL){
                        if ($ref == null) {
                            //split coords
                            $splittedKoordinat = explode(',',$data[3]);
                            $ref = $this->database->getReference('dbCustomer/1')
                            ->set([
                                "nama" =>               $data[0],
                                "group" =>              $data[1],
                                "status" =>             $data[2],
                                "koor_latitude" =>      floatval($splittedKoordinat[0]),
                                "koor_longitude" =>     floatval($splittedKoordinat[1]),
                                "lokasi" =>             $data[4],
                                "kebutuhan" =>          $data[5],
                                "jenis" =>              $data[6],
                                "tipe_customer" =>      $data[7],
                                "dilayani" =>           $data[8],
                                "penyalur" =>           $data[9],
                                "pelayanan" =>          $data[10],
                            ]);
                            dump($data);
                        }
                        else {
                            //split coords
                            $splittedKoordinat = explode(',',$data[3]);
                            $ref = $this->database->getReference('dbCustomer/'.$autoIncrementID)
                            ->set([
                                "nama" =>               $data[0],
                                "group" =>              $data[1],
                                "status" =>             $data[2],
                                "koor_latitude" =>      floatval($splittedKoordinat[0]),
                                "koor_longitude" =>     floatval($splittedKoordinat[1]),
                                "lokasi" =>             $data[4],
                                "kebutuhan" =>          $data[5],
                                "jenis" =>              $data[6],
                                "tipe_customer" =>      $data[7],
                                "dilayani" =>           $data[8],
                                "penyalur" =>           $data[9],
                                "pelayanan" =>          $data[10],
                            ]);
                        }
                    }
                }
            }
        }
 
		// alihkan halaman kembali
		return redirect('/uploadcsv')->with('pesan','Berhasil import data dari file');;
    }

}
