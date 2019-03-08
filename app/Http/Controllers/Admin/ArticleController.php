<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Chenhua\MarkdownEditor\Facades\MarkdownEditor;
use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
    public function index(){
        return view('admin/article/index')->withArticles(Article::all());
    }

    /**
     * 新增文章页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function create()
    {
        return view('admin/article/create');
    }

    /***
     * 新增文章处理
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\think\response\Redirect
     */
    public function store(Request $request)//依赖注入系统会自动初始化request类
    {
        //数据验证
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',//必填，在atricles表中唯一，最大长度255
            'body' => 'required',//必填
        ]);
        //通过 Artile Model 插入一条数据进articles表
        $article = new Article;//初始化Article对象
        $article->title = $request->get('title');
        $article->body = MarkdownEditor::parse($request->get('body'));
        $article->user_id = $request->user()->id;//获取当前Auth系统中注册的用户ID，并赋值给user_id

        //将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if ($article->save()) {
            return redirect('admin/article');//保存成功，跳转到文章管理页
        } else {
            //保存失败，跳回来路页面，保留用户输入，并给出提示
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    public function edit($id){
        return view('admin.article.edit')->withArticle(Article::find($id));
    }

    public function update(Request $request,$id){

        //数据验证
        $this->validate($request,[
            'title'=>'required|max:255|unique:articles,title,'.$id,
            'description'=>'required',
            'body'=>'required',
        ]);

        //dump(MarkdownEditor::parse($request->body));die;
        //通过Article Model 更新一条数据
        $article = new Article;
        $data['title'] = $request->title;
        $data['body'] = trim($request->body);
        //$data['body'] = MarkdownEditor::parse($request->body);
        $data['description'] = $request->description;

        //更新数据到数据库，判断保存结果，
        if ($article->where("id",$id)->update($data)) {
            return redirect('admin/article');//保存成功，跳转到文章管理页
        } else {
            //保存失败，跳回来路页面，保留用户输入，并给出提示
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    /**
     * 删除文章
     * @param $id
     * @return $this
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
