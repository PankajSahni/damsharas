<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $tips->getId() ?></td>
    </tr>
    <tr>
      <th>Question:</th>
      <td><?php echo $tips->getQuestionId() ?></td>
    </tr>
    <tr>
      <th>Image:</th>
      <td><?php echo $tips->getImage() ?></td>
    </tr>
    <tr>
      <th>Tip:</th>
      <td><?php echo $tips->getTip() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $tips->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $tips->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('tips/edit?id='.$tips->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('tips/index') ?>">List</a>
