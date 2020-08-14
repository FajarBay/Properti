<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function user_list(){
        $pesan = Message::where('to', Auth::user()->id)->orderBy('id', 'desc')->groupBy('from');
        $ke = $pesan->pluck('from');

        $pengirim = User::whereIn('id', $ke->all())->where('admin', '0')->get();

        // $pengirim = User::latest()->where('id', '!=', Auth::user()->id)->get();
        if(\Request::ajax()){
        return response()->json($pengirim, 200);
        }
        return abort(404);
    }

    public function admin_list(){
        // $pesan = Message::where('from', Auth::user()->id)->groupBy('to');
        // $ke = $pesan->pluck('to');

        $pengirim = User::where('admin', '1')->get();

        if(\Request::ajax()){
        return response()->json($pengirim, 200);
        }
        return abort(404);
    }

    public function user_message($id=null){
        // if(!\Request::ajax()){
        //     return abort(404);
        //     }
        // $message = Message::where('to', $id)->get();
        $user = User::findOrFail($id);
        $message = Message::where(function($q) use($id){
            $q->where('from', Auth::user()->id);
            $q->where('to', $id);
            $q->where('type', 0);
        })->orWhere(function($q) use($id){
            $q->where('from', $id);
            $q->where('to', Auth::user()->id);
            $q->where('type', 1);
        })->with('user')->get();
        return response()->json([
            'message' => $message,
            'user' => $user,
        ]);
    }

    public function send_message(Request $request){
        if(!$request->ajax()){
            abort(404);
        }
        $messages = Message::create([
            'message' => $request->message,
            'from' => auth()->user()->id,
            'to' => $request->user_id,
            'type' => 0
        ]);
        $messages = Message::create([
            'message' => $request->message,
            'from' => auth()->user()->id,
            'to' => $request->user_id,
            'type' => 1
        ]);
        return response()->json($messages, 201);
    }

    public function pesan_admin(Request $request){

            $messages = new Message();
            $messages1 = new Message();
            $messages99 = new Message();
    
            $messages->from = $request->from;
            $messages->to = $request->to;
            $messages->message = $request->message;
            $messages->type = 0;
    
            $messages1->from = $request->from;
            $messages1->to = $request->to;
            $messages1->message = $request->message;
            $messages1->type = 1;
    
            $messages99->from = $request->to;
            $messages99->to = $request->from;
            $messages99->message = $request->message;
            $messages99->type = 99;
    
            $messages->save();
            $messages1->save();
            $messages99->save();
    
            return redirect('/adminChat');
    }

    public function pesan_pertama(Request $request){

        $messages = new Message();
        $messages1 = new Message();
        $messages99 = new Message();

        $messages->from = $request->from;
        $messages->to = $request->to;
        $messages->message = $request->message;
        $messages->type = 0;

        $messages1->from = $request->from;
        $messages1->to = $request->to;
        $messages1->message = $request->message;
        $messages1->type = 1;

        $messages99->from = $request->to;
        $messages99->to = $request->from;
        $messages99->message = $request->message;
        $messages99->type = 99;

        $messages->save();
        $messages1->save();
        $messages99->save();

        return redirect('/chatCustomer');
}
}
