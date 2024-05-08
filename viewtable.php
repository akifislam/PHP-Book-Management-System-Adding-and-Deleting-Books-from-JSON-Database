<?php

$booklist = file_get_contents("books.json");
$booklist = json_decode($booklist, true);

echo "
<tr>
    <th>#</th>
    <th>Title</th>
    <th>Author</th>
    <th>Pages</th>

</tr>";

for ($i = 0; $i < count($booklist); $i++) {

    echo "<tr>";
    $serial = $i+1;
    $booktitle = $booklist[$i]["title"];
    $bookauthor = $booklist[$i]["author"];
    $bookpages = $booklist[$i]["pages"];

    echo "<td>$serial</td>";
    echo "<td>$booktitle</td>";
    echo "<td>$bookauthor</td>";
    echo "<td>$bookpages</td>";

    echo "</tr>";

}

function bookListCallback($listitem){
    if (!empty($listitem["title"]))
        return true;
    else
        return false;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newTitle = $_POST["title"];
    $newAuthor = $_POST["author"];
    $newPages = $_POST["pages"];
    $serialno = $_POST["serial"];

    if ((empty($newTitle) || empty($newAuthor) || empty($newPages)) and isset($_POST["addSubmit"])) {
        echo "<script>alert(\"You must have to fill 3 fields\");</script>";
    } 
    
    else {
        // Add the new data to the associative array
        $newBook = [
            "title" => $newTitle,
            "author" => $newAuthor,
            "pages" => $newPages,
        ];

        $booklist[] = $newBook;
        file_put_contents("books.json", json_encode($booklist));
        echo "<meta http-equiv='refresh' content='0'>";
    }

    if (!empty($serialno) and isset($_POST["deleteSubmit"])) {
       
        $serialno--;
        unset($booklist[$serialno]);
        $booklist = array_values($booklist); # Re-indexing
        $booklist = array_filter($booklist,"bookListCallback");

        file_put_contents("books.json", json_encode($booklist));

        echo "<meta http-equiv='refresh' content='0'>";
    }
}

?>