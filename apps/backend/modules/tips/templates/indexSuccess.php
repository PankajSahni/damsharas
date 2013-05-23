<h1>Tipss List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Question</th>
      <th>Image</th>
      <th>Tip</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
      <?php //echo "<pre>"; print_r($_SERVER);die;?>
    <?php foreach ($tipss as $tips): ?>
    <tr>
      <td><a href="<?php echo url_for('tips/show?id='.$tips->getId()) ?>"><?php echo $tips->getId() ?></a></td>
      <td><?php echo $tips->getQuestionId() ?></td>
      <td><img width="150" src="<?php echo strstr($_SERVER['HTTP_REFERER'],'backend', true).'uploads/'.$tips->getImage() ?>"/></td>
      <td><?php echo $tips->getTip() ?></td>
      <td><?php echo $tips->getCreatedAt() ?></td>
      <td><?php echo $tips->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tips/new') ?>">New</a>
