<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../../asets/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h2>Example: Comment System with Ajax, PHP & MySQL</h2>
    <form method="POST" id="commentForm" action="comments.php" class="d-flex flex-column gap-5">
        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required/>
        </div>
        <div class="form-group">
            <textarea name="comment" id="comment" class="form-control" placeholder="Enter Comment" rows="5"
                      required></textarea>
        </div>
        <span id="message"></span>
        <div class="form-group d-flex">
            <input class="d-none
" name="commentId" id="commentId" value="0"/>
            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Post Comment"/>
        </div>
    </form>
    <div id="showComments"></div>
</div>
<script src="../../../asets/jquery-3.6.4.min.js"></script>
<script src="../../../asets/bootstrap.bundle.min.js"></script>
<script src="comments.js"></script>
</body>
</html>