
<?php
$time_out = explode(':', $available->quiz_timelimit);
$new_time = (date("Y-m-d h:i:s A", strtotime('+' . $time_out[0] . ' hours +' . $time_out[1] . ' minutes +' . $time_out[2] . ' seconds')));

// Time slot area
date_default_timezone_set('Asia/Kolkata');
$dateFormat = "d F Y -- h:i:s A";
if (isset($_SESSION['targetdate'])) {
    // session variable_exists, use that
    $targetDate = $_SESSION['targetdate'];
} else {
    // No session variable, reed from mysql          
    $targetDate = strtotime($new_time); //$_SESSION['logout_time'];
    $_SESSION['targetdate'] = $targetDate;
}




$actualDate = time();
if (!isset($_SESSION['actualDate'])) {
    $_SESSION['actualDate'] = $actualDate;
}
$actualDateDisplay = date($dateFormat, $actualDate);
$targetDateDisplay = date($dateFormat, $targetDate);

$secondsDiff = $targetDate - $actualDate;
$remainingDay = floor($secondsDiff / 60 / 60 / 24);
$remainingHour = floor(($secondsDiff - ($remainingDay * 60 * 60 * 24)) / 60 / 60);
$remainingMinutes = floor(($secondsDiff - ($remainingDay * 60 * 60 * 24) - ($remainingHour * 60 * 60)) / 60);
$remainingSeconds = floor(($secondsDiff - ($remainingDay * 60 * 60 * 24) - ($remainingHour * 60 * 60)) - ($remainingMinutes * 60));
?> 
<script type="text/javascript">
    var days = <?php echo $remainingDay; ?>;
    var hours = <?php echo $remainingHour; ?>;
    var minutes = <?php echo $remainingMinutes; ?>;
    var seconds = <?php echo $remainingSeconds; ?>;
    function setCountDown()
    {
        seconds--;
        if (seconds < 0) {
            minutes--;
            seconds = 59
        }
        if (minutes < 0) {
            hours--;
            minutes = 59
        }
        if (hours < 0) {
            days--;
            hours = 23
        }

        //  
        document.getElementById("remain").innerHTML = " Time left: - " + minutes + " minutes, " + seconds + " seconds";
        SD = window.setTimeout("setCountDown()", 1000);
        if (minutes == '00' && seconds == '00') {
            seconds = "00";
            window.clearTimeout(SD);
            window.alert("Time is up. Press OK to continue."); // change timeout message as required
            window.location = "<?= site_url('IM/quizchoices/script_next') ?>" // Add your redirect url
        }

    }

</script>
</head>

<body onload="setCountDown();">
    <div class="container">
        <div class="jumbotron" >
            <div class="row" >
                <div class="col-md-9" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <label id="remain">Time left: </label>
                            <label class="pull-right"><?=$_SESSION['question_count']+1?> out of 10</label>
                        </div>
                        <div class="panel-body">
                            <h2><?=$available->quiz_question?></h2><br>
                         <?php echo form_open("IM/quizchoices/form",array('id' => 'quiz_form'));?>
                            <ul>
                                <li><input name="quiz_answer" id="quiz_answer1" value="1" type="radio"/>&nbsp;<label for="quiz_answer1"><h4><?=$available->quiz_ans1?></h4></label></li>
                                <li><input name="quiz_answer" id="quiz_answer2" value="2" type="radio"/>&nbsp;<label for="quiz_answer2"><h4><?=$available->quiz_ans2?></h4></label></li>
                                <li><input name="quiz_answer" id="quiz_answer3" value="3" type="radio"/>&nbsp;<label for="quiz_answer3"><h4><?=$available->quiz_ans3?></h4></label></li>
                                <li><input name="quiz_answer" id="quiz_answer4" value="4" type="radio"/>&nbsp;<label for="quiz_answer4"><h4><?=$available->quiz_ans4?></h4></label></li>
                                <?php if($available->quiz_ans5){ ?><li><input name="quiz_answer" id="quiz_answer5" value="5" type="radio"/>&nbsp;<label for="quiz_answer5"><h4><?=$available->quiz_ans5?></h4></label></li> <?php } ?>
                            </ul>
                            <input type="hidden" name="question_id" value="<?=$available->quiz_id?>">                            
                                <input type="hidden" name="case" value="form">
                                <button type="submit"  class="pull-right btn btn-primary">Next Question</button>	
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>


    </div>
</body>