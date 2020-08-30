<?php
      require_once ("./dbconnect.php");
      require_once ("./component.php");

      if(isset($_POST['create'])){
            createData();
      }

      if(isset($_POST['update'])){
            updateData();
      }

      if(isset($_POST['delete'])){
            deleteData();
      }

      if(isset($_POST['deleteall'])){
            deleteAll();
      }

      

      function createData(){
            $bookname= textboxValue("book_name");  
            $bookpublisher = textboxValue("book_publisher");
            $bookprice = textboxValue("book_price");

            if($bookname && $bookpublisher && $bookprice){
                  $sql_insert = "INSERT INTO tb_books(book_name,book_publisher,book_price) VALUES('$bookname','$bookpublisher','$bookprice')";

                  $result = mysqli_query($GLOBALS['con'],$sql_insert);
                  if($result){
                        textNode($classname="success", $msg="Record has been insertrd...");
                        // echo "";
                  }
                  else{
                        echo "Error....!".mysqil_error($GLOBALS['con']);
                  }
            }
            else{
                  textNode($classname="error", $msg="Provide data in tha textBox.");
            }
      }

      function textboxValue($value){
            $textbox =  mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
            if(empty($textbox)){
                  return false;
            }
            else{
                  return $textbox;
            }

      }

      // Message
      function textNode($classname, $msg){
            $element = "<h6 class='$classname'>$msg</h6>";
            echo $element;
      }


      // get data from mysql database
      function getData(){
            $sql = "SELECT * FROM tb_books";
            $result = mysqli_query($GLOBALS['con'],$sql);
            $num = mysqli_num_rows($result);
            if($num>0){
                  return $result;
            }
            else{

            }
      }



      // Update data from mysql database
      function updateData(){
            $bookid = textboxValue("book_id");
            $bookname = textboxValue("book_name");
            $bookpublisher = textboxValue("book_publisher");
            $bookprice = textboxValue("book_price");

            if($bookname && $bookpublisher && $bookprice){
                  $sql_update = "UPDATE tb_books SET book_name = '$bookname',
                                                book_publisher = '$bookpublisher',
                                                book_price = '$bookprice'
                                                WHERE book_id = '$bookid'";

                  $result = mysqli_query($GLOBALS['con'],$sql_update);

                  if($result){
                        textNode("Success","Data successfully updated.");
                  }
                  else{
                        textNode("Error.....!","Unable to update data.");
                  }
            }
            else{
                  textNode("Error.....!","Select data using edit icon.");
            }
      }



      // Delete Data from mysql database
      function deleteData(){
            $bookid = textboxValue("book_id");

            $sql_delete = "DELETE FROM tb_books WHERE book_id = '$bookid'";
            $result = mysqli_query($GLOBALS['con'],$sql_delete);
            if($result){
                  textNode("Success","Data successfully deleted.");
            }
            else{
                  textNode("Error.....!","Unable to delete data.");
            }
      }



      function deleteBtn(){
            $result = getData();
            $i = 0;
            if($result){
                  while(mysqli_fetch_assoc($result)){
                        // echo $row['book_id'];
                        $i++;
                        if($i>3){
                              buttonElement("btn-deleteall","btn btn-danger", "<i class='fas fa-trash'></i>Delete All", "deleteall", "");
                              return;
                        }
                  }
            }
      }



      // Delete All
      function deleteAll(){
            $sql_deleteall = "TRUNCATE TABLE tb_books";
            $result = mysqli_query($GLOBALS['con'],$sql_deleteall);
            if($result){
                  textNode("Success","Table trash succcessfully.");
            }
            else{
                  textNode("Error.....!","Unable to trash table.");
            }
      }


      // set id to text box
      function setID(){
            $getid = getData();
            $id = 0;
            if($getid){
                  while($row = mysqli_fetch_assoc($getid)){
                        $id = $row['book_id'];
                  }
            }
            return ($id+1);
      }
?>