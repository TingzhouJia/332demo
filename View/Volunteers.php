<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://192.168.64.2/SPCA/css/volunteer.css" />
    <?php include "otherConfig.php" ?>
    <title>Document</title>
</head>

<body>
    <section>
    <?php include "navBar.php"; ?>
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
                    <li>branch 1</li>
                </ul>
                <span class="branch_list_title">Shelters:</span>
                <ul>
                    <li>Shelter 1</li>
                </ul>
                <span class="branch_list_title">Rescuers:</span>
                <ul>
                    <li>Rescuer 1</li>
                </ul>
            </div>
            <div class="volunteer_list">
                <h3 class="volunteer_h3">Volunteer List</h3>
                <form method="post" action="" id="filter_list">
                    <div class="filter_item">
                        <label>Employee Type:</label>
                        <select>
                            <option>pick either employee or driver</option>
                            <option> employee </option>
                            <option> driver</option>
                        </select>
                    </div>
                    <div class="filter_item">
                        <label>SPCA Type:</label>
                        <select>
                            <option>pick an location</option>
                            <option> Branch </option>
                            <option> Shelter</option>
                            <option> Rescuer</option>
                        </select>
                    </div>
                    <input type="submit" value="filter" class="btn-primary filter_form_btn" />
                </form>
                <!-- table for all employee -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone-number</th>
                            <th scope="col">Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
                <!-- table for driver -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Phone-number</th>
                            <th scope="col">Location</th>
                            <th scope="col">License Plate</th>
                            <th scope="col">License</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <?php include "footer.php"; ?>
    </section>
</body>

</html>