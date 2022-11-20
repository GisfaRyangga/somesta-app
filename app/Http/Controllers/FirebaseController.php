<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Firebase\Auth\Token\Exception\InvalidToken;
use Kreait\Firebase\Exception\Auth\RevokedIdToken;
use App\Models\Perusahaan;

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
        return view('about', ['title' => 'about']);
    }

    public function signIn()
    {
        $email = "angelicdemon@gmail.com";
        $pass = "anya123";

        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($email, $pass);
            // dump($signInResult->data());

            Session::put('firebaseUserId', $signInResult->firebaseUserId());
            Session::put('idToken', $signInResult->idToken());
            Session::save();

            dd($signInResult);
        } catch (\Throwable $e) {
            switch ($e->getMessage()) {
                case 'INVALID_PASSWORD':
                    dd("Kata sandi salah!.");
                    break;
                case 'EMAIL_NOT_FOUND':
                    dd("Email tidak ditemukan.");
                    break;
                default:
                    dd($e->getMessage());
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
            Session::save();
            dd("User berhasil logout.");
        } else {
            dd("User belum login.");
        }
    }

    public function userCheck()
    {
        // $idToken = "eyJhbGciOiJSUzI1NiIsImtpZCI6ImY4MDljZmYxMTZlNWJhNzQwNzQ1YmZlZGE1OGUxNmU4MmYzZmQ4MDUiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20vcHJvamVjdC1mYnMtYmYwZTciLCJhdWQiOiJwcm9qZWN0LWZicy1iZjBlNyIsImF1dGhfdGltZSI6MTY2ODk0ODU2NSwidXNlcl9pZCI6Ik5FS2JSN0N5Q2hoS3htTEtjUGlRRVhmMmpiMDIiLCJzdWIiOiJORUtiUjdDeUNoaEt4bUxLY1BpUUVYZjJqYjAyIiwiaWF0IjoxNjY4OTQ4NTY1LCJleHAiOjE2Njg5NTIxNjUsImVtYWlsIjoiYW5nZWxpY2RlbW9uQGdtYWlsLmNvbSIsImVtYWlsX3ZlcmlmaWVkIjpmYWxzZSwiZmlyZWJhc2UiOnsiaWRlbnRpdGllcyI6eyJlbWFpbCI6WyJhbmdlbGljZGVtb25AZ21haWwuY29tIl19LCJzaWduX2luX3Byb3ZpZGVyIjoicGFzc3dvcmQifX0.eTpZxjKiEkGr9LuBhjJ_EKAubZcqJj0rS8kZ9YJlshEQHcB_17ejiJH99GakR_U055CMy-r4YoymA5gon8MZPYTTE5sVDNju7Xc7eteH2p1zPVYshFnTQr97iRmC-zXcqf8ff5n7LFaN00zP4k32At_bfHgCb7YUbqWipb1TNc-yw8AXuVAMOKimkDb-tYBnpksCEagiDOn-4b52ZjT1vRWKCU_9LCNNdcAIBFb2qZj-mJmggNCckl1VBz1Dz_SDmDKwz5v7GuuY1Tp1P9vqNp7V9brl2XrskGBoQ-KfehJYdQ2PCS71Fa7_6vv-FRV1j7o06hQMeI4CuRC8oGJ7Lw";

        // $this->auth->revokeRefreshTokens("");

        if (Session::has('firebaseUserId') && Session::has('idToken')) {
            dd("User masih login.");
        } else {
            dd("User sudah logout.");
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
        $ref = $this->database->getReference('dbCustomer/')->getValue();
        $local_id = 1;
        return view('show', ['title' => 'show'], compact('ref','local_id'));
    }

    public function update(){
        // before
        $ref = $this->database->getReference('tumbuhan/dikotil')->getValue();
        dump($ref);

        // update data
        $ref = $this->database->getReference('tumbuhan')
        ->update(["dikotil" => "mangga"]);

        // after
        $ref = $this->database->getReference('tumbuhan/dikotil')->getValue();
        dump($ref);
    }

    public function edit($data){
        $ref = $this->database->getReference('dbCustomer/'.$data)->getValue();
        $data_id = $data;
        $ref_longitude =  $this->database->getReference('dbCustomer/'.$data."/koor_longitude")->getValue();
        $ref_latitude =  $this->database->getReference('dbCustomer/'.$data."/koor_latitude")->getValue();
        $ref_combined_coords = $ref_latitude.", ".$ref_longitude;
        return view('edit', ['title' => 'show'], compact('ref','ref_combined_coords','data_id'));
    }

    public function updateThisPerusahaan(Request $request, $id){
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
        return redirect('/show')->with('pesan','Data user berhasil diperbarui');
    }

    public function set(Request $request)
    {
        // before
        $ref = $this->database->getReference('dbCustomer')->getValue();

        //initiate auto increment function
        $highest_id = 0;
        foreach($ref as $nums=>$d){
            $highest_id = $nums;
        }
        $autoIncrementID = $highest_id+1;

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

        return redirect('/form')->with('pesan','Data Berhasil ditambahkan');
        
        
        // dump($ref);
        // $ref = $this->database->getReference('dev/3')->getValue();
        // dump($ref);

        // after
        // $ref = $this->database->getReference('dbCustomer/namaPerusahaan')->getValue();
        // dump($ref);
    }

    public function addAdmin(Request $request)
    {
        dump("REGISTER FUNCTION");
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
                "username" => $request->username,
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
        
        else {
            $ref = $this->database->getReference('dbAdmin/'.$autoIncrementID)
            ->set([
                "fullName" => $fullName,
                "username" => $request->username,
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
        return redirect('/add_admin')->with('pesan','Admin Berhasil ditambahkan');
    }
    
    public function delete($id)
    {
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
        return redirect('/show')->with('pesan','Data user berhasil dihapus');
    }
        
}
