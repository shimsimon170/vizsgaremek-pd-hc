<?php
include_once "web.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <title>Cat café</title>

</head>

<body>

    <div class="container">

        <h1>Menu</h1>

        <form action="/menu" method="get">
            <button type="submit">Get our menu</button>
        </form>

        <form action="/menu/search" method="get">
            <input type="text" name="name" >
            <button type="submit">Get items by name</button>
        </form>

        <form action="/menu" method="post">
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="description" placeholder="Description">
            <button type="submit">Post a snack request</button>
        </form>
    </div>
    <br>
    <div class="myTable">
    <?php

    // Táblázat az eredmény megjelnítése érdekében, az adatokat a response["body"] kell tartalmazza
    $result = json_decode($response,JSON_OBJECT_AS_ARRAY);
    if (isset($result['body'])) {
        echo "<table>
                <thead>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Category</td>
                </thead>
                <tbody>";

        $items = $result['body'];

        foreach ($items as $item) {
            echo "<tr>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>" . $item['description'] . "</td>";
            echo "<td>" . $item['category'] . "</td>";
            echo "<td>
                <form action=\"/users/delete\" method=\"POST\">
                <input class=\"hidden\" type=\"int\" name=\"id\" value=".$item['id']."></input>
                </form>
            </td>";
            echo "</tr>";
        }

        echo "</tbody>
        </table>";
    }
    ?>
    </div>
</body>

</html>