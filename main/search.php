<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>GTCoding</title>
    <link rel="stylesheet" href="search_style.css" />
  </head>
  <body>


  <form action="incoming.php" method="post" >						
  <div class="container">
      <div class="select-box">
        <div class="options-container">
        <?php
          include('../connect.php');
          $result = $db->prepare("SELECT * FROM products");
          $result->bindParam(':userid', $res);
          $result->execute();
          for($i=0; $row = $result->fetch(); $i++){
          ?>
          
          <div class="option">
            <input type="radio" class="radio" id="film" name="category" />
            <label for="film"><?php echo $row['product_name']; ?></label>
          </div>
          <?php
        }
        ?>

        </div>
        <div class="selected">Select Video Category</div>

        <div class="search-box">
          <input type="text" placeholder="Start Typing..." />
        </div>
      </div>
    </div>                  
    <Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;">Add</button>
   </form>

    <script src="main.js"></script>
  </body>
</html>
