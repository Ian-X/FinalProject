<?php include('abstract-views/header.php'); ?>
    <h1><?php echo $question->getTitle(); ?></h1><br>
    <h2><?php echo $question->getBody()?></h2><br>
    <p>Skills: <?php echo $question->getSkills()?></p><br>
    <p>Date Created: <?php echo $question->getDate()?></p><br>
    <p>Created by: <?php echo $question->getEmail()?></p><br>
    <p>Question score: <?php echo $question->getScore() ?></p><br><br>
    <h1>Answers</h1>

<?php foreach($answers as $answer) : ?>

            <p><?php echo $answer->getBody(); ?></p><br>
            <p>By: <?php echo $answer->getEmail(); ?></p><br>
            <p>Score: <?php echo $answer->getScore(); ?></p><br>
            <br><br>
<?php endforeach; ?>
<?php include('abstract-views/footer.php'); ?>