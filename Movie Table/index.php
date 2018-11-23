
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>php Tableeee</title>


	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="container">

	<div class="page-header">
		<h1 class="text-muted">Tableeee</h1>
	</div>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Gross</th>
            </tr>
        </thead>
        <tbody>
    <?php

    $data = [
        [
            "title" => "The World's End",
            "genre" => "Sci-fi",
            "year"  => 2013,
            "gross" => 26004851
        ],
        [
            "title" => "Scott Pilgrim vs. the World",
            "genre" => "Sadness",
            "year"  => 2010,
            "gross" => 31524275
        ],
        [
            "title" => "Hot Fuzz",
            "genre" => "Buddy Cop",
            "year"  => 2007,
            "gross" => 23637265
        ],
        [
            "title" => "Shaun of the Dead",
            "genre" => "Zombie",
            "year"  => 2007,
            "gross" => 13542874
        ],

    ];



        foreach ($data as $key => $value) {


            if ($key % 2==0) { echo  '   <tr class="odd">';
            }
                else {
                    echo '<tr>';
                }
            echo '  <td>' . $value['title'] . '</td>
                    <td>' . $value['genre'] . '</td>
                    <td>' . $value['year'] . '</td>
                    <td>&#36; ' . number_format($value['gross']) . '</td>
                  </tr>
                </tbody>';


        }
        $sum = 0;
        for ($i=0; $i < count($data); $i++){
            $sum=$sum+$data[$i]['gross'];

        }
    echo '<tfoot>
              
                 <td></td>
                 <td></td>
                 <td></td>
                 <td>&#36; '.number_format($sum).'</td>
              
          </tfoot>';
        ?>

    </table>
</body>
</html>