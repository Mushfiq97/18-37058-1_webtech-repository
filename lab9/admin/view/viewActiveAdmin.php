
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet" />
   
    <link rel="stylesheet" href="../css/signuprequest.css">
    <title>Document</title>
    <script src="../js/viewActiveAdmin.js"></script>
</head>

<body>

  <h1 style="text-align: center;">View and search active admin</h1>


    <section id="sum-info">


        <div class="search-admin">

                <input class="search-bar" type="text" name="search" id="search" onkeyup="searchAdmin()" placeholder="Search Active Admin By Name ">


        <div id="main-container">
            <div class="grid-container-1">
                <div>
                    <p>Id</p>
                </div>
                <div>
                    <p>Name</p>
                </div>
                <div>
                    <p>Email</p>
                </div>
                <div>
                    <p>Gender</p>
                </div>
                <div>
                    <p>Birth date</p>
                </div>
                

            </div>

        </div>



    </section>
    <script src="../js/viewActiveAdmin.js"></script>
    <script>
        MyAjaxFunc();
    </script>
</body>

</html>