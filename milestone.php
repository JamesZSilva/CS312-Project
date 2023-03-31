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
		$data = array();
		$this->template->title = 'Index Page Title';
		$this->template->css = "m1.css";
		$this->template->content = View::forge('milestone1/index',$data);
	}

	public function action_about(){
		$data = array();
		$this->template->title = 'About Page Title';
		$this->template->css = "aboutpage.css";
		$this->template->content = View::forge('milestone1/about',$data);

	}

	public function action_table()
	{
		$data = array();
		$this->template->title = 'Table Page Title';
		$this->template->css = "m1.css";
		$this->template->content = View::forge('milestone1/table',$data);
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
