<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap Table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <style>
        .table>tbody>tr>td {
            vertical-align: middle
        }

        @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");
        body {
            background-color: #eee;
            font-family: "Poppins", sans-serif;
            font-weight: 300;
        }
        .height {
            height: 100vh;
        }
        .search {
            position: relative;
            box-shadow: 0 0 40px rgba(51, 51, 51, .1);
        }
        .search input {
            height: 60px;
            text-indent: 25px;
            border: 2px solid #d6d4d4;
        }
        .search input:focus {
            box-shadow: none;
            border: 2px solid blue;
        }
        .search .first {
            position: absolute;
            top: 20px;
            left: 16px;
        }
        .search .second {
            position: absolute;
            top: 16px;
            left: 45px;
        }

        .search button {
            position: absolute;
            top: 5px;
            right: 5px;
            height: 50px;
            width: 110px;
            background: blue;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="search">
                <form method="post" action="data.php">
                    <i class="fa fa-search first"></i>
                    <input type="text" name='gsearch' class="form-control" placeholder="Search Bond Number">
                    <button class="btn btn-primary"><i class="fa fa-search second"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>