<?php

namespace App\Http\Controllers\CustomerAuth;
use App\Address;
use App\Customer;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\URL;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = URL::previous();
        $this->middleware('customer.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        session()->flash("fail_register","failed");
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:customers',
            'mobile' => 'required|numeric|unique:customers',
            'address' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Customer
     */
    protected function create(array $data)
    {
        
        $address=new Address;
        $address->name=$data['address'];
        $address->customer_id=$data['address'];
        $address->delivery_id=$data['region_id'];
        $customer=Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
        
        $address->customer_id=$customer->id;
        $address->save();
        session()->forget('fail_register');
        try{
            Mail::to($data['email'])->send(new UserRegistered($data['email'],$data['password']));
            if ((Cart::content()->count()>0)){
                Cart::store($customer->id);
            }
            
            return $customer;
        }
        catch (\Exception $e){
        //   echo $data['email'];
        //   echo $e;
        //   die();
          return $customer;
        }

        
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('customer.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('customer');
    }
}
