<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Posts::paginate(5);
        return view('Dashboard_Admin.postingan.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengambil data tags
        $tags = Tags::all();
        //mengambil data kategori
        $category = Category::all();
        return view('Dashboard_Admin.postingan.create', compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
             'judul' => 'required|min:3',
             'category_id' => 'required',
             'content' => 'required',
             'gambar' => 'required'
        ]);

        //File Upload Gambar
        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $post = Posts::create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => 'public/upload_image/post/'.$new_gambar,
            'slug' => Str::slug($request->judul),
            'users_id' => Auth::id()
        ]);

        //Menambah multiple select ke DB
        $post->tags()->attach($request->tags);

        $gambar->move('public/upload_image/post', $new_gambar);

        return redirect()->back()->with('success', 'Postingan Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $tags = Tags::all();
        $post = Posts::findorfail($id);
        return view('Dashboard_Admin.postingan.edit', compact('post','tags','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
             'judul' => 'required|min:3',
             'category_id' => 'required',
             'content' => 'required'
        ]);

        $post = Posts::findorfail($id);

        //Kondisi Apabila Gambar diupdate atau dirubah
        if($request->has('gambar')){
            //File Upload Gambar
            $gambar = $request->gambar;
            //membuat nama gambar jadi unik
            $new_gambar = time().$gambar->getClientOriginalName();
            //Proses pemindahan gambar ke folder
            $gambar->move('public/upload_image/post', $new_gambar);
            $data_post = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'gambar' => 'public/upload_image/post/'.$new_gambar,
                'slug' => Str::slug($request->judul)
            ];
        }else{
            $data_post = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'slug' => Str::slug($request->judul)
            ];
        }
        

        //Mengupdate data multiple select ke DB menggunakan sync
        $post->tags()->sync($request->tags);
        $post->update($data_post);

        return redirect()->route('post.index')->with('success', 'Postingan Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findorfail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Postingan Berhasil di Hapus');
    }

    //Function Soft Delete
    public function tampilkan_post_terhapus(){
        $post = Posts::onlyTrashed()->paginate(5);
        return view('Dashboard_Admin.postingan.post_hapus', compact('post'));
    }

    //Function Restore Post
    public function restore_post($id){
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->back()->with('success', 'Postingan berhasil di Restore');
    }

    //Function Hapus Permanen
    public function hapus_permanen($id){
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        return redirect()->back()->with('success', 'Postingan berhasil di Hapus Permanen');
    }
}
