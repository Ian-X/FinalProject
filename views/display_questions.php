<?php include('abstract-views/header.php'); ?>
    <a href=".?action=display_question_form>" class="btn-info">Add Question</a>
    <a href=".?action=display_questions&userquestions=true>" class="btn-info">Add Question</a>
<h1>Hello <?php echo $_SESSION["fullname"]; ?></h1>
<?php foreach($questions as $question) :
    if($_GET){?>
    <div class="">
        <h2>Name: </h2><?php echo $question['title']; ?><br>
        <h2>Body: </h2><?php echo $question['body']; ?><br>
        <h2>Skills: </h2><?php echo $question['skills']; ?><br>
        <br>
        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="edit_question">
            <input type="hidden" name="userId" value="<?php echo $userId; ?>">
            <input type="hidden" name="title" value="<?php echo $question['title']; ?>">
            <input type="hidden" name="body" value="<?php echo $question['body']; ?>">
            <input type="hidden" name="skills" value="<?php echo $question['skills']; ?>">
            <input type="hidden" name="ownerid" value="<?php echo $question['ownerid']; ?>">


            <button type="submit" class="btn btn-primary">Edit Question</button>

        </form>
        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="delete_question">
            <input type="hidden" name="userId" value="<?php echo $userId; ?>">
            <input type="hidden" name="title" value="<?php echo $question['title']; ?>">
            <input type="hidden" name="body" value="<?php echo $question['body']; ?>">
            <input type="hidden" name="skills" value="<?php echo $question['skills']; ?>">
            <button type="submit" class="btn btn-primary">Delete Question</button>

        </form>
    </div>
<?php endforeach; ?>
</table>
<?php include('abstract-views/footer.php'); ?>