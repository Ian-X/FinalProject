<?php
    include('abstract-views/header.php');
?>
    <a href=".?action=display_question_form" class="btn-info">Add Question</a>
<?php if($userquestions==true){ ?>
    <a href=".?action=display_questions&userquestions=0" class="btn-info">All Questions</a>
    <?php }
    else{ ?>
        <a href=".?action=display_questions&userquestions=1" class="btn-info">My Questions</a>
            <?php } ?>
<h1>Hello <?php echo $_SESSION["fullname"]; ?></h1>
<?php foreach($questions as $question) :
    //if($userquestions==false || $question['ownerid']==$_SESSION['userid']){ ?>
    <div class="">
        <h2>Name: </h2><?php echo $question['title']; ?><br>
        <h2>Body: </h2><?php echo $question['body']; ?><br>
        <h2>Skills: </h2><?php echo $question['skills']; ?><br>
        <br>
        <?php //if($question['ownerid']==$_SESSION['userid']){ ?>
        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="edit_question">
            <input type="hidden" name="questionId" value="<?php echo $question['id']; ?>">
            <input type="hidden" name="title" value="<?php echo $question['title']; ?>">
            <input type="hidden" name="body" value="<?php echo $question['body']; ?>">
            <input type="hidden" name="skills" value="<?php echo $question['skills']; ?>">
            <input type="hidden" name="ownerid" value="<?php echo $question['ownerid']; ?>">


            <button type="submit" class="btn btn-primary">Edit Question</button>

        </form>
        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="delete_question">
            <input type="hidden" name="questionId" value="<?php echo $_SESSION['id']; ?>">
            <button type="submit" class="btn btn-primary">Delete Question</button>

        </form>
        <?php //} ?>
    </div>
<?php //}
    endforeach; ?>
</table>
<?php include('abstract-views/footer.php'); ?>