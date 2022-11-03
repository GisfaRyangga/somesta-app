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
        $pass = "anya123";

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
        $idToken = "";

        // $this->auth->revokeRefreshTokens("");

        // if (Session::has('firebaseUserId') && Session::has('idToken')) {
        //     dd("User masih login.");
        // } else {
        //     dd("User sudah logout.");
        // }

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($idToken, $checkIfRevoked = true);
            dump($verifiedIdToken);
            dump($verifiedIdToken->claims()->get('sub')); // uid
            dump($this->auth->getUser($verifiedIdToken->claims()->get('sub')));
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }

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

    public function read()
    {
        $ref = $this->database->getReference('dbCustomer/')->getValue();
        $local_id = 1;
        return view('show', ['title' => 'show'], compact('ref','local_id'));
    }

    public function update()
    {
        

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
    
    public function delete()
    {
        // before
        $ref = $this->database->getReference('hewan/karnivora/harimau')->getValue();
        dump($ref);

        /**
         * 1. remove()
         * 2. set(null)
         * 3. update(["key" => null])
         */

        // remove()
        $ref = $this->database->getReference('hewan/karnivora/harimau/benggala')->remove();

        // set(null)
        $ref = $this->database->getReference('hewan/karnivora/harimau/benggala')
            ->set(null);

        // update(["key" => null])
        $ref = $this->database->getReference('hewan/karnivora/harimau')
            ->update(["benggala" => null]);

        // after
        $ref = $this->database->getReference('hewan/karnivora/harimau')->getValue();
        dump($ref);
    }
        
}
