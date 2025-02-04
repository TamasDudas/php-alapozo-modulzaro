<?php


require 'db_connection.php';
require_once 'functions.php';


//Postok és hozzá tartozó user nevének lekérdezése
$stmt = getPostAndName($conn);
$stmt->execute();
$result = $stmt->get_result();


//Eredmények kiíratása bootsrap card osztályokkal
if ($result->num_rows > 0) {
    echo "<div class='container mt-4'><div class='row'>";
    while ($row = $result->fetch_assoc()) {

        $excerpt = substr($row['body'], 0, 350);
        echo "
        <div class='col-md-6 d-flex align-items-stretch g-4'>
            <div class='card mb-4 shadow-sm h-100'>
                <div class='card-body d-flex flex-column justify-content-center '>
                    <h5 class='card-title'>{$row['title']}</h5>
                    <p class='card-text'>" . $excerpt . "</p>
                    <a href='post.php?id={$row['id']}' class='btn btn-warning w-50 m-auto'>Tovább a posztra</a>
                    <a class='card-text text-start mt-3 text-primary-emphasis' href='author-posts.php?id={$row['id']}'>Szerző: {$row['nev']}</a>
                </div>
            </div>
        </div>";
    }
    echo "</div></div>";
} else {
    echo "<div class='container mt-5 '><h3 class='text-center'>Még nincsenek posztok</h3>
    <p class='text-center'>Regisztrálj és írd meg te az első posztot!</p>
    </div>";
}

//kapcsolat lezárása
$conn->close();
