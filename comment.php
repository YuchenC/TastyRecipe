<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <main>
        <h1>Comments</h1>
            <?php if ($status == true)  { ?>
            <form action="add.php" method='post'>
                <div class="comments"> 
                    <label><?php echo htmlentities($username, ENT_QUOTES) ?> says:</label>
                </div>
                <div class="commentform">
                    <textarea rows = "5" cols = "50" name='comment' placeholder="Write your comment here"></textarea>   
                </div>
                <button type="submit">Send</button>
            </form>
            <?php } ?>
        
            <?php if ($status == false) { ?>
            <a class="message"  href="to-login.php">Log in to write comemnts</a>
            <?php } ?>
            
            <div class="comments">
                <?php
                for ($i = 0; $i < count($commentCollection); ++$i)
                {
                    echo htmlentities(($commentCollection[$i]->getUser()." wrote: ".$commentCollection[$i]->getComment()));
                    echo '<br><br>';
                    if ($commentCollection[$i]->getUser() === $username) 
                    {
                        echo("<form action='delete.php'>");
                        echo("<input type='hidden' name='timestamp' value='" .
                        $commentCollection[$i]->getTime() . "'/>");
                        echo("<input type='submit' value='Delete'/>");
                        echo("</form>");    
                    }
                }
                ?>
            </div>
        </main>
    </body>
</html>
