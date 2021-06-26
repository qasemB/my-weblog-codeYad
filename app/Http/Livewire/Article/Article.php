<?php

namespace App\Http\Livewire\Article;

use App\Models\Article as ModelsArticle;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Article extends Component
{


    public $article;
    public $comment_text = "";

    public function deleteComment($id)
    {
        Comment::find($id)->delete();
        $this->emit('showAlert', "نظر با موفقیت حذف شد");
    }

    public function addComment()
    {
        $this->validate([
            'comment_text' => 'required | regex:/^[ا-یa-zA-Z0-9 ? : - . ، * ! ]+$/u'
        ]);

        $comment = new Comment;
        $comment->text = $this->comment_text;
        $comment->user_id = Auth::user()->id;
        $comment->article_id = $this->article->id;
        $comment->is_active = 1;
        $comment->parent_id = 0;
        $comment->save();

        $this->comment_text = "";
        $this->emit('showAlert', "نظر با موفقیت ثبت شد");
    }

    public function mount($id)
    {
        $this->article = ModelsArticle::find($id);
    }

    public function render()
    {
        $comments = Comment::where('article_id', $this->article->id)->get();
        return view('livewire.article.article', ['comments' => $comments]);
    }
}
