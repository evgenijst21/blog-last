<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index() 
    {
        $feedbacks = Feedback::paginate(20);
        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function filter(Request $request) 
    {
        if (!empty($request->calendar_from) and empty($request->calendar_before)) {
            $feedbacks = Feedback::where('created_at', '>=', $request->calendar_from . ' 00:00:00')->get();
        }
        elseif (empty($request->calendar_from) and !empty($request->calendar_before)){
            $feedbacks = Feedback::where('created_at', '<=', $request->calendar_before . ' 23:59:59')->get();
        }
        else {
        $feedbacks = Feedback::where('created_at', '>=', $request->calendar_from . ' 00:00:00')
        ->where('created_at', '<=', $request->calendar_before . ' 23:59:59')->get();
        }

        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function store(FeedbackRequest $request) 
    {
        $feedback = new Feedback();
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->theme = $request->theme;
        $feedback->text = $request->text;
        $feedback->ip = $_SERVER['REMOTE_ADDR'];
        $feedback->save();
        return back()->with('success', 'Заявка успешно отправленна');
    }

    public function destroy(Feedback $feedback) 
    {
        $feedback->delete();
        return redirect()
            ->route('admin.feedback.index')
            ->with('success', 'Заявка была успешно удалена');
    }

    public function show($id) 
    {
        $feedback = Feedback::find($id);

        return view('admin.feedback.single', compact('feedback'));
    }
}
