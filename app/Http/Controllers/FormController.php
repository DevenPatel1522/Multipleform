<?php

namespace App\Http\Controllers;

use App\Models\education;
use App\Models\image;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use extension;
use Log;
/*****************************Profile Page ***************************/
class FormController extends Controller
{
    public function profileget($id)
    {


        try {
            $lastid = $id;
            $user = Profile::find($lastid);
            return view('profile', compact('user'));
        }
        catch (\Exception $ex) {
            if (isset($ex->errorInfo[2])) {
                $msg = $ex->errorInfo[2];
            }
            else {
                $msg = $ex->getMessage();
            }
            $arr = array("status" => 400, "message" => $msg, "data" => $msg);
        }
    }

    public function profilege()
    {
        return view('profile');
    }

    public function profilepost(Request $request)
    {
        $input = $request->all();
        $rules = array(
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'birthdate' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'age' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
        }
        else {
            try {
                \Log::info('Profile Data save in Database');
                $checkEmail = Profile::where('email', '=', $request->email)->where('token', '!=', $request->token)->exists();
                if ($checkEmail) {
                    $arr['data'] = array('email' => $request->email);
                    $arr['meta'] = array("code" => 200, "message" => "email already exist");
                    return response()->json($arr);
                }
                else {
                    $userupdate = Profile::where('token', '=', $request->token)->first();
                    if ($userupdate) {
                        $userupdate->firstname = $request->firstname;
                        $userupdate->lastname = $request->lastname;
                        $userupdate->phone = $request->phone;
                        $userupdate->birthdate = $request->birthdate;
                        $userupdate->email = $request->email;
                        $userupdate->address = $request->address;
                        $userupdate->age = $request->age;
                        $userupdate->token = $request->token;
                        $userupdate->step = 1;
                        $userupdate->save();
                        $id = $userupdate->id;

                        return \Redirect::route('image', $id);
                    }
                    else {
                        $token = Str::random(64);
                        $profile = new Profile();
                        $profile->firstname = $request->firstname;
                        $profile->lastname = $request->lastname;
                        $profile->phone = $request->phone;
                        $profile->birthdate = $request->birthdate;
                        $profile->email = $request->email;
                        $profile->address = $request->address;
                        $profile->age = $request->age;
                        $profile->token = $token;
                        $profile->step = 1;
                        $profile->status = 0;
                        $profile->save();
                        $id = $profile->id;

                        return \Redirect::route('image', $id);
                    }
                }
            }
            catch (\Exception $ex) {
                if (isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                }
                else {
                    $msg = $ex->getMessage();
                }
                $arr = array("status" => 400, "message" => $msg, "data" => $msg);
            }
        }
        return response()->json($arr);

    }

    /*********************image page Code *******************/

    public function imageget($lastid)
    {
        $last = image::where('profile_id', $lastid)->first();
        if ($last) {
            return view('image', compact('last', 'lastid'));
        }
        else {
            return view('image', compact('last', 'lastid'));

        }

    }

    public function imagepost(Request $request)
    {

        try {
            \Log::info('Image Page Step Save in Profile Table');
            $data = Profile::where('id', '=', $request->profile_id)->first();
            if ($data) {

                $id = $request->profile_id;
                $data->step = 2;
                $data->save();
                return \Redirect::route('education', $id);
            }

        }
        catch (\Exception $ex) {
            if (isset($ex->errorInfo[2])) {
                $msg = $ex->errorInfo[2];
            }
            else {
                $msg = $ex->getMessage();
            }
            $arr = array("status" => 400, "message" => $msg, "data" => $msg);
        }


        return response()->json($arr);

    /*******************image store code if above code not working**************/

    // $userimage = time() . rand() . '.' . $request->userimage->extension();
    // $request->userimage->move(public_path('image'), $userimage);
    // $image->userimage = $userimage;

    // $usersign = time() . rand() . '.' . $request->usersign->extension();
    // $request->usersign->move(public_path('sign'), $usersign);
    // $image->usersign = $usersign;
    // if ($request->hasFile('userimage')) {
    //     $userimage = public_path() . '/image';
    //     $file = $request->userimage;
    //     $imageuser = time() . rand() . '.' . $file->extension();
    //     $file->move($userimage, $imageuser);
    //     $image['userimage'] = $imageuser;
    // }
    // if ($request->hasFile('usersign')) {
    //     $userimage = public_path() . '/sign';
    //     $file = $request->usersign;
    //     $signuser = time() . rand() . '.' . $file->extension();
    //     $file->move($userimage, $signuser);
    //     $image['usersign'] = $signuser;
    // }    

    // $image = new image();
    // $image->profile_id = $request->profile_id;
    // $image->userimage = $imageuser;
    // $image->usersign = $signuser;
    // $image->save();
    }

    /************************** education page code*********************/
    public function education($id)
    {
        $profile_data = Profile::whereId($id)->first();
        return view('education', compact('profile_data'));
    }

    public function educationpost(Request $request)
    {

        $input = $request->all();
        $rules = array(
            'ssc_year' => 'required',
            'ssc_marks' => 'required',
            'hsc_year' => 'required',
            'hsc_marks' => 'required',
            'bachelor_CGPA' => 'required',
            'bachelor_year' => 'required',
            'master_year' => 'required',
            'master_CGPA' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
        }
        else {
            \Log::info('Education Page Data Save In Database.');
            try {
                $education = Profile::where('id', '=', $request->id)->first();
                $educationupdate = Profile::where('id', '=', $request->editid)->first();

                if ($education) {
                    $education->ssc_year = $request->ssc_year;
                    $education->ssc_marks = $request->ssc_marks;
                    $education->hsc_year = $request->hsc_year;
                    $education->hsc_marks = $request->hsc_marks;
                    $education->bachelor_CGPA = $request->bachelor_CGPA;
                    $education->bachelor_year = $request->bachelor_year;
                    $education->master_year = $request->master_year;
                    $education->master_CGPA = $request->master_CGPA;
                    $education->step = 3;
                    $education->save();
                    $id = $education->id;
                    return \Redirect::route('last', $id);
                }

                elseif ($educationupdate) {
                    $educationupdate->ssc_year = $request->ssc_year;
                    $educationupdate->ssc_marks = $request->ssc_marks;
                    $educationupdate->hsc_year = $request->hsc_year;
                    $educationupdate->hsc_marks = $request->hsc_marks;
                    $educationupdate->bachelor_CGPA = $request->bachelor_CGPA;
                    $educationupdate->bachelor_year = $request->bachelor_year;
                    $educationupdate->master_year = $request->master_year;
                    $educationupdate->master_CGPA = $request->master_CGPA;
                    $educationupdate->step = 3;
                    $educationupdate->save();
                    $id = $request->editid;
                    return \Redirect::route('last', $id);
                }
                else {
                    dd('id not found');
                }
            }
            catch (\Exception $ex) {
                if (isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                }
                else {
                    $msg = $ex->getMessage();
                }
                $arr = array("status" => 400, "message" => $msg, "data" => $msg);
            }
        }
        return response()->json($arr);
    }
    public function educationget($id)
    {
        $lastid = $id;
        $user = Profile::find($lastid);
        return view('education', compact('user'));
    }
    /************************** Last Page Code*******************/
    public function last($id)
    {
        $photos = Profile::find($id);
        $images = image::where('profile_id', $id)->first();
        return view('last', compact('photos', 'images'));
    }
    /*********************table listing page ******************/
    public function list(Request $request)
    {

        $listing = $request->get('changepagination');

        
        if($listing){
            $users = Profile::sortable()->paginate($listing);
        }
        $users = Profile::sortable()->paginate($listing);


        return view('list', compact('users'));
    }
    /**********************Edit Button Code*******************/
    public function edit($id)
    {
        try {
            \Log::info('check a step and display a step page.');

            $edit = Profile::where('id', '=', $id)->first();
            if ($edit->step == 1) {
                return \Redirect::route('image', $id);
            }
            elseif ($edit->step == 2) {
                return \Redirect::route('education', $id);
            }
            elseif ($edit->step == 3) {
                return \Redirect::route('profile', $id);
            }
        }
        catch (\Exception $ex) {
            if (isset($ex->errorInfo[2])) {
                $msg = $ex->errorInfo[2];
            }
            else {
                $msg = $ex->getMessage();
            }
            $arr = array("status" => 400, "message" => $msg, "data" => $msg);
        }

    }
    /*******************Destory Button Code*****************/

    public function destory(Request $request)
    {
        Profile::whereid($request->get('id'))->delete();
        image::whereProfileId($request->get('id'))->delete();
    }

    /******************Change Status Code*******************/
    public function changeStatus(Request $request)
    {
        try {

            \Log::info('Active button and Inactive button Code .');

            $users_status = Profile::find($request->get('id'));
            if ($users_status->status == 0) {
                $users_status->status = 1;
                $users_status->save();
            }
            else {
                $users_status->status = 0;
                $users_status->save();
            }
            if ($request->get('selected_drobox_value') == 1) {
                $users = Profile::sortable()->whereStatus(1)->with('image')->paginate(5);
                // echo "<pre>";
                // print_r($users);
            }
            elseif ($request->get('selected_drobox_value') == 'status') {
                $users = Profile::sortable()->paginate(5);
                // echo "<pre>";
                // print_r($users);
            }
            elseif ($request->get('selected_drobox_value') == 0) {
                $users = Profile::sortable()->whereStatus(0)->with('image')->paginate(5);
                // echo "<pre>";
                // print_r($users);
            }
            $returnHTML = view('table')->with('users', $users)->render();
            return response()->json(array('success' => 200, 'html' => $returnHTML));
        }
        catch (\Exception $ex) {
            if (isset($ex->errorInfo[2])) {
                $msg = $ex->errorInfo[2];
            }
            else {
                $msg = $ex->getMessage();
            }
            $arr = array("status" => 400, "message" => $msg, "data" => $msg);
        }

    }
    /****************Edit age in listing Page *******************/
    public function editage(Request $request)
    {
        $user = Profile::find($request->get('id'));
        if ($user) {
            $user->age = $request->age;
            $user->save();
        }
    }
    /******************search bar code *************************/
    public function search(Request $request)
    {
        try {
            \Log::info('Search a data and Display a search Data.');

            $search = $request->input('search_value');
            if ($request->get('selected_drobox_value') == 1) {

                if ($search == '') {
                    $users = Profile::sortable()->whereStatus(1)->paginate(5);
                }
                else {
                    $users = Profile::sortable()->
                        whereStatus(1)->where('firstname', 'LIKE', "%{$search}%")
                        ->whereStatus(1)->orWhere('lastname', 'LIKE', "%{$search}%")
                        ->whereStatus(1)->orWhere('phone', 'LIKE', "%{$search}%")
                        ->whereStatus(1)->orWhere('birthdate', 'LIKE', "%{$search}%")
                        ->whereStatus(1)->orWhere('email', 'LIKE', "%{$search}%")
                        ->whereStatus(1)->orWhere('address', 'LIKE', "%{$search}%")
                        ->whereStatus(1)->orWhere('age', 'LIKE', "%{$search}%")
                        ->whereStatus(1)->orWhere('ssc_year', 'LIKE', "%{$search}%")
                        ->whereStatus(1)->orWhere('ssc_marks', 'LIKE', "%{$search}%")
                        ->whereStatus(1)->orWhere('hsc_year', 'LIKE', "%{$search}%")
                        ->whereStatus(1)->orWhere('hsc_marks', 'LIKE', "%{$search}%")
                        ->whereStatus(1)->orWhere('bachelor_year', 'LIKE', "%{$search}%")
                        ->whereStatus(1)->orWhere('bachelor_CGPA', 'LIKE', "%{$search}%")
                        ->whereStatus(1)->orWhere('master_year', 'LIKE', "%{$search}%")
                        ->whereStatus(1)->orWhere('master_CGPA', 'LIKE', "%{$search}%")
                        ->paginate(5);
                }
            }
            elseif ($request->get('selected_drobox_value') == 'status') {
                if ($search == '') {
                    $users = Profile::sortable()->with('image')->paginate(5);
                }
                else {
                    $users = Profile::sortable()->where('firstname', 'LIKE', "%{$search}%")
                        ->orWhere('lastname', 'LIKE', "%{$search}%")
                        ->orWhere('phone', 'LIKE', "%{$search}%")
                        ->orWhere('birthdate', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%")
                        ->orWhere('address', 'LIKE', "%{$search}%")
                        ->orWhere('age', 'LIKE', "%{$search}%")
                        ->orWhere('ssc_year', 'LIKE', "%{$search}%")
                        ->orWhere('ssc_marks', 'LIKE', "%{$search}%")
                        ->orWhere('hsc_year', 'LIKE', "%{$search}%")
                        ->orWhere('hsc_marks', 'LIKE', "%{$search}%")
                        ->orWhere('bachelor_year', 'LIKE', "%{$search}%")
                        ->orWhere('bachelor_CGPA', 'LIKE', "%{$search}%")
                        ->orWhere('master_year', 'LIKE', "%{$search}%")
                        ->orWhere('master_CGPA', 'LIKE', "%{$search}%")
                        ->paginate(5);
                }
            }
            elseif ($request->get('selected_drobox_value') == 0) {
                if ($search == '') {
                    $users = Profile::sortable()->whereStatus(0)->paginate(5);
                }
                else {
                    $users = Profile::sortable()->
                        whereStatus(0)->where('firstname', 'LIKE', "%{$search}%")
                        ->whereStatus(0)->orWhere('lastname', 'LIKE', "%{$search}%")
                        ->whereStatus(0)->orWhere('phone', 'LIKE', "%{$search}%")
                        ->whereStatus(0)->orWhere('birthdate', 'LIKE', "%{$search}%")
                        ->whereStatus(0)->orWhere('email', 'LIKE', "%{$search}%")
                        ->whereStatus(0)->orWhere('address', 'LIKE', "%{$search}%")
                        ->whereStatus(0)->orWhere('age', 'LIKE', "%{$search}%")
                        ->whereStatus(0)->orWhere('ssc_year', 'LIKE', "%{$search}%")
                        ->whereStatus(0)->orWhere('ssc_marks', 'LIKE', "%{$search}%")
                        ->whereStatus(0)->orWhere('hsc_year', 'LIKE', "%{$search}%")
                        ->whereStatus(0)->orWhere('hsc_marks', 'LIKE', "%{$search}%")
                        ->whereStatus(0)->orWhere('bachelor_year', 'LIKE', "%{$search}%")
                        ->whereStatus(0)->orWhere('bachelor_CGPA', 'LIKE', "%{$search}%")
                        ->whereStatus(0)->orWhere('master_year', 'LIKE', "%{$search}%")
                        ->whereStatus(0)->orWhere('master_CGPA', 'LIKE', "%{$search}%")
                        ->paginate(5);
                }
            }
            $returnHTML = view('table')->with('users', $users)->render();
            return response()->json(array('success' => 200, 'html' => $returnHTML));
        }
        catch (\Exception $ex) {
            if (isset($ex->errorInfo[2])) {
                $msg = $ex->errorInfo[2];
            }
            else {
                $msg = $ex->getMessage();
            }
            $arr = array("status" => 400, "message" => $msg, "data" => $msg);
        }
    }

    /****************** Data get using Status Dropdown**********************/
    public function activeuser(Request $request)
    {
        if ($request->get('selected_drobox_value') == 1) {
            $users = Profile::sortable()->whereStatus(1)->paginate(5);
        }
        elseif ($request->get('selected_drobox_value') == 'status') {
            $users = Profile::sortable()->with('image')->paginate(5);
        }
        elseif ($request->get('selected_drobox_value') == 0) {
            $users = Profile::sortable()->whereStatus(0)->paginate(5);
        }

        // $users = Profile::where('status', $request->status)->get();
        $returnHTML = view('table')->with('users', $users)->render();
        return response()->json(array('success' => 200, 'html' => $returnHTML));
    }

    /**********************Active All User*********************************/
    public function allactive(Request $request)
    {
        try {
            $id = $request->ids;
            $status = ['status' => 1];
            $user = DB::table('profiles')->whereIn('id', explode(',', $id))->where('status', '=', 0)->update($status);
            return response()->json(['status' => 200, 'message' => 'status change successfully']);
        }
        catch (\Exception $error) {
            return redirect()->back()->with('error', 'Data Fail !! something went wrong');
            throw $error;
        }
    }
    /**********************InActive All User*********************************/

    public function allinactive(Request $request)
    {
        try {
            $id = $request->ids;
            $status = ['status' => 0];
            $user = DB::table('profiles')->whereIn('id', explode(',', $id))->where('status', '=', 1)->update($status);
            return response()->json(['status' => 200, 'message' => 'status change successfully']);
        }
        catch (\Exception $error) {
            return redirect()->back()->with('error', 'Data Fail !! something went wrong');
            throw $error;
        }
    }

/***************************** upload user image ***********************************/
    public function upload(Request $request)
    {
        $folderPath = public_path('image/');
        $image_parts = explode(";base64,", $request->userimage);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = time() . rand() . '.' . 'png';
        $imageFullPath = $folderPath . $imageName;
        file_put_contents($imageFullPath, $image_base64);

        $editFile = image::where('profile_id', '=', $request->profile)->first();
        if ($editFile) {
            $editFile->userimage = $imageName;
            $editFile->profile_id = $request->profile;
            $editFile->save();
        }
        else {
            $saveFile = new image();
            $saveFile->userimage = $imageName;
            $saveFile->profile_id = $request->profile;
            $saveFile->save();
        }
        return response()->json(['success' => 'Crop Image Uploaded Successfully']);
    }


    /**********************************upload user sign image***************************/
    public function usersignupload(Request $request)
    {

        $folderPath = public_path('sign/');
        $image_parts = explode(";base64,", $request->usersign);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = time() . rand() . 'png';
        $imageFullPath = $folderPath . $imageName;
        file_put_contents($imageFullPath, $image_base64);

        $editFile = image::where('profile_id', $request->profile)->first();
        if ($editFile) {
            $editFile->usersign = $imageName;
            $editFile->profile_id = $request->profile;
            $editFile->save();
        }
        else {
            $saveFile = new image();
            $saveFile->usersign = $imageName;
            $saveFile->profile_id = $request->profile;
            $saveFile->save();
        }
        return response()->json(['success' => 'Crop Image Uploaded Successfully']);
    }


/****************************** Add a pagination dropdown *********************/
    public function changepagination(Request $request)
    {
        
        $listing = $request->get('changepagination');
        
        if ($request->get('selected_drobox_value') == 1) {
            $users = Profile::sortable()->whereStatus(1)->paginate($listing);
        }
        elseif ($request->get('selected_drobox_value') == 'status') {
            $users = Profile::sortable()->with('image')->paginate($listing);
        }
        elseif ($request->get('selected_drobox_value') == 0) {
            $users = Profile::sortable()->whereStatus(0)->paginate($listing);
        }

        $returnHTML = view('table')->with('users', $users)->render();
        return response()->json(array('success' => 200, 'html' => $returnHTML));
    }
}
