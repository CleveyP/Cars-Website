<?php include('header.php'); ?>

<h1 id='sell-h1'>Fill out the form below and get <strong>Cash</strong> for your car in <em>no time!</em></h1>
<form action="process_sell.php" method='post' id='sell-form' enctype="multipart/form-data">
    
    <fieldset>
        <label for="make">Car Make </label>
        <input required type="text" name='make' placeholder=" ex: Honda">
        
        <label for="model">Car Model </label>
        <input required type="text" name='model' placeholder="ex: Accord">
        
        <label for="price">Selling Price</label>
        <input required type="text" name='price' placeholder=" ex: 20000">
        
    </fieldset>
    <fieldset>
        <label for="mileage">Car Mileage</label>
        <input required type="text" name='mileage' placeholder='ex: 50123'>

        <label for="year">Car Year</label>
        <input required type="text" name='year' placeholder='ex: 2012'>

        <label for="color">Car color</label>
        <input required type="text" name='color' placeholder='ex: green'>

        <label for="new">New Car</label>
        <input type="radio" id="new-radio" name="new/used" value="new">
        <label for="used">Used Car</label>
        <input type="radio" id="used-radio" name="new/used" value="used">
    </fieldset>
    <fieldset>
        <label for="car-photo"></label>
        <input type="file" name='car-photo'>
    </fieldset>
    <button type="submit">Submit!</button>
</form>



<?php include('footer.php'); ?>