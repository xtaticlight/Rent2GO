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
    public function postUploadpic() {
        // getting all of the post data
        $id = \Auth::user()->id;
        $file = array('image' => \Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = \Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return \Redirect::back();
        } else {
            // checking file is valid.
            if (\Input::file('image')->isValid()) {
                $destinationPath = 'assets/img'; // upload path
                $extension = \Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = $id . ".jpg";
                \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                \DB::table('users')->where('id', $id)->update(array('uploadedpic' => 1));
                ///  return \Redirect::back();
            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return \Redirect::back();
            }
        }
        return \Redirect::back();
    }

    public function home()
    {
        $rents = \App\Rent::where('status','=','available')->get();
        // dd($materials);
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
        //dd($data1);
        $rents = json_decode(json_encode($rents),true);
        if ($rents == null) {
            $data1 = null;
            return view('home')->with('materials', $data1);
        } else {
            return view('home')->with('materials', $data1);
        }

    }
    public function SortProduct($cat){
        dd($cat);
    }

    public function myRental()
    {
        $rents = \App\Rent::where('user_id','=',\Auth::user()->id)->get();
        foreach ($rents as $key => $rent) {
            foreach ($rent->pictures as $picture) {
                $data2[] = $picture->id;
            }
            $renter = json_decode(json_encode(\App\User::where('id',$rent->RentBy)->get()),true);
          //  dd($renter);
            $contact = $rent->user->contactNumber;
            $email = $rent->user->email;
            $qty = $rent->qty;
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
                'RentBy' =>$renter[0]['name'],
                'pictures' => $data2
            );
            $data2 = array();
        }
       // dd($data1);
        $rents = json_decode(json_encode($rents),true);
        if ($rents == null) {
            $data1 = null;
            return view('myRental')->with('materials', $data1);
        } else {
            return view('myRental')->with('materials', $data1);
        }

    }

    public function deleteItem (){
        $in = \Input::all();
         $rent = \App\Rent::find($in['id']);
        $rent->delete();
        return \Redirect::back();
    }
}
