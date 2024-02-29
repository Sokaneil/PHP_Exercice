<main>
<form class="m-5" action="" method="GET">
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title">
    <label for="author" class="form-label">Author</label>
    <input type="text" class="form-control" id="author" name="author">
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <input type="textarea" class="form-control" id="content" name="content">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
$erreur = [];

if (empty($_GET['title'])) {
    $erreur[] = "Title is required.";
}

if (empty($_GET['author'])) {
    $erreur[] = "Author is required.";
}

if (empty($_GET['content'])) {
    $erreur[] = "Content is required.";
}

if (empty($erreur)) {
    require("./inc/db.php");
    $request = $pdo->prepare("INSERT INTO articles (title, author, datepub, content) VALUES (?, ?, ?, ?);");
    $request->execute([$_GET['title'], $_GET['author'], date('Y-m-d'), $_GET['content']]);
}
?>
<ul>
    <?php
    foreach($erreur as $item){
        echo "<li>".$item."</li>";
    }
    ?>
</ul>
</main>