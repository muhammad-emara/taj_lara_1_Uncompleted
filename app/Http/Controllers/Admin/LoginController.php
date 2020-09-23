<?php
    
    namespace App\Http\Controllers\Admin;
    
    use App\Http\Controllers\Controller;
    use App\Http\Requests\LoginRequest;
    use App\Models\Admin;
    use Illuminate\Http\Request;
    
    class LoginController extends Controller
    {
        public function getLogin()
        {
            
            return view('admin.auth.login');
        }
        
        public function save()
        {
            
            $admin = new App\Models\Admin();
            $admin->name = "Muahammad Emara";
            $admin->email = "muhammad.emara@gmail.com";
            $admin->password = bcrypt("Super@123");
            $admin->save();
            
        }
        
        public function login(LoginRequest $request)
        {//validation is by using request LoginRequest
            
            $remember_me = $request->has('remember_me') ? true : false;
    
            /**
             * @var $request loginRequest
             *  check the validation of the guard
             */
            if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
                // notify()->success('تم الدخول بنجاح  ');
                return redirect()->route('admin.dashboard');
            }
            // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
            //do not write it errors just error as laravel use errors keyword
            return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
        }
    }
