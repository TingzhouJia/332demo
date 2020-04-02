<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adopt</title>
    <?php include "../Config/otherConfig.php" ?>
    <?php include_once "../model/pdoMysql.class.php" ?>

    <link rel="stylesheet" href="../css/adopt.css" />
</head>
<?php $yearChoice='2018';
$rescued=$MyPDO::getAll("select COUNT(animal_id) as count from Animal where YEAR(origin_date) = '2018'")[0]
?>
<body>
    <?php include "navBar.php" ?>
    <section class="banner banner--image">
        <div class="banner__wrap">
            <picture class="banner__picture">
                <source media="(min-width: 1200px)" srcset="https://ontariospca.ca/wp-content/uploads/2019/04/shutterstock_127259099.jpg 1200w" sizes="100vw">
                <source media="(min-width: 1024px)" srcset="https://ontariospca.ca/wp-content/uploads/2019/04/shutterstock_127259099-1200x349.jpg 768w" sizes="100vw">
                <source media="(min-width: 600px)" srcset="https://ontariospca.ca/wp-content/uploads/2019/04/shutterstock_127259099-768x223.jpg 768w" sizes="100vw">
                <img src="https://ontariospca.ca/wp-content/uploads/2019/04/shutterstock_127259099-600x175.jpg" alt="shutterstock_127259099" class="banner__img">
            </picture>
            <div class="banner__overlay"></div>


            <div class="banner__content">
                <h1 class="banner__title">
                    Adopt
                </h1>
            </div><!-- /.banner__content -->
        </div><!-- /.banner__wrap -->
    </section>
    <main class="main" id="main">

        <div class="page__content">
            <div class="page__body">
                <p class="page_p" style="text-align: left;">If it’s time for a new pet in your life, you will surely find your perfect companion at an Ontario SPCA animal centre. There are so many wonderful pets throughout the province – cats and dogs of all ages, shapes, sizes and breeds, as well as birds, rabbits, guinea pigs and more – waiting, in hope, for a home; someone to share life with, someone to love.</p>

                <div class="tile__wrapper" style="margin-bottom: 5vw">

                    <div class="tile">
                        <h4 class="tile__title">
                            <a href="adoption.php" class="tile__link">
                                Animals Available for Adoption
                            </a>
                        </h4>
                        <picture class="tile__picture">
                            <a href="https://ontariospca.ca/adopt/view-pets-for-adoption/" class="tile__image-link">
                                <img src="https://ontariospca.ca/wp-content/uploads/2019/03/GalleryImage-animal-adoption-1-600x450-600x450-c-default.jpg" class="tile__img" alt="">
                            </a>
                        </picture>
                    </div><!-- /.tile -->
                    <?php 
                    if(isset($_POST["rescueSelect"])){
                        $yearChoice=$_POST["rescueSelect"];
                        $rescued=$MyPDO::find("Animal","YEAR(origin_date) = '".$yearChoice."' ",array("COUNT(animal_id) as sum"))[0];
                    }
                    ?>
                    <div class="tile" style="padding: 2vw">
                        <form class="form-group row" action="#" method="post">
                            <label>Our Total Rescued Animals In <?php echo $yearChoice; ?></label>
                            <select class="custom-select" name="rescueSelect" style="margin-bottom: 1vw">
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
                            <input class="btn btn-primary mb-2" type="submit" value="filter" />
                        </form>
                        <p>We Rescued <?php echo isset($rescued["count"])?$rescued["count"]:0; ?> Animals In This Year!!!</p>
                    </div><!-- /.tile totoal rescued in each year -->

                    
                
            </div><!-- /.page__body -->



           
        </div><!-- /main__container -->


    </main>
    <?php include "footer.php"; ?>
</body>

</html>