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
		$data = array();
		$this->template->title = 'Index Page Title';
		$this->template->css = "m1.css";
		$this->template->content = View::forge('milestone/Index',$data);
	}

	public function action_about(){
		$data = array();
		$this->template->title = 'About Page Title';
		$this->template->css = "aboutpage.css";
		$this->template->content = View::forge('milestone/about',$data);

	}

	public function action_table()
	{
		$data = array();
		$this->template->title = 'Table Page Title';
		$this->template->css = "m1.css";
		$this->template->content = View::forge('milestone/table',$data);
	}

	public function action_rowfunction()
{
    $data = array();
    $this->template->title = 'RowFunction Page Title';
    $this->template->css = "table.css";

    if (Input::method() == 'POST')
    {
        $row_value = Input::post('rowvalue');
        $color_value = Input::post('colorvalue');

        // Create color table
        $colors = array('red', 'green', 'blue', 'yellow', 'orange', 'purple', 'pink', 'brown', 'gray', 'teal');
        $color_table = '<table class="color-table" style="border-collapse: collapse; border: 1px solid black; width: 80%;">';
        $color_selects = array();
        for ($i = 0; $i < $color_value; $i++) {
            $color = $colors[$i % count($colors)];
            $color_selects[] = $color;
            $color_table .= '<tr>';
            $color_table .= '<td style="border: 1px solid black; width: 20%;"><select class="color-dropdown" data-index="' . $i . '">';
            foreach ($colors as $c) {
                $selected = $c == $color ? 'selected' : '';
                $color_table .= '<option value="' . $c . '" ' . $selected . '>' . ucfirst($c) . '</option>';
            }
            $color_table .= '</select></td>';
            $color_table .= '<td class="color-cell" style="border: 1px solid black; width: 80%; background-color:' . $color . ';">&nbsp;</td>';
            $color_table .= '</tr>';
        }
        $color_table .= '</table>';

        // Create normal table
        $normal_table = '<table class="normal-table" style="border-collapse: collapse; border: 1px solid black; width: 50%;">';
        for ($i = 1; $i <= $row_value+1; $i++) {
            $normal_table .= '<tr>';
            for ($j = 1; $j <= $row_value+1; $j++) {
                if ($i == 1 && $j == 1) {
                    $normal_table .= '<td></td>';
                } else if ($i == 1) {
                    $normal_table .= '<td>' . chr($j+63) . '</td>';
                } else if ($j == 1) {
                    $normal_table .= '<td>' . ($i-1) . '</td>';
                } else {
                    $normal_table .= '<td>' . ($i-1)*($j-1) . '</td>';
                }
            }
            $normal_table .= '</tr>';
        }
        $normal_table .= '</table>';

        echo $color_table;
        echo "<br></br>";
        echo '<div style="text-align:center;">'.$normal_table.'</div>';
		echo '<div style="text-align:center;"><button id="print-button">Printable View</button></div>';
		echo '<script>
			document.querySelectorAll(".color-dropdown").forEach(function(dropdown) {
				dropdown.addEventListener("change", function() {
					var colorCell = this.parentNode.nextElementSibling;
					var newColor = this.value;
					if (newColor !== colorCell.style.backgroundColor) {
						colorCell.style.backgroundColor = newColor;
					} else {
						this.value = colorCell.style.backgroundColor;
					}
				});
			});
		</script>';
    }
    $this->template->content = View::forge('milestone/rowfunction', $data);
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
