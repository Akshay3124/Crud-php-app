<!-- calling all required php files into the index php file -->
<?php
    require_once("../CRUDAppPhp/components/components.php");
    require_once("../CRUDAppPhp/components/operation.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    <!-- My CSS File -->
    <link rel="stylesheet" href="../CRUDAppPhp/style.css">
  
    <title>Donation Collector App</title>
</head>
<body>
<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-money-check-alt"> DONATION COLLECTION APP</i></h1>
<!-- adding all the imported sections -->
        <div class="d-flex justify-content-center">
            <form action="" method="POST" class="w-50">
                <div class="py-2">
                    <?php inputElement("fas fa-id-badge", "ID", "person_id", setID(), "person_id") ?>
                </div>
                <div>
                    <?php inputElement("fas fa-user-friends", "Person Name", "person_name", "", "person_name") ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("fas fa-building", "Place Name", "place_name", "", "place_name") ?>
                    </div>
                    <div class="col">
                        <?php inputElement("fas fa-rupee-sign", "Amount Deposited", "amount_deposited", "", "amount_deposited") ?>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <?php buttonElement("btn-create", "btn btn-success", "Create ","fas fa-plus" ,"create", "") ?>
                    <?php buttonElement("btn-read", "btn btn-primary", "Read ","fas fa-sync" ,"read", "") ?>
                    <?php buttonElement("btn-update", "btn btn-light border", "Update ","fas fa-pen-alt" ,"update", "") ?>
                    <?php buttonElement("btn-delete", "btn btn-danger", "Delete ","fas fa-trash" ,"delete", "") ?>
                    <?php DeleteAllBtn(); ?>

                </div>
            </form>
        </div>

<!-- BootStrap Table -->
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Person Name</th>
                        <th>Place Name</th>
                        <th>Amount Deposited</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <!-- Dynamically pulling the data from the database and adding it in form of a table here -->
                    <?php 
                    if (isset($_POST['read'])) {
                        //storing the data came from the getdata into a variable
                        $result = getdata();

                        if($result) {
                            while($row = mysqli_fetch_assoc($result)){ ?>
                                <tr class="mainRow">
                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['person_name']; ?></td>
                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['place_name']; ?></td>
                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['amount_deposited']; ?></td>
                                <td><i data-id="<?php echo $row['id']; ?>" class="fas fa-edit btnedit"></i></td>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

<script src="main.js"></script>
</body>
</html>