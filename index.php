<?php
      require_once ("./dbconnect.php");
      require_once ("./component.php");
      include "./operation.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Book Store</title>
      <!-- Style CSS -->
      <link rel="stylesheet" href="./style.css" type=text/css>
      <link rel="icon" href="./img/book.png" type="image/x-icon">

      <!-- CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

      <!-- Icon CSS -->
      <script src="https://kit.fontawesome.com/3616e2b595.js" crossorigin="anonymous"></script>

</head>

<body>
      <main>
            <div class="container text-center">
                  <!-- py-2 = padding top & bottom to 2 -->
                  <h1 class="py-4 bg-warning text-dark rounded"> <i class="fas fa-book"></i> iBook</h1>

                  <!-- Specify display flex property -->
                  <div class="d-flex justify-content-center">
                        <form class="w-50" action="" method="post">
                              <!-- py-2 = padding top & bottom to 2 -->

                              <!-- ID -->
                              <div class="py-2">
                                    <!-- <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                      <div class="input-group-text bg-primary"><i class='fas fa-id-badge'></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="ID" autocomplete="off">
                                          </div> -->
                                    <?php inputElement($icon="<i class='fas fa-id-badge'></i>", $placeholder="ID", $name="book_id",setID());
                                          ?>
                              </div>


                              <!-- Book Name -->
                              <div class="pt-2">
                                    <!-- <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                      <div class="input-group-text bg-primary"><i class='fas fa-id-badge'></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="ID" autocomplete="off">
                                          </div> -->
                                    <?php inputElement($icon="<i class='fas fa-book'></i>", $placeholder="BookName", $name="book_name",$value=" "); ?>
                              </div>


                              <!-- Publisher & Price -->
                              <div class="row pt-3">
                                    <div class="col">
                                          <?php inputElement($icon="<i class='fas fa-people-carry'></i>", $placeholder="Publisher", $name="book_publisher",$value=" "); ?>
                                    </div>

                                    <div class="col">
                                          <?php inputElement($icon="<i class='fas fa-dollar-sign'></i>", $placeholder="Price", $name="book_price",$value=" "); ?>
                                    </div>
                              </div>


                              <!-- CURD Function -->
                              <div class="d-flex justify-content-center">
                                    <?php buttonElement($btn_id='btn-create', $styleclass='btn btn-success', $text='<i class="fas fa-plus"></i>', $name='create', $attr='dat-toggle="tooltip" data-placement="bottom" title="Crate"' );?>

                                    <?php buttonElement($btn_id='btn-read', $styleclass='btn btn-primary', $text='<i class="fas fa-sync"></i>', $name='read', $attr='dat-toggle="tooltip" data-placement="bottom" title="Read"' );?>

                                    <?php buttonElement($btn_id='btn-update', $styleclass='btn btn-light border ', $text='<i class="fas fa-pen-alt"></i>', $name='update', $attr='dat-toggle="tooltip" data-placement="bottom" title="Update"' );?>

                                    <?php buttonElement($btn_id='btn-delete', $styleclass='btn btn-danger ', $text='<i class="fas fa-trash-alt"></i>', $name='delete', $attr='dat-toggle="tooltip" data-placement="bottom" title="Delete"' );?>

                                    <?php deleteBtn();?>

                              </div>
                        </form>
                  </div>


                  <!--BootStrap Table -->
                  <div class="d-flex table-data">
                        <table class="table table-striped table-dark">
                              <thead class="thead-dark">
                                    <tr>
                                          <th>ID</th>
                                          <th>Book Name</th>
                                          <th>Publisher</th>
                                          <th>Book Price</th>
                                          <th>Edit</th>
                                    </tr>
                              </thead>
                              <tbody id="tbody">
                                    <?php
                                                if(isset($_POST['read'])){
                                                      $result = getData();

                                                      if($result){
                                                            while($row = mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                          <td data-id="<?php echo $row['book_id']; ?>"><?php echo $row['book_id']; ?></td>
                                          <td data-id="<?php echo $row['book_id']; ?>"><?php echo $row['book_name']; ?></td>
                                          <td data-id="<?php echo $row['book_id']; ?>"><?php echo $row['book_publisher']; ?></td>
                                          <td data-id="<?php echo $row['book_id']; ?>"><?php echo'$'. $row['book_price']; ?></td>
                                          <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['book_id'];?>"> </i>
                                          </td>
                                    </tr>
                                    <?php
                                                            }
                                                      }
                                                }
                                          ?>
                              </tbody>
                        </table>
                  </div>
            </div>
      </main>
      <!-- JS -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
      </script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
      </script>
      <script src="./main.js"></script>
</body>

</html>