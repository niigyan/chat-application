<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title>Chat Application</title>
</head>
<body>
    <div class="wrapper">
        <section class="form signup">
             <header>Realtime Chat App</header>
             <form action="#" enctype="multipart/form-data">
                 <div class="error-txt">This is an error message</div>
                 <div class="name-details">
                     <div class="field input">
                         <label for="">First Name</label>
                         <input type="text" name="fname" placeholder="First Name" required>
                     </div>
                     <div class="field input">
                        <label for="">Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                 </div>
                 <div class="field input">
                    <label for="">Email Address</label>
                    <input type="text" name="email" placeholder="Enter your mail" required>
                </div><div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter your passoword" required>
                    <i class="fas fa-eye"></i>
                </div><div class="field image">
                    <label for="">Select Image</label>
                    <input type="file" name="image" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>
             </form>
             <div class="link">
                 Already signed up? <a href="login.php">Login now</a>
             </div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>
</html>