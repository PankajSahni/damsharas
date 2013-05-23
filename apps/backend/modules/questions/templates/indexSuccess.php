<h1>Questionss List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Question</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($questionss as $questions): ?>
    <tr>
      <td><a href="<?php echo url_for('questions/show?id='.$questions->getId()) ?>"><?php echo $questions->getId() ?></a></td>
      <td><?php echo $questions->getQuestion() ?></td>
      <td><?php echo $questions->getCreatedAt() ?></td>
      <td><?php echo $questions->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('questions/new') ?>">New</a>
