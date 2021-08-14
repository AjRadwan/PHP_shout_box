<?php
include_once "classes/Shout.php";
 
$shout = new Shout();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat box</title>
    <link rel="stylesheet" href="style.css">

  <!-- google fonts --><link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">


</head>
<body>
    <div class="wrapper">
        <header class="headsection">
            <h2>Chat Box With PHP MySql</h2>
        </header>
        <section class="content">
            <div class="box">
                <ul>

            <?php
    // Showing data from database 
            $getData = $shout->getAllData();
             if ($getData) {
                  while ($data = $getData->fetch_assoc()) { ?>
                <li>
                <b><?php echo $data['name'];?>
               </b> -- <?php echo $data['body'];?></li>
                <?php } }?>
                </ul>
            </div>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $shoutdata = $shout->insertData($_POST);
  }
?>

            <div class="shoutform">
                <form action="" method="POST">
                    <tr>   <br>
                       <td class="text-bold">Name</td>
                         <td><input type="text" name="name" placeholder="Please Enter Your Name" required></td>
                    </tr>
                    <br>
                    <tr>
                        <br>
                        <td>Text</td>
                          <input type="text" name="body" placeholder="Please Enter Your Message" required> 
                    </tr>
                    <br>
                    <tr>
                         
                        <td><input type="submit" value="Send Message"  required></td>
                    </tr>
                </form>
            </div>
        </section>
    </div>
</body>
</html>