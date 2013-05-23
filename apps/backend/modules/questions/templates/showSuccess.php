<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $questions->getId() ?></td>
    </tr>
    <tr>
      <th>Question:</th>
      <td><?php echo $questions->getQuestion() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $questions->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $questions->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('questions/edit?id='.$questions->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('questions/index') ?>">List</a>
