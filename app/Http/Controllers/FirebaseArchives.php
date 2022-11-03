<?php

namespace App\Http\Controllers;

class FirebaseArchives extends Controller //Arsip doang, tidak digunakan di aplikasi

//           _____   _____ _____ _____    _____   ____          _   _  _____ 
//     /\   |  __ \ / ____|_   _|  __ \  |  __ \ / __ \   /\   | \ | |/ ____|
//    /  \  | |__) | (___   | | | |__) | | |  | | |  | | /  \  |  \| | |  __ 
//   / /\ \ |  _  / \___ \  | | |  ___/  | |  | | |  | |/ /\ \ | . ` | | |_ |
//  / ____ \| | \ \ ____) |_| |_| |      | |__| | |__| / ____ \| |\  | |__| |
// /_/    \_\_|  \_\_____/|_____|_|      |_____/ \____/_/    \_\_| \_|\_____|
                                                                      
                                                                      
{
    public function read()
        {
            //originals from github repo
            $ref = $this->database->getReference('hewan/karnivora/harimau')->getSnapshot();
            dump($ref);
            $ref = $this->database->getReference('hewan/karnivora')->getValue();
            dump($ref);
    
            //somesta develop
            $ref = $this->database->getReference('dbCustomer')->getSnapshot();
            dump($ref);
            $ref = $this->database->getReference('dbCustomer/')->getValue();
            dump($ref);
            // return view('show', ['title' => 'show'], compact('ref'));   
        }

        public function set()
    {
        // before
        $ref = $this->database->getReference('name')->getValue();
        dump($ref);

        // set data
        $ref = $this->database->getReference('hewan/karnivora')
        ->set([
            "harimau" => [
                "benggala" => "galak",
                "sumatera" => "jinak"
            ]
        ]);

        // after
        $ref = $this->database->getReference('hewan')->getValue();
        dump($ref);
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