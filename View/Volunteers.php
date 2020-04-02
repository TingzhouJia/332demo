<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/volunteer.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script> -->
    <?php include_once "../Config/otherConfig.php"; ?>
    <?php include_once "../Controller/fetchAllOrganization.php"; ?>
    <?php include_once "../Controller/volunteerController.php"; ?>
    <title>Our Volunteer</title>
</head>

<?php

$sources = $organization->organizationList;
$branches = fetchByType("SPCA");
$shelters = fetchByType("shelter");
$rescuers = fetchByType("rescue organization");


$employeeLists=getEmployee();
$employeeKeys=array_keys($employeeLists[0]);

?>
<script>

</script>
<body>
    <section>
        <?php include_once "navBar.php"; ?>
        <div class="banner__wrap">

            <picture class="banner__picture">
                <source media="(min-width: 1200px)" srcset="https://ontariospca.ca/wp-content/uploads/2019/04/shutterstock_624899891.jpg 1200w" sizes="100vw">
                <source media="(min-width: 1024px)" srcset="https://ontariospca.ca/wp-content/uploads/2019/04/shutterstock_624899891-1200x342.jpg 768w" sizes="100vw">
                <source media="(min-width: 600px)" srcset="https://ontariospca.ca/wp-content/uploads/2019/04/shutterstock_624899891-768x219.jpg 768w" sizes="100vw">
                <img src="https://ontariospca.ca/wp-content/uploads/2019/04/shutterstock_624899891-600x171.jpg" alt="shutterstock_624899891" class="banner__img">
            </picture>
            <div class="banner__overlay"></div>


            <div class="banner__content">
                <h1 class="banner__title">
                    Volunteer
                </h1>
            </div><!-- /.banner__content -->
        </div>
        <section class="volunteer_body">
            <div class="branch_list">
                <h2 class="branch_list_large_title">View our life-saving positions:</h2>
                <span class="branch_list_title">Branches:</span>
                <ul>
                    <?php foreach ($branches as $ele) : ?>
                        <li><?php echo $ele["name"]; ?></li>
                    <?php endforeach; ?>
                </ul>
                <span class="branch_list_title">Shelters:</span>
                <ul>
                    <?php foreach ($shelters as $ele) : ?>
                        <li><?php echo $ele["name"]; ?></li>
                    <?php endforeach; ?>
                </ul>
                <span class="branch_list_title">Rescuers:</span>
                <ul>
                    <?php foreach ($rescuers as $ele) : ?>
                        <li><?php echo $ele["name"]; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="volunteer_list">
                <h3 class="volunteer_h3">Volunteer List</h3>
                <?php 
                if(isset($_POST["positionSelect"])&&isset($_POST["spcaSelect"])){
                    $employeetype=$_POST["positionSelect"];
                    $placetype=$_POST["spcaSelect"];
                    $employeeLists=getEmployee($employeetype,$placetype);
                 
                    $employeeKeys=array_keys($employeeLists[0]);
                    
                }
                
                
                ?>
               
                <form method="post" action="#" name="filterEmployee">

                    <div class="form-row formik">
                        <div lass="form-group col-md-6">
                            <label class="col-md-6 col-form-label">Employee Type:</label>
                            <select class="custom-select" name="positionSelect">
                                <option value="no">pick either Employee / Driver / Owner</option>
                                <option value="employee"> employee </option>
                                <option value="driver"> driver</option>
                                <option value="owner"> owner</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-6 col-form-label">SPCA Type:</label>
                            <select class="custom-select" name="spcaSelect">
                                <option value="no">pick an location</option>
                                <optgroup label="shelters">
                                    <?php foreach ($shelters as $ele) : ?>
                                        <option value=<?php echo $ele["name"]; ?>><?php echo $ele["name"]; ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                                <optgroup label="branches">
                                    <?php foreach ($branches as $ele) : ?>
                                        <option value=<?php echo $ele["name"]; ?>><?php echo $ele["name"]; ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                                <optgroup label="rescuers">
                                    <?php foreach ($rescuers as $ele) : ?>
                                        <option value=<?php echo $ele["name"]; ?>><?php echo $ele["name"]; ?></option>
                                    <?php endforeach; ?>
                                </optgroup>

                            </select>
                        </div>
                        <input type="submit" value="filter" class="btn-primary filter_form_btn" />
                    </div>



                </form>
                <h4 style="margin-top: 2vw"><?php echo isset($employeetype)?$employeetype!=="no"?ucfirst($employeetype):"Employee":"Employee"; ?> Information For 
                <?php echo isset($placetype)?$placetype!=="no"?$placetype:"All Place":"All Place" ?></h4>
                <!-- table for all employee -->
                <table class="table" style="margin-top: 2vw">
                    <thead>
                        <tr>
                            <?php foreach($employeeKeys as $th): ?>
                                <th scope="col"><?php  echo $th; ?></th>
                            <?php endforeach; ?>
                           
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($employeeLists as $elepart): ?>
                            <tr>
                            <?php foreach(array_values($elepart) as $each): ?>
                                <td><?php echo $each; ?></td>
                            <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                       
                    </tbody>
                </table>
               
            </div>
        </section>
        <?php include "footer.php"; ?>
    </section>
</body>

</html>