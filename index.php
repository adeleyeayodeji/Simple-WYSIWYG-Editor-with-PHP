<?php
    //Creating connection to the base
    $db = mysqli_connect("localhost", "root", "", "form") or die("Am not ready at the moment");
    //Getting the form field

    //If form is ready
    if (isset($_POST["send"])) {

        $content = $_POST["content"];
        //Sending the data to Database 
        $query = mysqli_query($db, "INSERT INTO form(content) VALUES('$content')") or die("Their are troubles on the line");
        if ($query) {
            ?>
            <script type="text/javascript">
                alert("Posted in base");
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript">
                alert("Error posting to base");
            </script>
            <?php
        }        
    }
    
?>
<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">
                <title>Using CKEditor CDN</title>
                <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
        </head>
        <body>
                <form action="" method="POST">

                <textarea name="content">Your content here</textarea>

                 <input type="submit" value="Submit" name="send">

                 </form>

                 <div style="padding: 20px;">
                    <h2>Post Content</h2>
                    <hr>
                     <?php 
                        $query = mysqli_query($db, "SELECT * FROM form ORDER BY id DESC") or die("I can't fetch the data");
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo $row["content"].'<hr>'; 
                        }
                     ?>
                 </div>

                <script>
                        CKEDITOR.replace( 'content' );
                </script>
        </body>
</html>