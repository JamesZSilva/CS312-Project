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
static $psize = 0;
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
        $this->template->content = View::forge('milestone/Index', $data);
    }
    public function action_about()
    {
        $data = array();
        $this->template->title = 'About Page Title';
        $this->template->css = "m1.css";
        $this->template->content = View::forge('milestone/about', $data);
    }
    public function action_table()
    {
        $data = array();
        $this->template->title = 'Table Page Title';
        $this->template->css = "m1.css";
        $this->template->content = View::forge('milestone/table', $data);
    }

   

    public function action_addcolor()
    {
        $data = array();
        $this->template->css = "m1.css";
        $this->template->content = View::forge('milestone/table', $data);

        // define database credentials
        $host = "sql9.freesqldatabase.com";
        $user = "sql9616240";
        $pass = "DJrWkD4P75";
        $dbname = "sql9616240";

        // create connection
        $conn = new mysqli($host, $user, $pass, $dbname);

        // check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // check if form has been submitted
        if (Input::method() == "POST") {
            // get color name and hex value from form
            $color_name = trim(Input::post("name"));
            $hex_value = trim(Input::post("hex_value"));

            // check if inputs are empty
            if (empty($color_name) || empty($hex_value)) {
                Session::set_flash('error', 'Color name and hex value cannot be empty');
            } else {
                // insert color into database
                $sql = "INSERT INTO colors (name, hex_value) VALUES ('$color_name', '$hex_value')";
                if ($conn->query($sql) === TRUE) {
                    Session::set_flash('success', 'Color added to database');
                } else {
                    Session::set_flash('error', 'Error: ' . $sql . '<br>' . $conn->error);
                }
            }
        }

        // close connection
        $conn->close();

        // add data to array to be passed to view
        $data['conn'] = $conn;

        // display form to user with data
        //return Response::forge(View::forge('milestone/table', $data));
    }

    public function action_rowfunction()
    {
        $data = array();
        $this->template->title = 'RowFunction Page Title';
        $this->template->css = "m1.css";
        $this->template->content = View::forge('milestone/table', $data);
        if (Input::method() == 'POST') {
            $row_value = Input::post('rowvalue');
            $color_value = Input::post('colorvalue');
            // $colors = array('red', 'green', 'blue', 'yellow', 'orange', 'purple', 'pink', 'brown', 'gray', 'teal');
            $psize = $color_value;

            $host = "sql9.freesqldatabase.com";
            $user = "sql9616240";
            $pass = "DJrWkD4P75";
            $dbname = "sql9616240";

            // Connect to the database
            $conn = mysqli_connect($host, $user, $pass, $dbname);

            if (!$conn) {
                die("Could not connect to database: " . mysqli_error());
            }

            // Execute a SQL query
            $sql = "SELECT name, hex_value FROM colors";
            $result = mysqli_query($conn, $sql);

            $colors = array(); // Initialize an empty array to store the colors

            if (mysqli_num_rows($result) > 0) {
                // Loop through the results and add each color to the array
                while ($row = mysqli_fetch_assoc($result)) {
                    $color = array(
                        "name" => $row["name"],
                        "hex_value" => $row["hex_value"]
                    );
                    array_push($colors, $color);
                }
            }

            // Close the database connection
            mysqli_close($conn);

            $color_table = '<table class="color-table" style="border-collapse: collapse; border: 1px solid black; width: 80%;">';
            $color_selects = array();
            for ($i = 0; $i < $color_value; $i++) {
                $color = $colors[$i % count($colors)];
                $color_selects[] = $color;
                $currId = 'color' . $i;
                $color_table .= '<tr>';
                $color_table .= '<td style="border: 1px solid black; width: 20%;"><select class="color-dropdown" data-index="' . $i . '">';
                foreach ($colors as $c) {
                    $selected = $c['name'] == $color['name'] ? 'selected' : '';
                    $color_table .= '<option value="' . $c['hex_value'] . '" ' . $selected . '>' . ucfirst($c['name']) . '</option>';
                }
                $color_table .= '</select></td>';
                $color_table .= '<td id="' . $currId . '" class="' . $currId . '" style="border: 1px solid black; width: 80%; background-color:' . $color['hex_value'] . ';">';
                $color_table .= '<div style="text-align: center; float: left; width: 20%;">Click Here</div>';
                $color_table .= '</td>';
                $color_table .= '</tr>';
            }
            $color_table .= '</table>';

            echo $color_table;

            // Create normal table
            $normal_table = '<table class="normal-table" style="border-collapse: collapse; border: 1px solid black; width: 50%;">';
            for ($i = 1; $i <= $row_value + 1; $i++) {
                $normal_table .= '<tr>';
                for ($j = 1; $j <= $row_value + 1; $j++) {
                    if ($i == 1 && $j == 1) {
                        $normal_table .= '<td></td>';
                    } else if ($i == 1) {
                        $normal_table .= '<td>' . chr($j + 63) . '</td>';
                    } else if ($j == 1) {
                        $normal_table .= '<td>' . ($i - 1) . '</td>';
                    } else {
                        $normal_table .= '<td id="cell' . $i . ',' . $j . '" class="myCell">' . chr($j + 63) . ',' . ($i - 1) . '</td>';
                    }
                }
                $normal_table .= '</tr>';
            }
            $normal_table .= '</table>';

            $normal_table .= '<script>
        var colorCells = document.getElementsByClassName("color-table")[0].getElementsByTagName("td");
        var selectedColor = "red";
        var selectedCell = "";
        var colorDropdowns = document.querySelectorAll(".color-dropdown");
        var colorDisplay = document.createElement("div");
        colorDisplay.style.position = "fixed";
        colorDisplay.style.top = "10px";
        colorDisplay.style.right = "10px";
        colorDisplay.style.width = "30px";
        colorDisplay.style.height = "30px";
        colorDisplay.style.border = "1px solid black";
        colorDisplay.style.backgroundColor = selectedColor;
        document.body.appendChild(colorDisplay);
       
        for (var i = 0; i < colorCells.length; i++) {
            colorCells[i].addEventListener("click", function() {
                selectedColor = this.style.backgroundColor;
                colorDisplay.style.backgroundColor = selectedColor;
            });
        }
       
       function updateSelectedCell(newColor) {
           var colorTable = document.getElementsByClassName("color-table")[0];
           selectedCell = colorTable.querySelector("#color-table-cell-" + newColor);
           if (!selectedCell) {
               selectedCell = colorTable.querySelector(".empty");
           }
       }
       
       var normalCells = document.getElementsByClassName("normal-table")[0].getElementsByTagName("td");
       for (var i = 0; i < normalCells.length; i++) {
           normalCells[i].addEventListener("click", function() {
               if (this.classList.contains("myCell")) {
                   this.style.backgroundColor = selectedColor;
                   updateSelectedCell(selectedColor);
               }
           });
       }
       
       function componentToHex(c) {
            var hex = c.toString(16);
            return hex.length == 1 ? "0" + hex : hex;
        }
        
        function rgbToHex(r, g, b) {
            return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
        }
       colorDropdowns.forEach(function(dropdown) {
            dropdown.addEventListener("change", function() {
                var newColor = this.value;
                var oldColor = this.parentNode.nextElementSibling.style.backgroundColor;
                var colorCell = this.parentNode.nextElementSibling;
        
                var found = false;
                var colorCells = document.getElementsByClassName("color-table")[0].getElementsByTagName("td");
                for (var i = 0; i < colorCells.length; i++) {
                    var currColor = colorCells[i].style.backgroundColor;
                    let rgbArray = currColor.substring(4, currColor.length-1).split(", ");
                    let red = parseInt(rgbArray[0]);
                    let green = parseInt(rgbArray[1]);
                    let blue = parseInt(rgbArray[2]);
                    var compare = rgbToHex(red,green,blue);
                    if (compare.toUpperCase() === newColor.toUpperCase()) {
                        found = true;
                        break;
                      }
                }
        
                if (!found) {
                    colorCell.style.backgroundColor = newColor;
                    colorCell.dataset.prevIndex = this.selectedIndex;
                  } else {
                    alert("This color is already in the table.");
                    this.selectedIndex = colorCell.dataset.prevIndex;
                  }
            });
        });
    
        function changeColor() {
            var selectedColor = document.getElementById("colorList").value;
            var selectedCell = document.getElementById("cellList");
            console.log(selectedCell);
            if (selectedCell !== null) {
                selectedCell.textContent = selectedColor;
            } else {
                alert("Please select a cell.");
            }
        }
        function display() {
            print();
        }
        
        
        function resetColor() {
            colorDisplay.style.backgroundColor = "";
            selectedColor = "";
        }
        
       </script>';

            echo "<br></br>";
            echo '<button onclick="resetColor()">Erase Mode</button>';
            echo "<br></br>";
            echo '<div style="text-align:center;">' . $normal_table . '</div>';
            echo "<br></br>";
            echo '<div style="text-align:center;"><button onclick="display()">Click to Print</button></div>';
            echo "<br></br>";
        }
        $this->template->content = View::forge('milestone/rowfunction', $data);
        //$this->template->content = View::forge('milestone/addcolor', $data);

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
