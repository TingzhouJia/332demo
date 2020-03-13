<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include "../Config/otherConfig.php"; ?>
    <?php include '../Controller/Donation.php';?>
    <link rel="stylesheet" href="http://192.168.64.2/SPCA/css/donor.css" />

    <title>Donor</title>
</head>
<?php $res=findDonorYear(date("Y"))[0];

$donor=findDonor("Tingzhou Jia");
$allDonor=findAllDonor();
$totalAmount=0;
foreach($donor as $ele){
    $totalAmount+=$ele["amount"];
}


?>
<body>
    <section>
        <?php include "navBar.php"; ?>
        <section class="donor_body">
            <div class="show_list">
                <form class="show_form" action="#" method="post">
                    <h3>Total Year Donation</h3>
                    <select class="custom-select donor_select" name="yeardonate">
                        <option selected>Pick A Year</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                    </select>
                    <button class="btn-primary">filter</button>
                </form>
                <?php
                if(isset($_POST["yeardonate"])){
                    $donation=$_POST["yeardonate"];
                    $res=findDonorYear($donation)[0];
                    
                }
                ?>
                <div class="show_content">
                    <h3>Money Donated In <?php echo isset($donation)?$donation:date("Y"); ?></h3>
                    <div class="show_circle">
                        <?php echo $res["count"];?> Person-Times
                    </div>

                    <div class="show_circle">$ <?php echo $res["amount"]; ?></div>
                </div>

            </div>
            <div class="donor_list">
                <div class="find_donor">


                    <form class=" my-2 my-lg-0 form_donor" action="#" name="donor_form">
                        <h3>Find A Donor</h3>
                        <select class="custom-select" name="yeardonate">
                        <?php foreach($donorList as $ele): ?>
                            <option value=<?php echo $ele["payer"]; ?>><?php echo $ele["payer"]; ?></option>
                        <?php  endforeach; ?>
                        
                        </select>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <span class="donor_each">Total Amount Donated By <?php echo $donor[0]['payer']; ?></span>
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
                        <?php foreach($donor as $ele): ?>
                        <tr>
                            <th scope="row"><?php echo $ele["payment_id"];?></th>
                            <td><?php echo $ele["amount"];?></td>
                            <td><?php echo $ele["payee"];?></td>
                            <td><?php echo $ele["dateOfTransaction"];?></td>
                        </tr>
                        <?php endforeach; ?>
                       
                    </tbody>
                </table>
            </div>
            <h2>Donor List</h2>
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
                <?php foreach($allDonor as $ele): ?>
                    <?php $sep=explode(" ",$ele["payer"]) ?>
                        <tr>
                            <th scope="row"><?php echo $ele["payment_id"];?></th>
                            <td><?php echo $sep[0];?></td>
                            <td><?php echo $sep[1];?></td>
                            <td><?php echo $ele["amount"];?></td>
                            
                            <td><?php echo $ele["dateOfTransaction"];?></td>
                            <td><?php echo $ele["payee"];?></td>
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