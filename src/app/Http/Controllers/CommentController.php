<?php

namespace App\Http\Controllers;

use App\Events\AddCommentEvent;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    public function store(CommentRequest $request): Response
    {
        if (!Gate::allows('create-comment')) {
            abort(403);
        }

        $comment = new Comment();
        $comment->fill($request->all());
        $comment->user_id = Auth::user()->id;
        $comment->save();

        event(new AddCommentEvent());

        return response()->json($comment);
    }

    public function index(): Response
    {
        $data = Comment::with('answer')->paginate(10);
        return response()->json($data);
    }
}
