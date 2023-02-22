<?php
require_once('simple_html_dom.php'); // add library file
$gSearchData = $_POST['gsearch']; //Using POST
$request = array(
    'http' => array(
        'header' => array("Content-Type: application/x-www-form-urlencoded"),
        'method' => 'POST',
        'content' => http_build_query(array(
            'gsearch' => $gSearchData
        )),
    )
);
$context = stream_context_create($request);
$html = file_get_html("https://www.bb.org.bd/en/index.php/investfacility/prizebond", true, $context);
$table = $html->find('table', 0);
$rowData = array();
foreach ($table->find('tr') as $row) {
    $data = array();     // initialize array to store the cell data from each row
    foreach ($row->find('td') as $cell) {
        $data[] = $cell->plaintext;  // push the cell's text to the array
    }
    $rowData[] = $data;
}
$tdArray = array();
$thArray = array();
$i = 0;
foreach ($rowData as $row => $tr) {
    foreach ($tr as $td) {
        $i++;
        if ($i > 5) {
            $tdArray[] = $td;
        } else {
            $thArray[] = $td;
        }
    }
}
$doc = new DOMDocument();
libxml_use_internal_errors(true);
$doc->loadHTML($html); // loads html
$xpath = new DOMXPath($doc);
// $nodelist = $xpath->query("//img");
$nodelist = $xpath->query('//table/tr/td/img'); // find image
$node = $nodelist->item(0);  // gets the 1st image
$value = $node->attributes->getNamedItem('src')->nodeValue;
$value = str_replace("../", "", $value);
$imgValue = "https://www.bb.org.bd/" . $value; // modify image path adding url of server location
array_push($tdArray, $imgValue);
// print_r($tdArray);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap Table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style>
        .table>tbody>tr>td {
            vertical-align: middle
        }
        .height {
            height: 50vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <?php
                            $tr = 0;
                            foreach ($thArray as $rowTh => $value) {
                                $tr++;
                            ?>
                                <th><?php echo $value; ?></th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $tr = 0;
                            foreach ($tdArray as $rowTd => $value) {
                                $tr++;
                                if ($tr > 5) {
                                    echo '<td><img src="' . $value . '" alt="" border=3 height=100 width=350></img></td>';
                                } elseif ($tr == 5) {
                                    continue;
                                } else {
                                    echo '<td>' . $value . '</td>';
                                }
                            ?>
                            <?php
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>