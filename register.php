<?php
session_start();

?>

<?php
// session_start();

include('includes/dbcon.php');

// Initialize variables
$fname = "";
$last = "";
$username = "";
$email = "";
$sex = "";
$per = "";
$password = "";
$con_pass = "";
$phone = "";
// $description = "";



// Function to generate email suggestions
function suggestEmail($existingEmail, $firstName, $lastName)
{
    $suggestions = array();
    $parts = explode('@', $existingEmail);
    $username = $parts[0];
    $domain = $parts[1];

    // Generate multiple suggestions by appending different random numbers to the username
    for ($i = 0; $i < 3; $i++) {
        $randomNumber = rand(1, 999);
        $suggestion = $firstName . $lastName . $randomNumber . '@' . $domain;
        $suggestions[] = $suggestion;
    }

    return $suggestions;
}


if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($con, $_POST['name']);
    $last = mysqli_real_escape_string($con, $_POST['lastname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $sex = mysqli_real_escape_string($con, $_POST['sex']);
    $per = mysqli_real_escape_string($con, $_POST['permission']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $con_pass = mysqli_real_escape_string($con, $_POST['con_pass']);
    $phone = mysqli_real_escape_string($con, $_POST['mobile']);


    if ($con_pass != $password) {
        echo "Password Does Not Match";
    } else {
        // Check if email already exists
        $select = "SELECT * FROM tblusers WHERE email = '$email'";
        $result = mysqli_query($con, $select);

        if (mysqli_num_rows($result) > 0) {
            $emailSuggestions = suggestEmail($email, $fname, $last);
            $suggestionList = implode(', ', $emailSuggestions);
            // echo "Email already exists. Please enter another email. Here are some suggestions: <span style='color: red;'>$suggestionList</span>";
        } else {
            // Proceed with user registration
            $insert = "INSERT INTO tblusers(name, lastname, UserName, email, sex, Password, mobile, userimage, status)
                VALUES ('$fname', '$last', '$username', '$email', '$sex', '$password', '$phone', 'patient.jpg', '0')";

            $result = mysqli_query($con, $insert);
            if ($result) {
                echo "<script> 
                alert('Registration Successful');
                location.href='login.php';
            </script>";
            } else {
                echo "Registration failed. Please try again.";
            }
        }
    }
}
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .registration-form {
            background-color: #ffffff;
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .registration-form h3 {
            text-align: center;
            margin-bottom: 30px;
        }

        .registration-form .form-group {
            margin-bottom: 20px;
        }

        .registration-form label {
            font-weight: 600;
        }

        .registration-form input[type="text"],
        .registration-form input[type="email"],
        .registration-form input[type="password"] {
            border: none;
            border-radius: 20px;
            padding: 10px 15px;
            background-color: #f1f2f3;
        }

        .registration-form .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 20px;
            padding: 10px 25px;
        }

        .registration-form .btn-primary:hover {
            background-color: #0069d9;
        }

        .registration-form p {
            text-align: center;
            margin-top: 20px;
        }

        .registration-form p a {
            color: #007bff;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="registration-form">
                    <h3>Create New Account</h3>
                    <form role="form" id="registration-form" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="feFirstName">First Name</label>
                                    <input type="text" name="name" value="<?php echo htmlspecialchars($fname); ?>" class="form-control" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="feLastName">Last Name</label>
                                    <input type="text" name="lastname" value="<?php echo htmlspecialchars($last); ?>" class="form-control" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="feUsername">Username</label>
                            <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="feEmail">Email address</label>
                            <input type="email" id="myInput" name="email" value="<?php echo htmlspecialchars($email); ?>" class="form-control" placeholder="Enter email" required>
                            <!-- <div class="suggestion hidden"></div> -->
                            <?php
                            if (isset($_POST['submit'])) {
                                echo "Email already exists. Please enter another email. Here are some suggestions: 
                                <span style='color: red;'>";
                              $text = explode(', ', $suggestionList);
                              for($i=0; $i < count($text); $i++){
                                    echo "<button type='button' class='suggest' 
                                     style='text-decoration:none;cursor:pointer;color:red;background:none;
                                     border:none;
                                     
                                     '>".$text[$i]."</button>";
                                    echo "<br/>";
                              }
                                
                               "</span>";
      
                            }
                            ?>

                        </div>
                        <input type="hidden" name="permission" value="<?php echo htmlspecialchars($per); ?>" class="form-control" value="User" required>
                        <div class="form-group">
                            <label for="feMobile">Mobile</label>
                            <input type="text" name="mobile" value="<?php echo htmlspecialchars($phone); ?>" class="form-control" placeholder="Enter mobile" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fePassword">Password</label>
                                    <input type="password" value="<?php echo htmlspecialchars($password); ?>" name="password" class="form-control" placeholder="Password" required>
                                </div>
                            </div>
                            <!-- <p id="demo"></p> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="feConfirmPassword">Confirm Password</label>
                                    <input type="password" value="<?php echo htmlspecialchars($con_pass); ?>" name="con_pass" class="form-control" placeholder="Confirm Password" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="" for="feGender">Gender:</label>
                            <select name="sex" value="<?php echo htmlspecialchars($sex); ?>" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <p>Already have an account? <a href="login.php">Click here</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    // var emails = document.querySelectorAll('#suggest');
//     emails.forEach(function(emails) {
//         emails.addEventListener('click', function() {
//     var content = this.textContent;
//     alert(content);
//   });
// });

var emails = document.getElementsByClassName('suggest');
var inputField = document.getElementById('myInput');
// Add click event listener to each button
for (var i = 0; i < emails.length; i++) {
    emails[i].addEventListener('click', function() {
    var emailsContent = this.textContent;
    inputField.value = emailsContent;
     
   
  });
}


</script>
</form>




