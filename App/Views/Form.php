<head>
    <style>
        .container{
            width: 100%;
            margin: 5rem;
            line-height: 10px;
            display: flex;
            flex-direction: row;
        }
        .form-control{
            font-size: 30px;
            text-align: left;
            padding: 5px;
        }
        .buttondesign{
            color: black;
            background-color: aliceblue;
            text-align: left;
            border-radius:5px;
            font-size: 20px;
            padding:10px;
            margin: 5px;
            border-radius: 10px;
        }
        .buttondesign:hover{
            color:white;
            background-color:blue;
        }
        .inputbox{
            width:400px;
            height:50px;
        }
        .content{
            display: flex;
            flex-direction: row;
            align-items: top;
            justify-content: center;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <div class="formBackground">
            <div class="form-control">
            <label for="">To &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<input type="email" class="inputbox" name="sse_email" required></label>
            </div><br><br>
            <div class="form-control">
            <label for="">Subject &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<input type="text" name="sse_subject" id="" class="inputbox" required></label><br>
            </div><br><br>
            <div class="form-control content">
            <label for="">Content &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</label>
            <textarea  id="" name="sse_content" cols="43" rows="10" required></textarea><br><br>
            </div><br><br>
            <div class="form-control">
            <button class="buttondesign" type="submit" name="sse_submit">Send</button>
            <?php
                wp_nonce_field('SSE_email_form');
            ?>
            </div>
            </div>
        </form>
    </div>
</body>
</html>