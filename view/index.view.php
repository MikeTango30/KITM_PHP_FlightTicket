<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="view/css/bootstrap.min.css">
    <!--  Bootstrap override-->
    <link rel="stylesheet" type="text/css" href="view/css/styles.css">
    <title><?=SITE_NAME?></title>
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1><?=TABLE_TITLE?></h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <form method="post">
                <div class="form-group">
                    <label for="flightNumber">Flight Number</label>
                    <select name="flightNumber" id="flightNumber" class="form-control">-->
                        <option selected disabled>-- Select --</option>
                        <?php foreach ($flightsData["flightNumbers"] as $flightNumber):?>
                            <option value="<?=$flightNumber?>"><?=$flightNumber?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="personId">Person ID</label>
                    <input type="number" class="form-control" id="personId" name="personId" placeholder="Person ID">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label for="from">From</label>
                    <select name="from" id="from" class="form-control">-->
                        <option selected disabled>-- Select --</option>
                        <?php foreach ($flightsData["from"] as $from):?>
                            <option value="<?=$from?>"><?=$from?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="flightNumber">To</label>
                    <select name="to" id="to" class="form-control">-->
                        <option selected disabled>-- Select --</option>
                        <?php foreach ($flightsData["to"] as $to):?>
                            <option value="<?=$to?>"><?=$to?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price">
                </div>
                <div class="form-group">
                    <label for="luggageWeight">Luggage weight</label>
                    <input type="number" class="form-control" id="luggageWeight" name="luggageWeight" placeholder="Luggage Weight">
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea type="text" contenteditable="true" class="form-control" id="comments" name="comments" placeholder="Comments..."></textarea>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#flightTicket">
                    Print Flight Ticket
                </button>
            </form>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="flightTicket" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Flight Ticket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="container ticket-container">
                                <div class="row ticket-flight-info">
                                    <div class="col-8 flight-info">
                                        <div class="row">
                                            <div class="col-4 flight-number">
                                                <?=htmlspecialchars($_POST["flightNumber"])?>
                                            </div>
                                            <div class="col-8 from-to">
                                                <div class="row from">
                                                    <div class="col-4">
                                                        FROM:
                                                    </div>
                                                    <div class="col-8 from">
                                                        <?=htmlspecialchars($_POST["from"])?>
                                                    </div>
                                                </div>
                                                <div class="row to">
                                                    <div class="col-4">
                                                        TO:
                                                    </div>
                                                    <div class="col-8 to">
                                                        <?=htmlspecialchars($_POST["to"])?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row client-info">
                                            <div class="col-4 client-name">
                                                Customer: <?=htmlspecialchars($_POST["name"])." ".htmlspecialchars($_POST["lastName"])?>
                                            </div>
                                            <div class="col-4 client-Id">
                                                ID: <?=htmlspecialchars($_POST["personId"])?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 ticket-price-info">
                                        <div class="row">
                                            Ticket Price: <?=htmlspecialchars($_POST["price"])." EUR + VAT(21%): ".htmlspecialchars($_POST["price"])*VAT?> EUR
                                        </div>
                                        <div class="row price-luggage">
                                            <?php
                                            $luggagePrice = 0;
                                            if (htmlspecialchars($_POST["luggageWeight"]) > LUGGAGE_LIMIT) {
                                                $luggagePrice = LUGGAGE_OVER;
                                            }
                                            ?>
                                            Luggage price: <?=$luggagePrice?> EUR
                                        </div>
                                        <div class="row">
                                            <?php
                                            $totalPrice = ($_POST["price"]) + $_POST["price"] * VAT +
                                                $luggagePrice?>
                                            Total price: <?=$totalPrice?> EUR
                                        </div>
                                    </div>
                                </div>
                                <div class="row comment">
                                    Additional comments: <?=htmlspecialchars($_POST["comments"])?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Print ticket</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        /*
         *  Skrydžio nr,+
 asmens kodas,
 vardas, pavardė,
 iš kur skrendą,+
 į kur skrenda,+
 kaina, bagažas,
 pastabos
         */
        if(isset($_POST["submit"])) {
            foreach ($_POST as $value) {
//                  echo htmlspecialchars($value)."</br>";
            }
        }
        ?>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>
</html>