<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSettings;
use Illuminate\Http\Request;
 
class WebsiteSettingsController extends Controller
{
   public function __construct()
   {
       $this->middleware(['permission:website setting add'])->only(['createSettings'],['storeSettings']);
       $this->middleware(['permission:website setting view'])->only(['websiteSettings']);
       $this->middleware(['permission:website setting delete'])->only(['deleteSettings']);

   }
   public function websiteSettings(){
        $settingsss = WebsiteSettings::orderBy('id', 'desc')->get();
        return view('admin.websitesettings',compact('settingsss'));
   }
   public function createSettings(){
    return view('admin.addwebsitesettings');
   }
   public function storeSettings(Request $request){
      // validation rules For student Information
      $validatedData = $request->validate([
        'institute_name' => 'required|unique:website_settings',
        'contact_number' => 'required',
        'address' => 'required',
        'institute_email' => 'required',
        'footer' => 'required',
        'logo' => 'required|mimes:jpeg,png,jpg,gif',
        'fav' => 'required|mimes:jpeg,png,jpg,gif',
    ]);
    //storing Logo Image
    $logo =$request->logo;
    $logoName = time().'.'.$logo->getClientOriginalExtension();
    $request->logo->move('backend/assets/images', $logoName);

    //storing Fav Image
    $fav =$request->fav;
    $favName = time().'.'.$fav->getClientOriginalExtension();
    $request->fav->move('backend/assets/images', $favName);

    // updating previous status to Inactive
    WebsiteSettings::query()->update(['setting_status' => 'Inactive']);

    $settings = new WebsiteSettings();
    $settings->institute_name = $validatedData['institute_name'];
    $settings->address = $validatedData['address'];
    $settings->institute_email = $validatedData['institute_email'];
    $settings->footer = $validatedData['footer'];
    $settings->contact_number = $validatedData['contact_number'];
    $settings->setting_status = 'Active';
    $settings->logo =  $logoName;
    $settings->fav = $favName ;
    $settings->save();
  
    return redirect()->back()->with('massage','Settings SuccessFully added');
   
   }
  
   public function deleteSettings($id){
            $websiteSettings = WebsiteSettings::find($id);
            $websiteSettings->delete();
        return redirect()->route('websiteSettings')->with('message','Teacher Information SuccessFully Deleted');
   }
}
 