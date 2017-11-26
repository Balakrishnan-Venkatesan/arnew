<?php

class htmlTable {
    static public function tableNew($head,$rows)
    {
        $htmlTable = NULL;
        $htmlTable .= "<table border = 2>";
        foreach ($head as $head1) {
            $htmlTable .= "<th>$head1</th>";
        }
        foreach ($rows as $row) {
            $htmlTable .= "<tr>";
            foreach ($row as $column) {
                $htmlTable .= "<td>$column</td>";
            }
            $htmlTable .= "</tr>";
        }
        $htmlTable .= "</table>";
        echo $htmlTable;
    }
}

?>