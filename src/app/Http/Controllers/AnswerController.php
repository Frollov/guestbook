<?php

namespace App\Http\Controllers;

use App\Events\AddAnswerEvent;
use App\Http\Requests\AnswerRequest;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AnswerController extends Controller
{
    public function store(AnswerRequest $request) {
        if (!Gate::allows('create-answer')) {
            abort(403);
        }

        $userId = Auth::id();
        $comment = new Answer();
        $comment->fill($request->all());
        $comment->user_id = $userId;
        $comment->save();

        event(new AddAnswerEvent($userId));

        return response()->json($comment);
    }
}
