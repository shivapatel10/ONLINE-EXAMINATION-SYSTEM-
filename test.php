<?php include 'inc/header.php'; ?>
<?php
 Session::checkSession();
 if (isset($_GET['q'])) {
    $quesnumber = (int) $_GET['q'];
 }else{
    header("Location:exam.php");
 }
 $total    = $exam->getTotalRows();
 $question = $exam->getQuestionNumber($quesnumber);
?>
<?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $process = $pro->getProcessData($_POST);
 }
?> 
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Question <?php echo $question['quesNo']." of ". $total; ?></h1>
                <br/>
                <br/>
            </div>
              <div class="col-lg-3">
                </div>
               <div class="col-lg-6">
                <form method="post" action="">
                    <table>
                        <tr>
                            <td colspan="2">
                                <h3>Question <?php echo $question['quesNo']." : ".$question['ques']; ?></h3>
                            </td>
                        </tr>
                        <?php
                        $answer = $exam->getAnswer($quesnumber);
                        if ($answer) {
                            while ($result = $answer->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" name="ans" class="form-check-input" value="<?php echo $result['id']; ?>" /><?php echo $result['ans']; ?>
                                            </label>
                                        </div>
<!--                                        <input type="radio" name="ans" value="--><?php //echo $result['id']; ?><!--" />--><?php //echo $result['ans']; ?>
                                    </td>
                                </tr>
                            <?php } } ?>
                        <tr>
                            <td>
                                <br/>
                                <input type="submit" name="submit" class="btn btn-primary" value="Continue" />
                                <input type="hidden" name="quesnumber"
                                       value="<?php echo $quesnumber; ?>" />
                            </td>
  </tr>
                    </table>
                </form>
                <br/>
                <br/>
            </div>
  <div class="col-lg-3"
            </div>
        </div>
    </div>

VIEWANS
<?php include 'inc/header.php'; ?>
<?php
 Session::checkSession();
$total    = $exam->getTotalRows(); 
?>

<div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">All Question & Answer - Total <?php echo $total; ?> Questions</h1>
                <br/>
                <br/></div>

                <div class="col-lg-3">
                
                </div>

                <div class="col-lg-6">
                    <table>
                        <?php
                        $getQues = $exam->getqueData();
                        if ($getQues) {
                            while ($question = $getQues->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td colspan="2">
                                        <h5>Ques. <?php echo $question['quesNo']." : ".$question['ques']; ?></h5>
                                    </td>
                                </tr>
                                <?php
                                $quesnumber = $question['quesNo'];
                                $answer = $exam->getAnswer($quesnumber);
                                if ($answer) {
                                    while ($result = $answer->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td>
                                                <input type="radio" /><?php
                                                if ($result['rightAns'] == '1') {
                                                    echo "<span style='color:green;font-weight: bold;'>".$result['ans']." (Correct Ans)</span>";
                                                }else{
                                                    echo $result['ans'];
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } } ?>
                            <?php } } ?>
                    </table>
    
    
                    <a href="starttest.php" class="btn btn-success btn-lg">
                        <span class="fa fa-arrow-right"></span> Start Exam
                    </a>
                    <br/>
                    <br/>
                </div>

                <div class="col-lg-3">

                </div>
            </div>
        </div>
    </div>