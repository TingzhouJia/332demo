<html lang="en">
<?php $host=$_SERVER['HTTP_HOST'];?>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once "../Controller/adoptController.php"; ?>
    <?php include_once "../Config/otherConfig.php"; ?>
    <?php include_once "../Controller/fetchAllOrganization.php"; ?>
    <?php include_once "../Controller/volunteerController.php"; ?>
    <link rel="stylesheet" href="../css/adoption.css" />
    
    <link rel="stylesheet" href="../css/adoptAnimal.css" />

    <title>Document</title>
</head>
<?php

$id = $_GET["id"];
$dirverList = getEmployee("driver");
$animalInfo = specificOne($id)[0];
$vetList=getVets($id);

?>

<body>
    <script>
        var jq = $.noConflict();
        jq(document).ready(function() {
            jq("#adopt_me").click(function() {
                jq("#adopt_select").addClass("adopt_form")
                jq("#adopt_check").addClass("adopt_form")
                jq("#adopt_form").removeClass("adopt_form")
            })
            jq("#move_me").click(function() {
                jq("#adopt_select").removeClass("adopt_form")
                jq("#adopt_form").addClass("adopt_form")
                jq("#adopt_check").addClass("adopt_form")

            })
            jq("#check_me").click(function() {
                jq("#adopt_select").addClass("adopt_form")
                jq("#adopt_form").addClass("adopt_form")
                jq("#adopt_check").removeClass("adopt_form")

            })

        });
    </script>
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
                </div>
                <div class="animal-profile">

                    <div class="animal-profile__photos">
                        <div class="animal-photo-slider">
                            <div class="animal-photo-slider__photos">
                                <img width="300px" height="300px" src=<?php echo $animalInfo["profile"] ?> class="photos__photo--active">
                            </div>
                        </div>
                    </div>
                    <div class="animal-profile__info">

                        <div class="animal-profile__info__top__bio" style="margin-bottom: 2vw">
                            <div class="animal__name">
                                <!----> <span class="animal__info__value">Hi! I'm A <?php echo ucfirst($animalInfo["typeOfAnimal"]) ?></span></div>
                            <div class="animal__summary">
                                <!----> <span class="animal__info__value"></span></div> <a href="https://ontariospca.ca/adopt/meet-your-match/feline-ality/meet-the-feline-alities/" target="_blank" class="animal__lean-more-about-color-link">Learn More about Purple Cats &amp; MYM</a>
                            <div class="animal__gender"><span class="animal__info__label">Gender</span> <span class="animal__info__value">Male</span></div>
                            <div class="animal__gender"><span class="animal__info__label">Rescuer Date:</span> <span class="animal__info__value"><?php echo date('Y-m-d', strtotime($animalInfo["origin_date"])); ?></span></div>
                            <div class="animal__breed"><span class="animal__info__label">Price: $</span> <span class="animal__info__value"><?php echo $animalInfo["price"] ?></span></div>
                            <div class="animal__age"><span class="animal__info__label">Age:</span> <span class="animal__info__value"><?php echo rand(1, 4) . "Year " . rand(1, 12) . "Months" ?></span></div>
                            <div class="animal__suburb"><span class="animal__info__label">Location:</span> <span class="animal__info__value"><?php echo $animalInfo["address"]; ?></span></div>
                            <div class="animal__id"><span class="animal__info__label">Animal ID:</span> <span class="animal__info__value"><?php echo $animalInfo["animal_id"]; ?></span></div>

                            <div class="animal-meet-me"><a href="https://www.google.com/maps?q= Ontario%20SPCA%20-%20Leeds%20%26%20Grenville%20Animal%20Centre%20800%20Centennial%20Road%2C%20R.R%204%20Brockville%20Ontario%20K6V%205T4" target="_blank">Come Meet Me!</a></div>
                            </span>
                        </div>
                        <div class="animal__contact"><span class="animal__info__label">Contact</span> <span class="animal__info__value"><a href="tel:+1 613-345-5520"><?php echo $animalInfo["phone_number"] ?></a></span></div>
                        <!---->

                        <div class="animal-profile__info__top__additional">
                            <div class="share-url share-url--horizontal"><span class="share-url__label">Sharing is Caring</span>
                                <div class="share-url__icons"><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fontariospca.ca%2Fadopt%2Fview-pets-for-adoption%2F%3FmymShareId%3D225371%23%2Fanimal%2F225371" target="_blank" class="share-url__icons__icon"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSI3MiIgdmlld0JveD0iMCAwIDcyIDcyIiB3aWR0aD0iNzIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cmVjdCBmaWxsPSIjNDQ2MEEwIiBoZWlnaHQ9IjcyIiByeD0iOCIgd2lkdGg9IjcyIi8+PHBhdGggZD0iTTYwLjQ2NDE0NjMsMTMuNDE3MzE3MSBMNjAuNDY0MTQ2MywyMi43Mjc4MDQ5IEw1NC45MzgyOTI3LDIyLjc0MjE5NTEgQzUwLjYwNjgyOTMsMjIuNzQyMTk1MSA0OS43NzIxOTUxLDI0LjggNDkuNzcyMTk1MSwyNy44MDc1NjEgTDQ5Ljc3MjE5NTEsMzQuNDcwMjQzOSBMNjAuMDksMzQuNDcwMjQzOSBMNTguNzUxNzA3Myw0NC44ODg3ODA1IEw0OS43NzIxOTUxLDQ0Ljg4ODc4MDUgTDQ5Ljc3MjE5NTEsNzIgTDM5LjAwOTczMTcsNzIgTDM5LjAwOTczMTcsNDQuODg4NzgwNSBMMzAsNDQuODg4NzgwNSBMMzAsMzQuNDcwMjQzOSBMMzkuMDA5NzMxNywzNC40NzAyNDM5IEwzOS4wMDk3MzE3LDI2Ljc4NTg1MzcgQzM5LjAwOTczMTcsMTcuODYzOTAyNCA0NC40NDc4MDQ5LDEzIDUyLjQyLDEzIEM1Ni4yMjA0NjM0LDEzIDU5LjUsMTMuMjg3ODA0OSA2MC40NjQxNDYzLDEzLjQxNzMxNzEgWiIgZmlsbD0iI0ZGRiIvPjwvZz48L3N2Zz4="></a> <a href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fontariospca.ca%2Fadopt%2Fview-pets-for-adoption%2F%3FmymShareId%3D225371%23%2Fanimal%2F225371" target="_blank" class="share-url__icons__icon"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSI3MiIgdmlld0JveD0iMCAwIDcyIDcyIiB3aWR0aD0iNzIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNOCw3MiBMNjQsNzIgQzY4LjQxODI3OCw3MiA3Miw2OC40MTgyNzggNzIsNjQgTDcyLDggQzcyLDMuNTgxNzIyIDY4LjQxODI3OCwtOC4xMTYyNDUwMWUtMTYgNjQsMCBMOCwwIEMzLjU4MTcyMiw4LjExNjI0NTAxZS0xNiAtNS40MTA4MzAwMWUtMTYsMy41ODE3MjIgMCw4IEwwLDY0IEM1LjQxMDgzMDAxZS0xNiw2OC40MTgyNzggMy41ODE3MjIsNzIgOCw3MiBaIiBmaWxsPSIjNERDOEYxIi8+PHBhdGggZD0iTTU1LjA4NjUzOTksMjUuNzE0ODc1NCBDNTUuNzA4MDkzOCwzOS41NjU5NzM4IDQ1LjM3OTkyMDQsNTUuMDA5Mjg3OSAyNy4wOTUzODU1LDU1LjAwOTI4NzkgQzIxLjUzNDQyNDMsNTUuMDA5Mjg3OSAxNi4zNTc5NTM3LDUzLjM3ODE1MTMgMTIsNTAuNTg0MTA3MyBDMTcuMjIzNjQ3NCw1MS4xOTk3NjQxIDIyLjQzOTAzODgsNDkuNzUxNDM3NCAyNi41Nzg3OTk5LDQ2LjUwNTY3NiBDMjIuMjcwMzgxOCw0Ni40MjY2NTQ5IDE4LjYzMzA1MzIsNDMuNTc5NTM3MSAxNy4zODA1MTAxLDM5LjY2NzQwMzggQzE4LjkyMzE5MDMsMzkuOTYyMjU4NiAyMC40NDExMDI4LDM5Ljg3NjE2MSAyMS44MjY5MjAyLDM5LjQ5OTkyNjMgQzE3LjA5MDM3MywzOC41NDY5NTU2IDEzLjgyMjIwMjYsMzQuMjgwOTk2NiAxMy45MjgzNTAzLDI5LjcxOTAwMzQgQzE1LjI1NjM3NjIsMzAuNDU2MTQwNCAxNi43NzU0NjgxLDMwLjg5OTYwMTkgMTguMzkwMDkyOSwzMC45NDkxMzc1IEMxNC4wMDM4MzMxLDI4LjAxOTQ2MDQgMTIuNzYxOTA0OCwyMi4yMjg1MTI1IDE1LjM0MjQ3MzgsMTcuODAyMTUyNCBDMjAuMTk4MTQyNCwyMy43NjA1Nzc5IDI3LjQ1MzkyODksMjcuNjgwOTY3MSAzNS42MzkwOTc3LDI4LjA5MjU4NDQgQzM0LjIwMzc0NDcsMjEuOTMxMjk4OCAzOC44NzY2MDMzLDE2IDQ1LjIzMjQ5MywxNiBDNDguMDY1NDU3OCwxNiA1MC42MjQ3OTczLDE3LjE5NDc1MTYgNTIuNDE5ODczMiwxOS4xMDg5NDg4IEM1NC42NjMxMjg0LDE4LjY2Nzg0NjEgNTYuNzcwNzUwNCwxNy44NDgxNDk4IDU4LjY3MzE1MzUsMTYuNzE5NDQ1NyBDNTcuOTM4Mzc1NCwxOS4wMTkzMTMgNTYuMzc2ODI0NCwyMC45NTAwMjIxIDU0LjM0MzUwNTgsMjIuMTY3MTgyNyBDNTYuMzM1NTQ0NywyMS45MzAxMTk0IDU4LjIzMzIzMDEsMjEuNDAwNTYwMiA2MCwyMC42MTc0MjU5IEM1OC42ODAyMywyMi41OTI5NTMgNTcuMDEwMTcyNSwyNC4zMjY2OTkxIDU1LjA4NjUzOTksMjUuNzE0ODc1NCIgZmlsbD0iI0ZGRiIvPjwvZz48L3N2Zz4="></a> <a href="mailto:friend@example.com?subject=Check this out!&amp;body=https://ontariospca.ca/adopt/view-pets-for-adoption/?mymShareId=225371#/animal/225371" class="share-url__icons__icon"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSI3MiIgdmlld0JveD0iMCAwIDcyIDcyIiB3aWR0aD0iNzIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNOCw3MiBMNjQsNzIgQzY4LjQxODI3OCw3MiA3Miw2OC40MTgyNzggNzIsNjQgTDcyLDggQzcyLDMuNTgxNzIyIDY4LjQxODI3OCwtOC4xMTYyNDUwMWUtMTYgNjQsMCBMOCwwIEMzLjU4MTcyMiw4LjExNjI0NTAxZS0xNiAtNS40MTA4MzAwMWUtMTYsMy41ODE3MjIgMCw4IEwwLDY0IEM1LjQxMDgzMDAxZS0xNiw2OC40MTgyNzggMy41ODE3MjIsNzIgOCw3MiBaIiBmaWxsPSIjMDAwIi8+PHBhdGggZD0iTTE4LDI2LjE2MjMyMjYgTDE4LDQ2LjU0NzYxMjkgQzE4LDQ3LjY1NjY0NTIgMTguODExNzQxOSw0OC41NTU0ODM5IDE5LjkzMDA2NDUsNDguNTU1NDgzOSBMNTEuNzQ0Nzc0Miw0OC41NTU0ODM5IEM1Mi44NjE5MzU1LDQ4LjU1NTQ4MzkgNTMuNjc0ODM4Nyw0Ny42NDYxOTM1IDUzLjY3NDgzODcsNDYuNTQ3NjEyOSBMNTMuNjc0ODM4NywyNi4xNjIzMjI2IEM1My42NzQ4Mzg3LDI0Ljk0NTI5MDMgNTIuOTQ3ODcxLDI0IDUxLjc0NDc3NDIsMjQgTDE5LjkzMDA2NDUsMjQgQzE4LjY4MDUxNjEsMjQgMTgsMjQuOTY4NTE2MSAxOCwyNi4xNjIzMjI2IE0yMC45MzM0MTk0LDI3LjkzNzkzNTUgQzIwLjkzMzQxOTQsMjcuNDQ2NzA5NyAyMS4yMzA3MDk3LDI3LjE2NTY3NzQgMjEuNzA1Njc3NCwyNy4xNjU2Nzc0IEMyMS45OTk0ODM5LDI3LjE2NTY3NzQgMzMuNTYwMTI5LDM0LjQ5MTA5NjggMzQuMjYwMzg3MSwzNC45MjA3NzQyIEwzNi4wNjk2Nzc0LDM2LjA0NjA2NDUgQzM2LjY0MzM1NDgsMzUuNjYxNjc3NCAzNy4yMTkzNTQ4LDM1LjMzMzAzMjMgMzcuODEzOTM1NSwzNC45MzQ3MDk3IEMzOS4wMjc0ODM5LDM0LjE1ODk2NzcgNDkuODI1MTYxMywyNy4xNjU2Nzc0IDUwLjEyMjQ1MTYsMjcuMTY1Njc3NCBDNTAuNTk4NTgwNiwyNy4xNjU2Nzc0IDUwLjg5NDcwOTcsMjcuNDQ2NzA5NyA1MC44OTQ3MDk3LDI3LjkzNzkzNTUgQzUwLjg5NDcwOTcsMjguNDU4MTkzNSA0OS44OTI1MTYxLDI4Ljk3NDk2NzcgNDkuMjM5ODcxLDI5LjM3MzI5MDMgQzQ1LjEzOTM1NDgsMzEuODcyMzg3MSA0MS4wNCwzNC41OTY3NzQyIDM2Ljk4MDEyOSwzNy4xODg3NzQyIEMzNi43NDMyMjU4LDM3LjM0OTAzMjMgMzYuMjg0NTE2MSwzNy42OTE2MTI5IDM1Ljk0MDc3NDIsMzcuNjM5MzU0OCBDMzUuNTU3NTQ4NCwzNy41ODAxMjkgMjMuNzkzNjc3NCwzMC4wMjI0NTE2IDIxLjY1MzQxOTQsMjguNzYzNjEyOSBDMjEuMzMxNzQxOSwyOC41NzQzMjI2IDIwLjkzMzQxOTQsMjguNDAxMjkwMyAyMC45MzM0MTk0LDI3LjkzNzkzNTUiIGZpbGw9IiNGRkYiLz48L2c+PC9zdmc+"></a></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST["driverChoice"]) && isset($_POST["locationChoice"])) {
                        echo MoveAnAnimal($_POST["driverChoice"], $_POST["locationChoice"], $id);
                    }

                    if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["phone"]) && isset($_POST["address"])) {
                        $name = $_POST["first_name"] . " " . $_POST["last_name"];
                        echo AdoptAnAnimal($name, $_POST["address"], $_POST["phone"], $id, $_POST["amountAdopt"]);
                    }

                    ?>
                    <!-- third part -->
                    <div class="third_part">
                        <div class="animal-profile__info__bottom">
                            <div class="animal-profile__buttons">
                                <a href="javascript:void(0);" class="button-link" id="check_me">Check My Health</a>
                                <a href="javascript:void(0);" class="button-link" id="adopt_me">Adopt Me</a>
                                <a href="javascript:void(0);" class="button-link" id="move_me">Move to Another Location</a>
                            </div>
                        </div>
                        <section class="adopt_form" id="adopt_select">
                            <h3 style="padding-left:1vw">Do You Want to Move Me to Another Location?</h3>

                            <form name="Move_form" class="form-group" action="#" method="post">

                                <div class="form-group col-md-6">
                                    <label>Pick A Location You Want to Move</label>
                                    <select class="custom-select" style="margin-bottom: 2vw" name="locationChoice">
                                        <option>Move to A Location</option>
                                        <?php foreach ($shelterAndRescuer as $ele) : ?>
                                            <option value=<?php echo $ele["name"]; ?>><?php echo $ele["name"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Pick A Driver You Want to Move</label>
                                    <select class="custom-select" style="margin-bottom: 2vw" name="driverChoice">
                                        <option>Pick A Driver to Transport</option>
                                        <?php foreach ($dirverList as $ele) : ?>
                                            <option value=<?php echo $ele["name"]; ?>><?php echo $ele["name"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                                <div class="form_item">
                                    <label>Amount</label>
                                    <input type="text" name="amount" class="form-control" value=<?php echo $animalInfo["price"] ?> readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="submit" class="btn-primary" value="submit" />
                                </div>
                            </form>
                        </section>
                        <section class="adopt_form" id="adopt_form">
                            <h3 style="font-weight: 700;padding-left:2vw;">The Adoption Form </h3>
                            <form class="adoptAnimal_form" name="AdoptForm" action="#" method="post">
                                <div class="form_item">
                                    <label>FirstName</label>
                                    <input type="text" class="form-control" name="first_name" required="required" />
                                </div>
                                <div class="form_item">
                                    <label>LastName</label>
                                    <input type="text" class="form-control" name="last_name" required="required" />
                                </div>
                                <div class="form_item">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" name="phone" required="required" />
                                </div>
                                <div class="form_item">
                                    <label>Current Address</label>
                                    <input type="text" class="form-control" name="address" required="required" />
                                </div>
                                <div class="form_item">
                                    <label>Amount</label>
                                    <input type="text" name="amountAdopt" class="form-control" value=<?php echo $animalInfo["price"] ?> readonly />
                                </div>
                                <input type="submit" value="submit" class="btn-primary" />
                            </form>
                        </section>
                        <section id="adopt_check" class="adopt_form">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <?php foreach(array_keys($vetList[0]) as $ele): ?>
                                        <th scope="col"><?php echo $ele; ?></th>
                                        <?php endforeach; ?>
                                       
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($vetList as $ele) : ?>
                                       
                                     
                                        <tr>
                                        <?php foreach(array_values($ele) as $each): ?>
                                            <td><?php echo $each; ?></td>
                                        <?php endforeach;?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>

        </div>
        </div><!-- /.page -->
    </main>
    <?php include "footer.php" ?>
</body>

</html>