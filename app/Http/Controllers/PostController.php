<?php 

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PostController extends CrudController{

    public function all($entity){
        parent::all($entity); 

        $this->filter = \DataFilter::source(new \App\Post);
        $this->filter->add('title', 'Title', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id', 'ID');
        $this->grid->add('author_id', 'Author');
        $this->grid->add('title', 'Title');
        $this->grid->add('content', 'Content');
		$this->grid->add('slug', 'Slug');
		$this->grid->add('active', 'Status');
		$this->grid->add('created_at', 'Created at');
		$this->grid->add('updated_at', 'Updated at');
		
		$this->filter = \DataFilter::source(new \App\Tag);
		$this->grid->add('name', 'Tags', 'tags');
        $this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);
		$updateDate = Carbon::now()->toDateTimeString();

        $this->edit = \DataEdit::source(new \App\Post());

        $this->edit->label('Edit Post');
        $this->edit->add('title', 'Title', 'text')->rule('required');
		$this->edit->add('author_id','Author','select')->insertValue(1)->options(\Serverfireteam\Panel\Admin::lists("email", "id")->all());
		$this->edit->add('slug', 'Slug', 'text')->rule('required');
        $this->edit->add('content', 'Content', 'redactor')->rule('required');
		$this->edit->add('active', 'Status','select')->option('0', 'Inactive')->option('1', 'Active');
		$this->edit->add('image', 'Featured Image', 'Image')->move('uploads/images/');
		$this->edit->add('created_at', 'Created at', 'date')->format('d/m/Y', 'en');
		$this->edit->add('updated_at', 'Updated at', 'date')->format('d/m/Y', 'en');		
		$this->edit->add('tags', 'Tags', 'tags')->options(\App\Tag::lists("name", "id")->all());
       
        return $this->returnEditView();
    }    
	
	public function show($slug){
		$post = Post::where('slug',$slug)->first();
		if(!$post):
		   return redirect('/')->withErrors('requested page not found');
		endif;
		$comments = $post->comment;
		return view('layout.post.content')->withPost($post)->withComment($comments);
	}
}
