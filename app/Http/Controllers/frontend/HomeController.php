<?php

namespace App\Http\Controllers\frontend;
// namespace Illuminate\Foundation\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product,Category,Attribute, Customer};
use Sentinel;
use Reminder;
use Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function getIndex(){
        $data['product_new']=Product::orderby('created_at','DESC')->paginate(9);


        $data['category']=category::all();
        $data['attrs']=attribute::all();
        return view('frontend.index',$data);
    }
    public function Categories($slug){
        $category=category::where('slug',$slug)->first();
        $product= Product::where('status',1)->where('category_id',$category->id)->paginate(9);
        return view('frontend.categories',compact('category', 'product'));
    }
    public function Register(){
        $data['category']=category::all();
        return view('frontend.register',$data);
    }
    public function Checkout(){
        $data['category']=category::all();
        return view('frontend.checkout',$data);
    }
    public function CheckLog(){
        $data['category']=category::all();
        return view('frontend.login',$data);
    }
    public function reset_pass(){
        return view('frontend.reset_pass');
    }
    public function sendCodeResetPass(Request $request){
        $user = DB::table('customer')->where('email', '=', $request->email)
            ->first();
        //Check if the user exists
        if(!$user){
            return back()->with('Vui lòng kiểm tra lại email');
        }

        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => str_random(60),
            'created_at' => Carbon::now()
        ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
    }
    // public function sendCodeResetPass(Request $req){
    //     $email =$req->email;
    //     $user = Customer::whereEmail('email',$email)->first();
    //     if(!$user){
    //         return back()->with('Vui lòng kiểm tra lại email');
    //     }
    //     $user= Sentinel::findById($user->id);
    //     $reminder = Reminder::exists($user)? : Reminder::create($user);
    //     $this->sendMail($user, $reminder->code);
    //     return redirect()->back();
    // }
    // public function sendMail($user, $code){
    //     Mail::send('frontend.getpass',
    //         ['user'=>$user, 'code'=>$code],
    //         function($message) use ($user){
    //             $message->to($user->email);
    //             $message->subject("$user->name, reset your password.");
    //         }
    // );
    // }
    public function Cart(){
        $data['category']=category::all();
        return view('frontend.cart',$data);
    }
}
