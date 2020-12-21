<?php include('abstract-views/header.php'); ?>
    <a href=".?action=display_question_form&userId=<?php echo $userId; ?>" class="btn-info">Add Question</a>
<h1>Hello <?php echo $fullname; ?></h1>
<table>
	<tr>
		<th>Name</th>
		<th>Body</th>
        <th>Skills</th>
	</tr>
	<?php foreach($questions as $question) : ?>
	<tr>
		<td><?php echo $question['title']; ?></td>
		<td><?php echo $question['body']; ?></td>
        <td><?php echo $question['skills']; ?></td>
	</tr>
    <tr>
        <td><form action="index.php" method="POST">

            <input type="hidden" name="action" value="edit_question">
            <input type="hidden" name="userId" value="<?php echo $userId; ?>">
            <input type="hidden" name="title" value="<?php echo $question['title']; ?>">
            <input type="hidden" name="body" value="<?php echo $question['body']; ?>">
            <input type="hidden" name="skills" value="<?php echo $question['skills']; ?>">
            <input type="hidden" name="ownerid" value="<?php echo $question['ownerid']; ?>">


            <button type="submit" class="btn btn-primary">Edit Question</button>

        </form>
        </td>
        <td>
        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="delete_question">
            <input type="hidden" name="userId" value="<?php echo $userId; ?>">
            <input type="hidden" name="title" value="<?php echo $question['title']; ?>">
            <input type="hidden" name="body" value="<?php echo $question['body']; ?>">
            <input type="hidden" name="skills" value="<?php echo $question['skills']; ?>">
            <button type="submit" class="btn btn-primary">Delete Question</button>

        </form>
        </td>
    </tr>
	<?php endforeach; ?>
</table>
<?php include('abstract-views/footer.php'); ?>