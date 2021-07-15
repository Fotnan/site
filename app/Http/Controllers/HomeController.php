<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Auth;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function HomeSlider(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider(){
        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request){

        $slider_image =  $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);

        $last_img = 'image/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('home.slider')->with($notification);

    }

    public function Edit($id){
        $sliders = Slider::find($id);
        return view('admin.slider.edit',compact('sliders'));

    }


    public function Update(Request $request, $id){

        $validatedData = $request->validate([
            'title' => 'required|min:4',

        ],
            [
                'title.required' => 'Please Input Slider Name',
                'image.min' => 'Slider Longer then 4 Characters',
            ]);

        $old_image = $request->old_image;

        $slider_image =  $request->file('image');

        if($slider_image){

            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($slider_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/slider/';
            $last_img = $up_location.$img_name;
            $slider_image->move($up_location,$img_name);

            unlink($old_image);
            Slider::find($id)->update([
                'title' => $request->brand_name,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info'
            );
            return Redirect()->route('home.slider')->with($notification);

        }else{
            Slider::find($id)->update([
                'title' => $request->title,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'warning'
            );

            return Redirect()->route('home.slider')->with($notification);

        }
    }


    public function Delete($id){
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Slider::find($id)->delete();
        $notification = array(
            'message' => 'Slider Delete Successfully',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);

    }

}
