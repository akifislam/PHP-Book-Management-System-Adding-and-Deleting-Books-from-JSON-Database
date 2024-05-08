<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Book Table</title>
</head>
<body>
    <h1>Add a New Book to My Library</h1>

    <form method="post">
        <input type="text" name="title", placeholder="Book Title">
        <input type="text" name="author", placeholder="Author">
        <input type="number" name="pages", placeholder="Total No. of Pages">
        <button type="submit" name="addSubmit" class="btn btn-primary">Submit</button>
    </form>

    <h1>Delete a Book from My Library</h1>
    <form method="post">
        <input type="number" name="serial", placeholder="Enter the # to Delete">
        <button type="submit" name="deleteSubmit" class="btn btn-primary">Submit</button>
    </form>


    

    <table class="table">
        
        <?php
            include("viewtable.php");
        ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>