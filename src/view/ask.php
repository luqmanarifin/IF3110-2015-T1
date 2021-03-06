<!DOCTYPE html>
<html>
  <head>
    <title>Ask Question | Overflow48</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="icon" type="image/png" href="/assets/white-icon.jpg">
    
  </head>
  <body>
    <div class="container">
      <h1 class="text-center"><a href="/view/index.php">OVERFLOW48</a></h1>
      <br/>
      <h2>What's your question?</h2>
      <?php
        require_once '../conf.php';
        require_once '../model/question.php';
        $questionModel = new Question();
        $q["name"] = $q["email"] = $q["topic"] = $q["content"] = "";
        $id = -1;
        if(isset($_GET["id"])) {
          $id = $_GET["id"];
          $result = $questionModel->get($id);
          foreach($result as $item) {
            $q = $item;
          }
        }
      ?>
      <hr class="line">
      <form id="ask" action="/controller/questionController.php" onsubmit="return validateAsk()" method="POST">
        <input name="id" type="hidden" value="<?=$id?>">
        <input id="authorName" placeholder="Name" class="form" type="text" name="authorName" value="<?= $q["name"] ?>">
        <input id="authorEmail" placeholder="Email" class="form" type="text" name="authorEmail" value="<?= $q["email"] ?>">
        <input id="topic" placeholder="Question Topic" class="form" type="text" name="topic" value="<?= $q["topic"] ?>">
        <textarea id="content" placeholder="Content" rows="4" class="box" name="content"><?= $q["content"] ?></textarea>
        <div class="text-right">
            <button class="button" type="submit">Post</button>
        </div>
      </form>
    </div>
    
    <script type="text/javascript" src="/assets/js/validation.js"></script>
  </body>
  <footer> <br><br> </footer>
</html>