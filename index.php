<?php

$host       = "localhost"; 
$username   = "root"; 
$pass       = ""; 
$db         = "abu_profile"; 
$conn    = mysqli_connect($host, $username, $pass, $db); 

if (!$conn) {
    die("Not connected: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Abu Sembeng</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <h1>Welcome to My Website Guys</h1>
      <nav>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#blog">Blog</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <section id="home">
        <h2>Home</h2>
        <h3>Abu Sembeng</h3>
        <p>Halo guyss...</p>
      </section>

      <section id="gallery">
        <h2>Gallery</h2>
        <div class="gallery">
          <img src="AI.jpeg" alt="Image 1" width="200" />
          <img src="AI2.jpeg" alt="Image 2" width="200" />
          <img src="AI3.jpeg" alt="Image 3" width="200" />
          <img src="AI4.jpeg" alt="Image 4" width="200" />
        </div>
      </section>

      <section id="blog">
        <h2>Blog</h2>
        <?php
            $query = "SELECT * FROM blog";
            $result = mysqli_query($conn, $query);

            $no = 1;

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($no >=0) {
            ?>
        <article>
          <h2><?= $row["judul"] ?></h2>
          <p>
          <?= $row["artikel"] ?>
          </p>
          <p>Sumber: <a href=<?= $row["link"] ?> target="_blank"><?= $row["sumber"] ?></a></p>
        </article>
        <?php } 
            $no++;
            }
            } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);}
            ?>
      </section>

      <section id="contact">
        <h2>Contact</h2>
        <ul>
          <li>
            <strong>Email:</strong>
            <a href="mailto:Abuzasembeng5903@gmail.com" target="_blank">Email Saya</a>
          </li>
          <li>
            <strong>Phone:</strong>
            <a href="https://wa.me/+6281356255289" target="_blank">WhatsApp</a>
          </li>
          <li>
            <strong>Instagram:</strong>
            <a href="https://www.instagram.com/abusembeng_?igsh=MTExNjM0cnFsNHQ0NA==" target="_blank">Instagram</a>
          </li>
        </ul>
      </section>
    </main>

    <footer></footer>
  </body>
</html>
