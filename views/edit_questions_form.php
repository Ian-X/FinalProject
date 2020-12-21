<?php include('abstract-views/header.php'); ?>

    <h1>Edit Question</h1>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="submit_question">
        <input type="hidden" name="userId" value="<?php echo $userId; ?>">

        <div class="form-group">
            <label for="title">Question Title</label>
            <input type="text" name="title" value="<?php echo $title; ?>">
        </div>

        <div class="form-group">
            <label for="body">Question Body</label>
            <input type="text" name="body" value="<?php echo $body; ?>">
        </div>

        <div class="form-group">
            <label for="skills">Question Skills</label>
            <input type="text" name="skills" value="<?php echo $skills; ?>">
        </div>

        <input type="submit" class="btn-primary" value="Add Question">

    </form>

<?php include('abstract-views/footer.php'); ?>