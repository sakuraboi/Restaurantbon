<?php
class htmlElements{
        public function createTable($result){
        $tableheader = false;
        $html = "";
        $html .="<table style='border: 1px solid black'>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            if ($tableheader == false) {
                $html .= "<tr>";
                foreach ($row as $key => $value) {
                    $html .= "<th style='border: 1px solid black'>$key</th>";
                }
                $html .="</tr>";
                $tableheader = true;
            }
            $html .= "<tr>";    
            foreach ($row as $key => $value) {
                if($key == "product_price"){
                    $html .= "<td style='border: 1px solid black'>" . str_replace('.', ',', $value) . "</td>";
                } else {
                    $html .= "<td style='border: 1px solid black'>$value</td>";
                }

            }
            $html .="<td style='border: 1px solid black'><button><i class='fas fa-book-open'> Read</i></button></td>";//onclick select from * where id =. $id
            $html .="<td style='border: 1px solid black'><button><i class='fas fa-pencil-alt'> Update</i></button></td>";
            $html .="<td style='border: 1px solid black'><button><i class='fas fa-times'> Delete</i></button></td>";
            $html .="</tr>";
        }
        $html .= "</table>";
        return $html;
        }
    }
?>

