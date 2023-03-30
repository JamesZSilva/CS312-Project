<?php


/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_milestone extends Controller_Template
{
	public $direction = "";
	public $direction2 = "";
	public $direction3 = "";
	public function post_rowfunction()
   {
       $rowvalue = Input::post('myvalue');
	   //do something
   }

   public function post_colorfunction()
   {
       $colorvalue = Input::post('myvalue');
	   //do something
   }
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$dir = Input::get('direction');
		$data = array();
		$this->template->title = 'East Page Title';
		$this->template->css = "west.css";
		$this->template->content = View::forge('milestone1/index',$data);
		$this->template->direction = "?direction=east";
		$this->template->direction2 = "?direction=east";
		$this->template->direction3 = "?direction=east";
	}

	public function action_one(){
		$dir = Input::get('direction');
		$data = array();
		$this->template->title = 'East Page Title';
		$this->template->css = "aboutpage.css";
		$this->template->content = View::forge('milestone1/about',$data);
		$this->template->direction = "?direction=east";
		$this->template->direction2 = "?direction=east";
		$this->template->direction3 = "?direction=east";

	}

	public function action_two()
	{
		$dir = Input::get('direction');
		$data = array();
		$this->template->title = 'East Page Title';
		$this->template->css = "west.css";
		$this->template->content = View::forge('milestone1/table',$data);
		$this->template->direction = "?direction=east";
		$this->template->direction2 = "?direction=east";
		$this->template->direction3 = "?direction=east";
	}


	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
