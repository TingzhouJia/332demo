<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once "../Controller/adoptController.php"; ?>
    <?php include_once "../Controller/fetchAllOrganization.php"; ?>
    <?php include_once "../Config/otherConfig.php"; ?>
    <link rel="stylesheet" href="http://192.168.64.2/SPCA/css/adoption.css" />
    <title>Document</title>
</head>

<?php
//
$animalList =fetchAllAnimals();
?>




<body>
    <?php include "navBar.php" ?>
    <section class="banner banner--image">
        <picture class="banner__picture">
            <source media="(min-width: 1200px)" srcset="https://ontariospca.ca/wp-content/uploads/2019/04/InnerBanner-MYM-Canine-alities.jpg 1200w" sizes="100vw">
            <source media="(min-width: 1024px)" srcset="https://ontariospca.ca/wp-content/uploads/2019/04/InnerBanner-MYM-Canine-alities-1200x250.jpg 768w" sizes="100vw">
            <source media="(min-width: 600px)" srcset="https://ontariospca.ca/wp-content/uploads/2019/04/InnerBanner-MYM-Canine-alities-768x160.jpg 768w" sizes="100vw">
            <img src="https://ontariospca.ca/wp-content/uploads/2019/04/InnerBanner-MYM-Canine-alities-600x125.jpg" alt="InnerBanner-MYM-Canine-alities" class="banner__img">
        </picture>



        <div class="banner1__content">
            <h1 class="banner__title">
                Animals Available for Adoption
            </h1>
        </div><!-- /.banner__content -->
    </section>
    <main class="main" role="main" id="main">
        <div class="page page--page" id="page--863" itemscope="" itemtype="http://schema.org/WebPage" data-template="web-page-right-sidebar.twig">
            <div class="page__content">
                <div class="column__row">
                    <div class="page__body column column--75-100">
                        <p><span style="color: #0076bb; font-family: 'Source Sans Pro', Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 1.22222rem; font-weight: bold;">Searching for your next family member?</span></p>
                        <p>View all cats, dogs and small animals available for adoption through your local Ontario SPCA animal centre below.</p>
                        <p><em>*Looking to adopt a working cat?&nbsp;<a href="https://ontariospca.ca/adopt/working-cat-program/">&nbsp;Click here</a>&nbsp;to learn more.</em></p>
                        <p><strong>The following adoption fees apply to Ontario SPCA animal centres:</strong></p>
                        <p>Cat/Kitten:$100-$175<br>
                            Dog/Puppy: $200-$450<br>
                            Rabbit: $50-$80<br>
                            Rodent: $20-$40<br>
                            Guinea Pigs:&nbsp; Prices vary<br>
                            Bird: Prices vary</p>
                        <p><em>*View cost of care for <a href="https://ontariospca.ca/wp-content/uploads/2019/11/OSPCA_CostOfCaring_Dog_2020-nocrops.pdf" target="_blank" rel="noopener noreferrer">a dog</a> and cost of care for <a href="https://ontariospca.ca/wp-content/uploads/2019/11/OSPCA_CostOfCaring_Cat_2020-nocrops.pdf" target="_blank" rel="noopener noreferrer">a cat.</a></em></p>
                        <hr>
                        <div id="ospca-meet-your-match-app" class="ospca-mym">
                            <div class="ospca-mym-view">
                                <div class="animal-list">
                                    <?php

                                    if (isset($_POST["speciesChoice"]) && isset($_POST["spcaChoice"]) && isset($_POST["yearChoice"]) ) {
                                        $check= isset($_POST["checkChoice"])?$_POST["checkChoice"]:'';
                                      

                                        $animalList = fetchWithCondition(array(
                                            $_POST["speciesChoice"], $_POST["yearChoice"], $_POST["spcaChoice"], $check
                                        ));
                                    }



                                    ?>
                                    <form class="animal-filter__form" name="filtercondition" method="post">
                                        <div class="animal-filter__form__file">
                                            <label>Species Choice</label>
                                            <select name="speciesChoice" class="custom-select">
                                                <option value="no">Pick A Species</option>
                                                <option value="cat">Cat</option>
                                                <option value="dog">Dog</option>
                                                <option value="rabbit">Rabbit</option>
                                                <option value="dodent">Rodent</option>
                                            </select></div>


                                        <div class="animal-filter__form__file">
                                            <label>Year Choice</label>
                                            <select class="custom-select" name="yearChoice">
                                                <option value="no">Pick A Rescue Year</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                            </select></div>
                                        <div class="animal-filter__form__file">
                                            <label>SPCA Choice</label>
                                            <select class="custom-select" name="spcaChoice">
                                                <option value="no"> Pick A SPCA </option>
                                                <?php foreach ($sheterAndSpca as $ele) : ?>
                                                    <option value=<?php echo $ele["name"] ?>><?php echo $ele["name"] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="animal-filter__form__file" style="display: flex;align-items:center;">
                                            <input type="checkbox" name="checkChoice" value="join" />
                                            <span> Animal went from the SPCA directly to a shelter</span>
                                        </div>

                                        <input class="btn-primary" type="submit" value="Filter" />
                                    </form>

                                </div>
                                <div class="animal-list__content">
                                    <?php if(sizeof($animalList)===0):?>
                                        <div style="font-weight: 800;font-size:2rem">No Animal Available For Adopting</div>
                                    <?php else: ?>
                                    <?php foreach ($animalList as $animalInfo) : ?>
                                        <div class="animal">
                                            <div class="animal__photo"><img width="300px" height="300px" src=<?php echo $animalInfo["profile"] ?> class="animal-photo__img"></div>
                                            <div class="animal__info">
                                                <div>
                                                    <div class="animal__name"><span class="animal__info__value"> <?php echo ucfirst($animalInfo["typeOfAnimal"]); ?></span></div>
                                                    <div class="animal__gender"><span class="animal__info__label">Gender:</span> <span class="animal__info__value"><?php echo rand(0, 1) === 1 ? "Male" : "Female"; ?></span></div>
                                                    <div class="animal__gender"><span class="animal__info__label">Rescuer Date:</span> <span class="animal__info__value"><?php echo date('Y-m-d',strtotime($animalInfo["origin_date"])); ?></span></div>
                                                    <div class="animal__breed"><span class="animal__info__label">Price: $</span> <span class="animal__info__value"><?php echo $animalInfo["price"] ?></span></div>
                                                    <div class="animal__age"><span class="animal__info__label">Age:</span> <span class="animal__info__value"><?php echo rand(1, 4) . "Year " . rand(1, 12) . "Months" ?></span></div>
                                                    <div class="animal__suburb"><span class="animal__info__label">Location:</span> <span class="animal__info__value"><?php echo $animalInfo["location"]; ?></span></div>
                                                    <div class="animal__id"><span class="animal__info__label">Animal ID:</span> <span class="animal__info__value"><?php echo $animalInfo["animal_id"]; ?></span></div>
                                                    <!---->
                                                </div>
                                                <div class="animal__profile-link">
                                                    <a href=<?php echo "adoptAnimal.php?id=" . $animalInfo["animal_id"]  ?> class="" target="_blank">
                                                        Meet »
                                                    </a>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- /.page -->
    </main>
    <?php include "footer.php" ?>
</body>

</html>