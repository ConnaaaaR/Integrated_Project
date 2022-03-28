
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    <!-- Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Page Icon -->
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
    <link rel="icon" href="icon.svg">

    <title>WORLD NEWS | Add New Author</title>
</head>
<body>
    <div class="container">
        <div class="width-12">
            <h1>Add a new author</h1>
            <form method="post" action="addAuthor.php">
                <div>
                    <label>First Name</label><br>
                    <input type="text" name="first_name">
                </div>
                <div>
                    <label>Last Name</label><br>
                    <input type="text" name="last_name">
                </div>
                <div>
                    <label>Link</label><br>
                    <input type="text" name="link">
                </div>
                    <a href="index.php">Cancel</a>
                    <input type="submit">
            </form>
        </div>
    </div>
    

</body>
</html>