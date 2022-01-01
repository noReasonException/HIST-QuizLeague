<DOCTYPE HTML>
    <html>
    <?php header("Content-Type: text/html; charset=utf-8");
    include '../../../core/page.php';
    $ThisPage=new Page();
    $ThisPage->checkifblocked(3);
    session_start();if(isset($_SESSION['isconnected'])){session_destroy();}
    ?>

    <head>
        <title>QuizLeague Teachers SignIn</title>
        <link rel="stylesheet" type="text/css" href="css/SignIn.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">

    </head>
    <body>
    <div class="SignInHeader">
        <img src="../img/Layer%201.png">
    </div>
        <div class="SignInForm"><p>Εγγραφή ως καθηγητής..</p><br>
                <form action="VerifyPanel/index.php" method="post" id="SignInForm">
                    <img src="../img/Username_icon.png" ><input type="text" class="firstname" id="firstname" onclick="EraseTempData('firstname')" value="Όνομα" name="firstname"><br>
                    <img src="../img/Username_icon.png" ><input type="text" class="lastname" id="lastname" onclick="EraseTempData('lastname')" value="Επίθετο" name="lastname"><br>
                    <img src="../img/Username_icon.png" ><input type="text" class="age" id="age" value="Ηλικία" onclick="EraseTempData('age')" name="age"><br>
                    <img src="../img/Username_icon.png" ><input type="text" class="username" id="username" onclick="EraseTempData('username')" value="Όνομα Χρήστη" name="username"><br>
                    <img src="../img/Username_icon.png" ><input type="text" class="password" id="password" onclick="EraseTempData('password')" value="Κωδικός Πρόσβασης" name="password"><br>
                    <img src="../img/Username_icon.png" ><input type="text" class="email" id="email" onclick="EraseTempData('email')" value="E-mail" name="email"><br>

                    <a onclick="precheck()" class="SignInButton">Εγγραφή</a>
                </form>
    <script>
        function EraseTempData(idname){
            var obj = document.getElementById(idname);
            obj.value="";
            obj.style="color:#000000;";
            if(idname=='password'){
                obj.type="password";
            }
        }
        function precheck(){
            var elements_list= [];
            var isempty=false;
            //fill the list with nessesary objects
            elements_list.push(document.getElementById('firstname'));
            elements_list.push(document.getElementById('lastname'));
            elements_list.push(document.getElementById('age'));
            elements_list.push(document.getElementById('username'));
            elements_list.push(document.getElementById('password'));
            elements_list.push(document.getElementById('email'));
            //check if everything has value

            for(var i=0;i<6;i++){
                if(elements_list[i].value==''){
                    elements_list[i].style="color:#f24848;";
                    elements_list[i].value='<--Απαραίτητο Στοιχείο!';
                    isempty=true
                }
            }
            if(isempty){
                window.alert('Συμπληρώστε σωστά τα ζητούμενα πεδία');
                return 0;
            }

            if(isNaN(parseInt(elements_list[2].value))){//αν η ηλικια ειναι αριθμος
                window.alert('Συμπληρώστε σωστά τα ζητούμενα πεδία');
                elements_list[2].style="color:#f24848;";
                elements_list[2].value=elements_list[2].value+"<-ΛάθοςΤιμή"
            }

            else {
                if(parseInt(elements_list[2].value)<12 || parseInt(elements_list[2].value)>80){
                    window.alert('Συμπληρώστε σωστά τα ζητούμενα πεδία');
                    elements_list[2].style="color:#f24848;";
                    elements_list[2].value=a.value+"<-ΛάθοςΤιμή"
                }
                document.getElementById('SignInForm').submit();
            }
        }
    </script>
    </body>
    </html>
</DOCTYPE>