<?php
 
 namespace App\Http\Controllers\API;
  
 use App\Http\Controllers\Controller;
 use Illuminate\Http\Request;
 use App\Models\ContactUS;
  
 class ContactUSController extends Controller
 {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUS()
    {
        return view('contactus');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactSaveData(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
  
        ContactUS::create($request->all()); 
    
        \Mail::send('contactus',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'user_message' => $request->get('message')
            ), function($message) use ($request)
        {
        $message->from($request->get('email'));
        $message->to('coloursofus05@gmail.com', 'Admin')->subject($request->get('subject'));
        });
    
        return response()->json(['message' => 'Thanks for contacting us!, We\'ll get back to you soon', 'status' => 200]); 
        }
 }