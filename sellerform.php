<?php
include "./Register/dbconnect.php";
$showAlert = false;
$error = false;

if($_SERVER["REQUEST_METHOD"] == "POST" && $sname != "" && $address != "" && $adhaar != "" && $num != "" && $city != "" && $state != "" && $code != ""
&& $pname != "" && $price != "" && $category != "" && $image != ""){
    $sname = $_POST["sname"];
    $address = $_POST["add"];
    $adhaar = $_POST["adhaar"];
    $num = $_POST["num"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $code = $_POST["code"];
    $pname = $_POST["pname"];
    $size = $_POST["size"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $len = $_POST['len'];
    $wid = $_POST['wid'];
    $height = $_POST['height'];

    $file = $_FILES['img'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt,$allowed)){
        echo "if 1";
        if($fileError === 0) {

            if($fileSize < 1000000) {

                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = "uploads/".$fileNameNew;

                
                    $sql = "insert into product(Name,Address,Aadhar,Contact,City,State,Code,ProductName,Size,Price,Category,Length,Breadth,Height,Img)
                    values('$sname','$add','$adhaar','$num','$city','$state','$code','$pname','$size','$price','$category','$len','$wid','$height','$fileNameNews')";
                echo $sql;

                    $result = mysqli_query($conn, $sql);
                    if($result) {
                        move_uploaded_file($fileTmpName, $fileDestination);
                            header("Location: ./website/home.php");

                    }
                    else {
                        echo 'Error uploading to db';
                    }
                


            }else {
                echo 'Your file is too large';

            }

        }else {
            echo "There was an error uploading";
        }
    }else {
        echo "you can't upload files of this type";
    }
}
?>

    