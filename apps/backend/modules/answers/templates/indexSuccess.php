<h1>Answerss List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Question</th>
      <th>Answer</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($answerss as $answers): ?>
    <tr>
      <td><a href="<?php echo url_for('answers/show?id='.$answers->getId()) ?>"><?php echo $answers->getId() ?></a></td>
      <td><?php echo $answers->getQuestionId() ?></td>
      <td><?php echo $answers->getAnswer() ?></td>
      <td><?php echo $answers->getCreatedAt() ?></td>
      <td><?php echo $answers->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('answers/new') ?>">New</a>
