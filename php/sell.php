<?php include('header.php'); ?>

<h1>Fill out the form below and get <strong>Cash</strong> for your car in <em>no time!</em></h1>
<form action="process_sell.php" method='post' id='sell-form'>
    
    <fieldset>
        <label for="make">Car Make (Ex: Honda, Toyota, Ford, etc</label>
        <input required type="text" name='make' placeholder="Honda">
        
        <label for="model">Car Model (Ex: Accord, Mustang, LaFerrari, etc)</label>
        <input required type="text" name='model' placeholder="Accord">
        
        <label for="price">Sell Price in US dollars</label>
        <input required type="text" name='price' placeholder="20000">
        
    </fieldset>
    <fieldset>
        <label for="mileage">Car's current mileage</label>
        <input required type="text" name='mileage' placeholder='50123'>

        <label for="year">Car's Year</label>
        <input required type="text" name='year' placeholder='2012'>

        <label for="color">Car's color</label>
        <input required type="text" name='color' placeholder='green'>

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