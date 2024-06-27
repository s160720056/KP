<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
if(isset($_POST['kirim'])){
  $nama=$_POST['nama'];
  $pesan=$_POST['pesan'];

}
else{
  header("location:index.php");
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-refresh">
                            </span>Refresh</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-ok-sign">
                            </span>Available</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-remove">
                            </span>Busy</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-time"></span>
                                Away</a></li>
                            <li class="divider"></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-off"></span>
                                Sign Out</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="chat"  id="chat-box">
<!--                         <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font"><?php echo $nama ?></strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li> -->


                         <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                    <strong class="pull-right primary-font"><?php echo $nama ?></strong>
                                </div>
                                <p>
                                   <?php echo $pesan ?>
                                </p>
                            </div>
                        </li>
                      
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat" onclick="appendMessage()">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<style type="text/css">
      body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        width: 100%;
        max-width: 1200px;
    } 
  .chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: scroll;

}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}
</style>
<!--  <script>
        $(document).ready(function() {
            // Function to append the message to the chat box
            function appendMessage(name, message) {
                $('#chat-box').append('<li class="right clearfix"><span class="chat-img pull-right">' +
                    '<img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />' +
                    '</span><div class="chat-body clearfix">' +
                    '<div class="header"><small class=" text-muted"><span class="glyphicon glyphicon-time"></span>Just now</small>' +
                    '<strong class="pull-right primary-font">' + name + '</strong></div>' +
                    '<p>' + message + '</p></div></li>');
            }

            // When the Send button is clicked
            $('#btn-chat').on('click', function() {
                var message = $('#btn-input').val(); // Get the message from the input

                if (message.trim() !== '') { // Check if the message is not empty
                    appendMessage('Your Name', message); // Append the message to the chat box
                }
            });
        });
    </script> -->
    <script>
    // Function to append the message to the chat box
    function appendMessage() {
        // Retrieve the message and name from the input fields
        var message = $('#btn-input').val();
        var name = '<?php echo $nama; ?>'; // Use PHP to retrieve the name

        // Only proceed if there is a message to send
        if (message.trim() !== '') {
            // Your logic to append the message to the chat box goes here
            $('#chat-box').append('<li class="right clearfix"><span class="chat-img pull-right">' +
                '<img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />' +
                '</span><div class="chat-body clearfix">' +
                '<div class="header"><small class=" text-muted"><span class="glyphicon glyphicon-time"></span>Just now</small>' +
                '<strong class="pull-right primary-font">' + name + '</strong></div>' +
                '<p>' + message + '</p></div></li>');

            // Clear the input field after sending the message
            $('#btn-input').val('');
        }
    }
</script>
  <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/fakeLoader.min.js"></script>
    <script src="/js/jquery.filterizr.min.js"></script>
    <script src="/js/imagesloaded.pkgd.min.js"></script>
    <script src="/js/magnific-popup.min.js"></script>
    <script src="/js/contact-form.js"></script>
    <script src="/js/main.js"></script>
</html>