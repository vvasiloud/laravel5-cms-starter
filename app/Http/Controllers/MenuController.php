<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class MenuController extends CrudController{

    public function all($entity){
        parent::all($entity); 

			$this->filter = \DataFilter::source(new \App\Menu);
			$this->filter->add('name', 'Name', 'text');
			$this->filter->submit('search');
			$this->filter->reset('reset');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('id', 'ID');
			$this->grid->add('name', 'name');
			$this->grid->add('url_key', 'Url key');
			$this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

			$this->edit = \DataEdit::source(new \App\Menu());

			$this->edit->label('Edit Menu Item');

			$this->edit->add('name', 'Name', 'text')->rule('required');
			$this->edit->add('url_key', 'Url key', 'text')->rule('required');
       
        return $this->returnEditView();
    }    
}
