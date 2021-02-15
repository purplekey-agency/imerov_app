<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Send message from questionare.
     * 
     * @param Request $request
     * 
     * @return void
     */
    public function sendQuestionareMessage(Request $request){

        $message = new Message([
            'user_id' => Auth::user()->id,
            'category' => 1,
            'message' => $request->message_body,
            'user_channel' => Auth::user()->id,
            'user_read' => true,
            'admin_read' => false
        ]);
        $message->save();
        return redirect()->back();
    }

    /**
     * Response to message from questionare.
     * 
     * @param Request $request
     * 
     * @return void
     */
    public function responseQuestionareMessage(Request $request){

        $message = new Message([
            'user_id' => Auth::user()->id,
            'category' => 1,
            'message' => $request->message_body,
            'user_channel' => (int) $request->user,
            'user_read' => false,
            'admin_read' => true
        ]);
        $message->save();
        return redirect()->back();
    }

    /**
     * Send message from body measure.
     * 
     * @param Request $request
     * 
     * @return void
     */
    public function sendBodyMeasureMessage(Request $request){
        $message = new Message([
            'user_id' => Auth::user()->id,
            'category' => 2,
            'message' => $request->message_body,
            'user_channel' => Auth::user()->id,
            'user_read' => true,
            'admin_read' => false
        ]);
        $message->save();
        return redirect()->back();
    }

    /**
     * Respond from body measure.
     * 
     * @param Request $request
     * 
     * @return void
     */
    public function responseBodyMeasureMessage(Request $request){
        $message = new Message([
            'user_id' => Auth::user()->id,
            'category' => 2,
            'message' => $request->message_body,
            'user_channel' => (int) $request->user,
            'user_read' => false,
            'admin_read' => true
        ]);
        $message->save();
        return redirect()->back();
    }

    /**
     * Send from exercise.
     * 
     * @param Request $request
     * 
     * @return void
     */
    public function sendExerciseMessage(Request $request){
        $message = new Message([
            'user_id' => Auth::user()->id,
            'category' => 3,
            'message' => $request->message_body,
            'user_channel' => Auth::user()->id,
            'user_read' => true,
            'admin_read' => false
        ]);
        $message->save();
        return redirect()->back();
    }

    /**
     * Respond from exercise.
     * 
     * @param Request $request
     * 
     * @return void
     */
    public function responseExcerciseMessage(Request $request){
        $message = new Message([
            'user_id' => Auth::user()->id,
            'category' => 3,
            'message' => $request->message_body,
            'user_channel' => (int) $request->user,
            'user_read' => false,
            'admin_read' => true
        ]);
        $message->save();
        return redirect()->back();
    }

    /**
     * Send dietplan message.
     * 
     * @param Request $request
     * 
     * @return void
     */
    public function sendDietplanMessage(Request $request){
        $message = new Message([
            'user_id' => Auth::user()->id,
            'category' => 4,
            'message' => $request->message_body,
            'user_channel' => Auth::user()->id,
            'user_read' => true,
            'admin_read' => false
        ]);
        $message->save();
        return redirect()->back();
    }


    /**
     * Response from diet plan message.
     * 
     * @param Request $request
     * 
     * @return void
     */
    public function responseDietplanMessage(Request $request){
        $message = new Message([
            'user_id' => Auth::user()->id,
            'category' => 4,
            'message' => $request->message_body,
            'user_channel' => (int) $request->user,
            'user_read' => false,
            'admin_read' => true
        ]);
        $message->save();
        return redirect()->back();
    }


    /**
     * Show all messages from user and category.
     */
    public function showReplyToMessages(Request $request, string $category, string $user){
        $messages = Message::where('user_channel', $user)->where('category', $category)->get();
        return view('admin.reply')->with(['messages' => $messages, 'category' => $category, 'user' => $user, 'title' => $messages->first()->getCategory()]);
    }


    /**
     * Reply to message in messages page.
     */
    public function sendReply(Request $request, string $category, string $user){
        $message = new Message([
            'user_id' => Auth::user()->id,
            'category' => (int) $category,
            'message' => $request->message_body,
            'user_channel' => (int) $user,
            'user_read' => false,
            'admin_read' => true
        ]);
        $message->save();
        return redirect()->route('showReply', ['category' => $category, 'user' => $user]);
    }

    /**
     * Show all messages from admin and category.
     */
    public function showUserReplyToMessages(Request $request, string $category){
        $messages = Message::where('user_channel', Auth::user()->id)->where('category', $category)->get();
        return view('user.reply')->with(['messages' => $messages, 'category' => $category, 'user' => Auth::user(), 'title' => $messages->first()->getCategory()]);
    }


    /**
     * Reply to message to admin in messages page.
     */
    public function sendReplyUser(Request $request, string $category){
        $message = new Message([
            'user_id' => Auth::user()->id,
            'category' => (int) $category,
            'message' => $request->message_body,
            'user_channel' => (int) Auth::user()->id,
            'user_read' => true,
            'admin_read' => false
        ]);
        $message->save();
        return redirect()->route('showReplyUser', ['category' => $category]);
    }
}
