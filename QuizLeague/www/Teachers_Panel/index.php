<!DOCTYPE HTML>
    <html>
        <?php
            header("Content-Type: text/html; charset=utf-8");//set utf-8 encoding via http request
            session_start();//open just for check $_SESSION['isconnected']
            if(isset($_SESSION['isconnected'])){
                session_destroy();//delete session
            }
            include '../../core/page.php';
            $ThisPage = new Page();
            $ThisPage->checkifblocked();
        ?>
        <head>
            <title>QuizLeague Teachers Login</title>
            <link rel="stylesheet" type="text/css" href="css/style.css">

        </head>
        <body>

            <div class="Header">
                <img src="img/Layer 1.png">
            </div>
            <div class="Form">

                <form action="panel.php" method="post">
                    <img src="img/Username_icon.png" ><input type="text" class="username" id="username" onclick="EraseTempData()" value="Όνομα Χρήστη" name="username"><br>
                    <img src="img/icon_password.png"><input type="password" class="password" name="password"><br>
                    <button type="submit">Σύνδεση</button>

                </form>
                <a class="SignInAsTeacher" href="SignIn/index.php">Εγραφή ώς καθηγητής</a>
            </div>
            <script>
                var EraseTempData_IsNotUsed=true;
                function EraseTempData(){
                    if(EraseTempData_IsNotUsed){
                        var obj = document.getElementById("username");
                        obj.value="";
                        obj.style="color:#000000;";
                    }
                    EraseTempData_IsNotUsed=false;
                }
            </script>
        <?php if(isset($_GET['status'])){
            include '../../core/PrintMessageOnLogin/PrintMessage.php';
            $CheckForMessages = new PrintMessage($_GET['status']);
        }?>
        </body>
    </html>