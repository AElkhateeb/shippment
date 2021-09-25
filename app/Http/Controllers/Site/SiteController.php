<?php

namespace App\Http\Controllers\Site;

use App\Models\Identity;
use App\Models\Contact;
use App\Models\Job;
use App\Models\Service;
use App\Models\Pro;
use App\Models\Testimonial;
use App\Models\Branch;
use App\Models\Client;
use App\Models\Page;
//use App\Models\Package;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Slider;
use App\Models\Place;
use App\Models\Road;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;


class SiteController extends Controller
{
    public function __construct()
    {

    }
    public function Index()
    {
        //sliders

        //$locale = App::currentLocale();

        $place = Place::get();
        $road = Road::get();
         $page = Page::where('id',2) -> first();
        $sliders = Slider::first();
        $sliders->makeHidden(['resource_url','media']);
       // return $sliders;
        $branches = Branch::with('contact')->limit(3)->first(); // return collection
        $branches->makeHidden(['resource_url']);

        //about About
        $about = Identity::first(); // return collection
       $about->makeHidden(['resource_url']);
       //service Service
        $service = Service::limit(8)->get(); // return collection
        $service->makeHidden(['resource_url']);

       //pro
        $pro = pro::limit(8)->get(); // return collection
        $pro->makeHidden(['resource_url']);

       //Testimonial
      //  $package = Package::limit(3)->get(); // return collection
      //  $package->makeHidden(['resource_url']);

        $testimonial = Testimonial::limit(8)->get(); // return collection
        $testimonial->makeHidden(['resource_url']);
        //rate
         $data=[
           'sliders'=>$sliders,
           'branches'=>$branches,
           'about'=>$about,
           'service'=>$service,
           'pro'=>$pro,
           'testimonial'=>$testimonial,
           'page'=>$page,
          // 'package'=>$package,
           'place'=>$place,
           'Road'=>$road,
       ];
        // return $data;
      return view('front.index',compact('data'));

    }
    public function About()
    {
        // echo "home mn controller";
       // return view('front\about');
        $page = Page::where('id',2)-> first();
        $about = Identity::limit(4)->get();
        $about->makeHidden(['resource_url']);
        //service Service
        $pro = pro::limit(8)->get(); // return collection
        $pro->makeHidden(['resource_url']);
         $data=[
           // 'sliders'=>$sliders,
            'about'=>$about,
            'pro'=>$pro,
            'page'=>$page,
        ];
        return view('front.about',compact('data'));
    }
    public function Services()
    {

       // $counter = Counter::limit(4)->get(); // return collection
       // $counter->makeHidden(['resource_url']);
        $page = Page::where('id',3)-> first();
        $service = Service::limit(8)->get(); // return collection
        $service->makeHidden(['resource_url']);
        $data=[
            'service'=>$service,
            'page'=>$page,
           // 'counters'=>$counter,
            ];
        return view('front.services',compact('data'));

    }
    public function Service($id)
    {
        $page = Page::where('id',3)->first();
        $service = Service::where('id',$id)->get(); // return collection
        $service->makeHidden(['resource_url']);
         $data=[
            'service'=>$service,
            'page'=>$page,
        ];
        return view('front.service',compact('data'));

    }
    public function Contact()
    {
        $branches = Branch::with('contact')->limit(8)->get(); // return collection
        $branches->makeHidden(['resource_url']);
        $page = Page::where('id',4)-> first();

         $data=[
            'branches'=>$branches,
             'page'=>$page,
        ];
        // echo "home mn controller";
       return view('front.contact',compact('data'));

    }
    public function Career()
    {

        $job = Job::limit(8)->get(); // return collection
        $job->makeHidden(['resource_url']);
        $page = Page::where('id',5)-> first();

        $data=[
            'job'=>$job,
            'page'=>$page,
        ];
        // echo "home mn controller";
        return view('front.job',compact('data'));

    }
    public function Apply(Request $request )
    {
        //dd($request);

        $flight = Application::create([
            'fullname' => $request->fullname,
            'job_id' => $request->job_id,
            'bday' => $request->bday,
            'male' => $request->male,
            'military' => $request->military,
            'email' => $request->email,
            'phone' => $request->phone,
            'phone_2' => $request->phone_2,
            'city' => $request->city,
            'area' => $request->area,
            'education' => $request->education,
            'experience' => $request->experience,
        ]);

        $job = Job::limit(8)->get(); // return collection
        $job->makeHidden(['resource_url']);
        $page = Page::where('id',5)-> first();

        $data=[
            'job'=>$job,
            'page'=>$page,
        ];
        // echo "home mn controller";
        return view('front.job',compact('data'));

    }
    public function Client(Request $request){

        $flight = Client::create([

            'phone' => $request->phone,

        ]);
        return Redirect::back();
    }
    public function Pricing()
    {
       // $service = Package::limit(3)->get(); // return collection
      //  $service->makeHidden(['resource_url']);
        $page = Page::where('id',6)-> first();
        $data=[
        //    'service'=>$service,
            'page'=>$page,
            // 'counters'=>$counter,
        ];
        // echo "home mn controller";
        return view('front.pricing',compact('data'));

    }

}
