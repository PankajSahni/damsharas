<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $answers->getId() ?></td>
    </tr>
    <tr>
      <th>Quesion:</th>
      <td><?php echo $answers->getQuestionId() ?></td>
    </tr>
    <tr>
      <th>Answer:</th>
      <td><?php echo $answers->getAnswer() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $answers->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $answers->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('answers/edit?id='.$answers->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('answers/index') ?>">List</a>
