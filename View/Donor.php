<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include "../Config/otherConfig.php"; ?>
    <?php include "../Controller/fetchAllOrganization.php"; ?>
    <?php include '../Controller/Donation.php'; ?>
    <link rel="stylesheet" href="../css/donor.css" />

    <title>Donor</title>
</head>
<?php $res = findDonorYear(date("Y"))[0];

if(!isset($donor)){
    $donor = findDonor("Tingzhou Jia");
}




$allDonor = findAllDonor();

$specficBranch=$organization->organizationSelectList[0]["name"];
$res2=totalYearOne($specficBranch,2020)[0];

?>
<script>
    function test(){
        if(document.show_form.yeardonate.value==="no"){
            return false;
        }
        return true;
    }
    function test2(){
        if(document.show_form2.yearDonateForBranch.value==="no"&&document.show_form2.yearDonateForYear.value==="no"){
            return false;
        }
        return true;
    }
    function test3(){
        if(document.donor_form.yeardonateForSpecific.value==="no"){
            return false;
        }
        return true;
    }
</script>
<body>
    <section>
        <?php include "navBar.php"; ?>
        <section class="donor_body">
            <div class="show_list">
                <form class="show_form" name="show_form" action="#" method="post" onsubmit="return test()">
                    <h3>Total Year Donation</h3>
                    <select class="custom-select donor_select" name="yeardonate">
                        <option value="no">Pick A Year</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                    </select>
                    <input value="filter" type="submit" class="btn-primary"/>
                </form>
                <?php
                if (isset($_POST["yeardonate"])) {
                    
                    
                        $donation = $_POST["yeardonate"];
                        $res = findDonorYear($donation)[0];
                    
                    
                }
                ?>
                <div class="show_content">
                    <h3 style="flex:1;margin-right:1vw;">Money Donated In <?php echo isset($donation) ? $donation : date("Y"); ?></h3>
                    <div class="show_circle">
                        <?php echo $res["count"]; ?> Person-Times
                    </div>

                    <div class="show_circle">$ <?php echo isset($res["amount"])?$res["amount"]:0; ?></div>
                </div>

            </div>
            <?php
                if (isset($_POST["yearDonateForBranch"])) {
                    $specficBranch = $_POST["yearDonateForBranch"];
                    if($_POST["yearDonateForYear"]==="no"){
                         $yearbranch="2020";
                         $res2 = totalYearOne($specficBranch,$yearbranch)[0];
                        
                    }else{
                        $yearbranch=$_POST["yearDonateForYear"];
                        $res2 = totalYearOne($specficBranch,$yearbranch)[0];
                    }      
                }
                ?>
            <div class="show_list">
                <form class="show_form2" name="show_form2" action="#" method="post"  onsubmit="return test2()">
                    <h3>Total Year Donation For <?php echo $specficBranch ?> </h3>
                    <select class="custom-select donor_select" name="yearDonateForBranch">
                        <option value="no">Pick A Branch</option>
                        <?php foreach($organization->organizationSelectList as $ele): ?>
                            <option value=<?php echo $ele["name"]; ?> ><?php echo $ele["name"]; ?></option>
                        <?php endforeach; ?>
                       
                    </select>
                    <select class="custom-select donor_select" name="yearDonateForYear">
                        <option value="no" >Pick A Year</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                    </select>
                    <input type="submit" class="btn-primary" value="filter"/>
                </form>
               
                <div class="show_content">
                    <h3 style="flex:1;margin-right:1vw;">Money Donated For <?php echo $specficBranch;  ?> In <?php echo isset($yearbranch) ? $yearbranch : date("Y"); ?></h3>
                    <div class="show_circle">
                        <?php echo isset($res2["count"])?$res2["count"]:0; ?> Person-Times
                    </div>

                    <div class="show_circle">$ <?php echo isset($res2["amount"])?$res2["amount"]:0; ?></div>
                </div>

            </div>
            <div class="donor_list">
                <div class="find_donor">
                <?php 
                    if(isset($_POST["yeardonateForSpecific"])){
                        $liker=$_POST["yeardonateForSpecific"];
                       
                       
                        $donor=findDonor($liker);
                    }
                ?>

                    <form class=" my-2 my-lg-0 form_donor" action="#" name="donor_form" method="post" onsubmit="return test3()">
                        <h3>Find A Donor</h3>
                        <select class="custom-select" name="yeardonateForSpecific">
                            <option value="no">Pick A Donor</option>
                            <?php foreach ($donorList as $ele) : ?>
                                <option value=<?php echo $ele["payer"]; ?>><?php echo $ele["payer"]; ?></option>
                            <?php endforeach; ?>

                        </select>
                        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search" />
                    </form>
                    <span class="donor_each">Total Amount Donated By <?php  echo $donor[0]['payer']; ?></span>
                <?php
                    $totalAmount = 0;
                    foreach ($donor as $ele) {
                        $totalAmount += $ele["amount"];
                    }
                ?>
                    <h3> $<?php echo $totalAmount; ?></h3>
                </div>
               
                
                <table class="table donor_each_table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Organization</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donor as $ele) : ?>
                            <tr>
                                <th scope="row"><?php echo $ele["payment_id"]; ?></th>
                                <td><?php echo $ele["amount"]; ?></td>
                                <td><?php echo $ele["payee"]; ?></td>
                                <td><?php echo $ele["dateOfTransaction"]; ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <?php
                if(isset($_POST["DonateForSpecficBranch"])){
                        $selecteBranch=$_POST["DonateForSpecficBranch"];
                        $allDonor=findAllDonor($selecteBranch);
                }
            ?>
            <h2 style="margin-top: 2vw">Donor List For <?php echo isset($selecteBranch)?$selecteBranch:"All"; ?></h2>
            <form  class=" my-2 my-lg-0 form_donor" action="#" onsubmit="return test4()" method="post">
            <select class="custom-select donor_select" name="DonateForSpecficBranch">
                        <option value="all">All</option>
                        <?php foreach($organization->organizationSelectList as $ele): ?>
                            <option value=<?php echo $ele["name"]; ?> ><?php echo $ele["name"]; ?></option>
                        <?php endforeach; ?>
                       
            </select>
            <input type="submit" class="btn-primary" value="select" />
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                        <th scope="col">Organization</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allDonor as $ele) : ?>
                        <?php $sep = explode(" ", $ele["payer"]) ?>
                        <tr>
                            <th scope="row"><?php echo $ele["payment_id"]; ?></th>
                            <td><?php echo $sep[0]; ?></td>
                            <td><?php echo $sep[1]; ?></td>
                            <td><?php echo $ele["amount"]; ?></td>

                            <td><?php echo $ele["dateOfTransaction"]; ?></td>
                            <td><?php echo $ele["payee"]; ?></td>
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