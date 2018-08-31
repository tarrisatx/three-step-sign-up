<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <title>3 Step Process</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/jquery.steps.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row"> 
                <div class="col-md-12">
                    <div id="orderConfirmed"></div>
                </div>
        </div>
    </div>
    <form id="my-form" action="process.php" method="post" class="ajax">
        <div class="container">
            <h3>Product Selection</h3>
            <section>
            <div class="row quantity-titles">
               
                <div class="col-md-3">
                    <div class="form-group">
                    <input type="checkbox" id="checkbox_one" name="cbgroup" data-trigger="hidden_fields_one" class="trigger">    
                    <label for="checkbox_one">Rackspace Email </label>
                    <span class="price-summary">($2 per mailbox per month)</span>
                </div>
                
                <div id="hidden_fields_one" class="hidden">
                    <label for="hidden_one">QTY</label>
                        <input class="form-control text-center col-sm-3" type="number" id="hidden_one" name="quantity">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                    <input type="checkbox" id="checkbox_two" name="cbgroup" data-trigger="hidden_fields_two" class="trigger">
                        <label for="checkbox_two">Rackspace Email Plus</label>
                        <span class="price-summary"> ($3.50 per mailbox per month)</span>
                </div>
                    <div id="hidden_fields_two" class="hidden">
                    <label for="hidden_two">QTY</label>
                     <input class="form-control text-center col-sm-3" type="number" id="hidden_two" name="quantity">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                    <input type="checkbox" id="checkbox_three" name="cbgroup" data-trigger="hidden_fields_three" class="trigger">
                        <label for="checkbox_three"> Microsoft Exchange</label>
                        <span class="price-summary">($7.99 per mailbox per month)</span> 
                </div>
                    <div id="hidden_fields_three" class="hidden">
                    <label for="hidden_three">QTY</label>
                     <input class="form-control text-center col-sm-3" type="number" id="hidden_three" name="quantity">
                    </div>
                </div>

                <div class="col-md-3">
                <p>Total Mailboxes</p> <output id="totalQuantity"></output>
                <input type="hidden" id="mailboxes" name="mailboxes">
                </div>

            </section>
            <h3>Checkout</h3>
            <section class="hide-labels">
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Firstname *</label>
                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_lastname">Lastname *</label>
                    <input id="form_lastname" type="text" name="lname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">Email Address*</label>
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_password">Password *</label>
                    <input id="form_password" type="password" name="password" class="form-control" id="masterpass" placeholder="Please enter a password *" required="required" data-error="Valid password is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_password2">Password Confirmation *</label>
                    <input id="form_password2" type="password" name="passconfirm" class="form-control" placeholder="Confirm password *" required="required" data-error="Password not matching.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ccard">Credit Card * ex: 4112344112344113</label>
                    <input id="ccard" type="text" name="ccard" class="form-control" placeholder="Credit card *" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="expmonth">Expiration Month *</label>
                    <select name="expmonth" id="expmonth" class="form-control" required="required" data-error="Enter valid month.">
                    <option value="" selected="selected">Month</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    </select>    
                    <div class="help-block with-errors"></div>
                </div>
            </div>


            <div class="col-md-2">
                <div class="form-group">
                    <label for="expyear">Expiration Year *</label>
                    <select name="expyear" id="expyear" class="form-control" required="required" data-error="Enter valid year.">
                    <option value="" selected="selected">Year</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    </select>    
                    <div class="help-block with-errors"></div>
                </div>
            </div>


            <div class="col-md-2">
                <div class="form-group">
                    <label for="form_cvv">CVV code *</label>
                    <input id="form_cvv" type="number" name="cvv" class="form-control" placeholder="CVV Code *" required="required" data-error="Valid CVV code is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>


<div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_baddress">Billing Address *</label>
                    <input id="form_baddress" type="text" name="baddress" class="form-control" placeholder="Address *" required="required" data-error="Valid address is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="form_bcity">Billing City *</label>
                    <input id="form_bcity" type="text" name="bcity" class="form-control" placeholder="City *" required="required" data-error="Valid city is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label for="form_bstate">Billing State *</label>
                    <input id="form_bstate" type="text" name="bstate" class="form-control" placeholder="State *" required="required" data-error="Valid state is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="form_bzip">Billing Zip *</label>
                    <input id="form_bzip" type="number" name="bzip" class="form-control" placeholder="Zip *" required="required" data-error="Valid Zip is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>You may use these sample credit cards for testing:</p>
                <p>Visa: 4112344112344113</p>
                <p>Mastercard: 5112345112345114</p>
                <p>Discover: 6011111111111117</p>
                <p>American Express: 378282246310005</p>
            </div>
        </div>
            </section>
            <h3>Confirmation</h3>
            <section>     
                <h1 class="text-center">Order Review</h1>
                <div id="results"></div>
            </section>
            
        </div>
    </form>
  
    <script src="js/jquery.js"></script>
    
    <script src="js/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="js/jquery.steps.js"></script>
    <script src="js/script.js"></script>
</body>
</html>