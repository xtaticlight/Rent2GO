<?php namespace App\Http\Controllers;

class HomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function home()
    {
        $materials = \App\Material::all();
        // dd($materials);
        foreach ($materials as $data) {
            $pictures = \App\Picture::where('material_id', '=', $data['id'])->get();

            // dd($pictures);
            foreach ($pictures as $picture) {
                $data2[$picture['id']] = $picture['id'];
            }
            $rents = json_decode(json_encode(\App\Renter::where('material_id', '=', $data['id'])->get()), true);
          //  $rents = array_column($rents, 0);
         //  dd($rents);
            $owner = json_decode(json_encode(\App\User::where('id', '=', $rents[0]['user_id'])->get()), true);
             dd($owner);
            $data1 = array(
                'name' => $data['name'],
                'description' => $data['description'],
                'available_qty' => $data['available_qty'],
                'onwnBy' => $owner[0]['name'],
                'pictures' => $data2
            );
        }
        dd($data1);
        return view('home')->with('material', $materials);
    }

}
