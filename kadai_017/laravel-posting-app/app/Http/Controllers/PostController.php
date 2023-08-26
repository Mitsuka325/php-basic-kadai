<?php
// 住所みたいなもの
namespace App\Http\Controllers;
// Httpのリクエストクラスを使うよ
// あらかじめ宣言しておくことで、ファイル内ではRequestと記述するだけで呼び出すことができる
// なおRequestクラスはLaravelがあらかじめ用意してくれているクラスで、フォームから送信された内容
// などを取得してくれる。これを使うのはstoreアクションやupdateアクション。
use Illuminate\Http\Request;

//storeアクションではデータベースとやり取りするためにPostモデルを使うのでuse宣言をする
use App\Models\Post;

class PostController extends Controller
{
    //一覧ページ
    public function index()
    {
        $posts = post::oldest()->get();
        return view('posts.index', compact('posts'));
    }

    // 作成ページ
    public function create()
    {
        return view('posts.create');
    }

    // 作成機能
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:40',
            'content' => 'required|max:200',
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.index')->with('flash_message', '投稿が完了しました。');
    }

    //詳細ページ
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    // 更新ページ
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // 更新機能
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:40',
            'content' => 'required|max:200',
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.show', $post)->with('flash_message', '投稿を編集しました。');
    }

    // 削除機能
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('flash_message', '投稿を削除しました。');
    }
}
