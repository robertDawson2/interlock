    <p>
        You have a new online applicant!
    </p>
    <p>
        Applicant Information:
        <ul>
            <li style="list-style-type: none;">First name: <?php echo $firstname ?></li>
            <li style="list-style-type: none;">Last name: <?php echo $lastname ?></li>
            <li style="list-style-type: none;">Phone number: <?php echo $phone ?></li>
            <li style="list-style-type: none;">Email: <?php echo $email ?></li>
            <li style="list-style-type: none;">Address: <?php echo $address1 ?></li>
            <?php 
                if (isset($address2)) { ?>
                    <li style="list-style-type: none;">Address 2: <?php echo $address2 ?></li>
            <?php } ?>
            <li style="list-style-type: none;">City: <?php echo $city ?></li>
            <li style="list-style-type: none;">State: <?php echo $state ?></li>
            <li style="list-style-type: none;">Zip: <?php echo $zip ?></li>
            <li style="list-style-type: none;">Position Desired: <?php echo $position ?></li>
            <?php 
                if (isset($referedBy)) { ?>
                    <li style="list-style-type: none;">Refered By: <?php echo $referedBy ?></li>
            <?php } ?>
            <?php 
                if (isset($appliedDate)) { ?>
                    <li style="list-style-type: none;">Applied Before: Yes</li>
                    <li style="list-style-type: none;">Applied On: <?php echo $appliedDate ?></li>
            <?php } else { ?>
                    <li style="list-style-type: none;">Applied Before: No</li>
            <?php } ?>
        </ul>
</p>
<p>
    Resume attached.
</p>        