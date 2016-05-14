<?php namespace App\Http\Controllers;

class WelcomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function searchResults()
    {
        $in = \Input::all();
      // dd($in);
        if ($in['category'] == "" && $in['search'] == "") {
            return \Redirect::back();
        } else if ($in['category'] == "") {
            $rents = \App\Rent::where('status', '=', 'Available')
                ->where('name', '=', $in['search'])->get();
        } else if ($in['search'] == "") {
            $query = $in['category'];
            $rents = \App\Rent::where('status', '=', 'Available')
                ->where('category', '=', $in['category'])->get();
        } else {
            $rents = \App\Rent::where('status', '=', 'Available')
                ->where('name', '=', $in['search'])
                ->where('category', '=', $in['category'])->get();
        }

        //dd($rents);
        foreach ($rents as $key => $rent) {
            foreach ($rent->pictures as $picture) {
                $data2[] = $picture->id;
            }
            $owner = $rent->user->name;
            $contact = $rent->user->contactNumber;
            $email = $rent->user->email;
            $qty = $rent->available_qty;
            $status = $rent->status;
            $total_due = $rent->total_due;
            //  dd($owner);
            $data1[] = array(
                'name' => $rent->name,
                'id' => $rent->id,
                'description' => $rent->description,
                'contact' => $contact,
                'email' => $email,
                'available_qty' => $qty,
                'status' => $status,
                'total_due' => $total_due,
                'onwnBy' => $owner,
                'pictures' => $data2
            );
            $data2 = array();
        }
        $rents = json_decode(json_encode($rents),true);
        if ($rents == null) {
            $data1 = null;
            return view('search_result')->with('materials', $data1);
        } else {
            return view('search_result')->with('materials', $data1);
        }

        //dd($data1);

    }
}