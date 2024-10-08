<?php
    require 'model/ContactDAO.php';
    error_reporting(E_ERROR | E_PARSE);
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $id=$_POST['id'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $contact = new Contact();
        $contact->setContactID($id);
        $contact->setUsername($username);
        $contact->setEmail($email);
        $contactDAO = new ContactDAO();
        $contactDAO->addContact($contact);
        echo 'Transaction complete. Renavigate to localhost:80 via the addressbar.';
        exit;
    }

    function showErrors($debug){
        if($debug==1){
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS 2033 | Add Comment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
<body>

    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light" style="margin-bottom: 20px">
    <a class="navbar-brand" href="">
        <img src="images/lion.png" width="12%" height="12%" class="d-inline-block align-middle" alt="">
        Add a comment
    </a>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Info</h5>
                        <p class="card-text">Add a new comment.</p>
                        <form action="addContact.php" method="POST">
                            <label for="id" class="form-label">First Name</label>
                            <input type="text" class="form-control mb-3" id="id" name="id" placeholder="Enter your First Name" required>
                            <label for="username" class="form-label">Last Name</label>
                            <input type="text" class="form-control mb-3" id="username" name="username" placeholder="Enter your Last Name" required>
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control mb-3" id="email" name="email" placeholder="Enter your Comment" required>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
