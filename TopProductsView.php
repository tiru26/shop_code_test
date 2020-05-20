<?php

namespace Arden;

class TopProductsView extends View
{
    public function __construct($data = null)
    {
        if($data) {
            $this->data = $data;
        }
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function render() {
        // Render opening times
        echo "<table>";
        foreach($this->data as $key => $val) {
            if($key == 'products') {

                foreach($val as $pro) {
                    echo '<tr> <td>';

                    foreach($this->data['images'] as $d => $img) {
                        if($d == $pro) {
                            echo $pro ."<br/>". "<img width='50px' height= '30px' src='".$img."'/>";
                        }
                    }

                    echo '</td> </tr>';
                }

            }
        }
        echo "</table>";
    }
}