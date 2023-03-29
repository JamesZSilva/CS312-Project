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
		$this->template->css = "east.css";
		$this->template->content = View::forge('milestone1/index',$data);
		$this->template->direction = "?direction=east";
		$this->template->direction2 = "?direction=east";
		$this->template->direction3 = "?direction=east";

	}

	public function action_one(){
		$data = array();
		$dir = Input::get('direction');
		if($dir == "east"){
		$this->template->title = 'East Page Title';
		$this->template->css = "east.css";
		$this->template->content = View::forge('eastwest/one',$data);
		$this->template->direction = "?direction=east";
		$this->template->direction2 = "?direction=east";
		$this->template->direction3 = "?direction=east";
		}
		elseif($dir == "west"){
		$this->template->title = 'West Page Title';
		$this->template->css = "west.css";
		$this->template->content = View::forge('eastwest/one',$data);
		$this->template->direction = "?direction=west";
		$this->template->direction2 = "?direction=west";
		$this->template->direction3 = "?direction=west";
		}

	}

	public function action_two(){
		$dir = Input::get('direction');	
		$data = array();
		if($dir == "east"){
			$this->template->title = 'East Page Title';
			$this->template->css = "east.css";
			$this->template->content = View::forge('eastwest/two',$data);
			$this->template->direction = "?direction=east";
			$this->template->direction2 = "?direction=east";
			$this->template->direction3 = "?direction=east";
			}
			elseif ($dir == "west"){
			$this->template->title = 'West Page Title';
			$this->template->css = "west.css";
			$this->template->content = View::forge('eastwest/two',$data);
			$this->template->direction = "?direction=west";
			$this->template->direction2 = "?direction=west";
			$this->template->direction3 = "?direction=west";
			}

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
