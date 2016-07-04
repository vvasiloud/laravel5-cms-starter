<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class CommentController extends CrudController{

    public function all($entity){
        parent::all($entity); 

			$this->filter = \DataFilter::source(new \App\Comment);
			$this->filter->add('body', 'Content', 'text');
			$this->filter->submit('search');
			$this->filter->reset('reset');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('id', 'ID');
			$this->grid->add('on_post', 'Post');
			$this->grid->add('from_user', 'User');
			$this->grid->add('content', 'Content');
			$this->grid->add('created_at', 'Created At');
			$this->grid->add('updated_at', 'Updated At');
			$this->addStylesToGrid();

                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);
	
			$this->edit = \DataEdit::source(new \App\Comment());

			$this->edit->label('Edit Comment');

			$this->grid->add('content', 'Content');

			$this->edit->add('content', 'Content', 'redactor')->rule('required');
			$this->edit->add('created_at', 'Created At', 'date');
			$this->edit->add('updated_at', 'Updated At', 'date');


        
       
        return $this->returnEditView();
    }    
}
