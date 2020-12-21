<?php include('abstract-views/header.php'); ?>
    <a href=".?action=display_question_form" class="btn-info">Add Question</a>
<?php if($userquestions==true){ ?>
    <a href=".?action=display_questions&userquestions=0" class="btn-info">All Questions</a>
    <?php }
    else{ ?>
        <a href=".?action=display_questions&userquestions=1" class="btn-info">My Questions</a>
            <?php } ?>
<h1>Hello <?php echo $_SESSION["fullname"]; ?></h1>
<?php foreach($questions as $question) :
    if($userquestions != true || $question->getOwnerID()==$_SESSION['userid']){ ?>
    <div class="">
        <h2>Name: </h2><?php echo $question->getTitle(); ?><br>
        <h2>Body: </h2><?php echo $question->getBody(); ?><br>
        <h2>Skills: </h2><?php echo $question->getSkills(); ?><br>
        <br>
        <?php if($question->getOwnerID()==$_SESSION['userid']){ ?>

        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="edit_question">
            <input type="hidden" name="questionId" value="<?php echo $question->getID(); ?>">
            <input type="hidden" name="title" value="<?php echo $question->getTitle(); ?>">
            <input type="hidden" name="body" value="<?php echo $question->getBody(); ?>">
            <input type="hidden" name="skills" value="<?php echo $question->getSkills(); ?>">
            <input type="hidden" name="ownerid" value="<?php echo $question->getOwnerID(); ?>">


            <button type="submit" class="btn btn-primary">Edit Question</button>

        </form>
        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="delete_question">
            <input type="hidden" name="questionId" value="<?php echo $question->getID(); ?>">
            <button type="submit" class="btn btn-primary">Delete Question</button>
        </form>

        <?php } ?>
        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="view_question">
            <input type="hidden" name="questionId" value="<?php echo $question->getID(); ?>">
            <button type="submit" class="btn btn-primary">View Question</button>

        </form>
    </div>
<?php }
    endforeach; ?>
</table>
<?php include('abstract-views/footer.php'); ?>