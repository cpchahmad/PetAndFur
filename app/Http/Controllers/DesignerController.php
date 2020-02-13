<?php

namespace App\Http\Controllers;

use App\Designer;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DesignerController extends Controller
{
    public $helper;

    public function __construct()
    {
        $this->helper = new HelperController();
    }

    public function Dashboard(Request $request){
        $designers = Designer::where('shop_id', $this->helper->getShop()->id)->get();
        $query =  Order::where('shop_id',$this->helper->getShop()->id)->newQuery();
        $query->whereHas('has_additional_details',function ($q){
            $q->where('status_id','!=',2);
        });
        $orders = $query->get();
        $ratings = [];
        $counts = [];
        foreach ($designers as $designer){
            array_push($ratings, $designer->has_reviews->avg('rating'));

        }
        if($request->has('start') && $request->has('end'))
        {
            $start = $request->input('start');
            $end =  $request->input('end');
        }
        else{
            $start = null;
            $end = null;
        }
        ;
        return view('admin.dashboard')->with([
            'designers' => $designers,
            'orders' => $orders,
            'ratings' => $ratings,
            'start' => $start,
            'end' => $end,
        ]);
    }
    public function ManualDesignPicker(Request $request){
//        dd($request);
        if($request->input('start-order') < $request->input('end-order')){
            $start = $request->input('start-order');
            $end =$request->input('end-order');
        }
        else{
            $end = $request->input('start-order');
            $start =$request->input('end-order');
        }
        for($i =$start; $i<=$end ;$i++){
            $order = Order::find($i);
            if($order != null){
                if( $order->has_additional_details != null){
                    $order->has_additional_details->designer_id = $request->input('designer');
                    $order->has_additional_details->save();
                    $order->designer_id = $request->input('designer');
                    $order->save();
                }
            }
        }
        return redirect()->back()->with('success', 'Designer Assigned Successfully');

    }

    public function Designer_Save(Request $request){
        $designer = new Designer();
        $designer->name = $request->input('name');
        $designer->color = $request->input('color');
        $designer->background_color = $request->input('background_color');
        $designer->shop_id = $this->helper->getShop()->id;
        $designer->save();
        $user =  User::create([
            'name' => $designer->name,
            'email' => str_replace(' ', '', $designer->name).'@boompup.com',
            'password' => Hash::make(str_replace(' ', '', $designer->name).'@1234'),
            'designer_id' => $designer->id,
        ]);
        $user->assignRole('designer');
        return redirect()->back()->with('success', 'Designer Added Successfully');
    }
    public function SetStatus(Request $request){
        $designer = Designer::find($request->input('designer'));
        $designer->status = $request->input('status');
        $designer->save();
        return redirect()->back()->with('success', 'Designer Status Changed Successfully');
    }

}
