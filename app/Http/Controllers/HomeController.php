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
        foreach ($materials as $key => $data) {
            foreach ($data->pictures as $picture) {
                $data2[] = $picture->id;
            }
            foreach ($data->rentees as $renters) {
                $owner = $renters->user->name;
            }
            //  dd($owner);
            $data1[$data['id']] = array(
                'name' => $data['name'],
                'id' => $data['id'],
                'description' => $data['description'],
                'available_qty' => $data['available_qty'],
                'onwnBy' => $owner,
                'onwnBy' => $owner,
                'pictures' => $data2
            );
            $data2 = array();
        }
        //dd($data1);
        return view('home')->with('materials', $data1);
    }

}
