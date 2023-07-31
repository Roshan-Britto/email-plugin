<?php
defined('ABSPATH') || exit ;
?>

<div class="container" style="width: 100%; margin: 5rem; line-height: 10px; display: flex; flex-direction: row;" >
   <form action="" method="POST">
        <div style="display: flex; flex-direction: row; justify-content: space-between; font-size: 30px; text-align: left; padding: 5px;" >
        <label for="">To :<input style="margin-left: 200px; width: 400px; height: 50px; " type="email" name="sse_email" ></label>
        </div><br><br>
        <div style="display: flex; flex-direction: row; justify-content: space-between; font-size: 30px; text-align: left; padding: 5px;" >
        <label for="">Subject :<input type="text" style="margin-left: 135px; width: 400px; height: 50px; " name="sse_subject"  ></label><br>
        </div><br><br>
        <div style="display: flex; flex-direction: row; justify-content: space-between; font-size: 30px; text-align: left; padding: 5px; " >
        <label for="">Content :</label>
        <textarea style="margin-left: 125px;  "  name="sse_content" cols="43" rows="10" ></textarea><br><br>
        </div><br><br>
        <div style="display: flex; flex-direction: row; justify-content: space-between; font-size: 30px; text-align: left; padding: 5px;" >
        <button style="color: black; background-color: aliceblue; text-align: left; border-radius:5px; font-size: 20px; padding:10px; margin: 5px; border-radius: 10px;" type="submit" name="sse_submit">Send</button>
        <?php
            wp_nonce_field('SSE_email_form');
        ?>
        </div>
    </form>
</div>