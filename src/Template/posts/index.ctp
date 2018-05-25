<div class="row">
<?php echo $this->Flash->render('message');?>
<h2>View All Posts</h2>
<?php echo $this->Html->link('ADD NEW POST', ['action'=>'add'], ['class'=>'btn btn-primary']); ?>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Student's Name</th>
      <th>Remarks</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php if(!empty($posts)); ?>
  <?php foreach($posts as $post): ?>
    <tr>
      <td><?php echo $post->title; ?></td> 
      <td><?php echo $post->description; ?></td>
      <td>
        <?php echo $this->html->link('View', ['action'=>'view', $post->id], ['class'=>'btn btn-primary']); ?>
        <?php echo $this->html->link('Edit', ['action'=>'edit', $post->id], ['class'=>'btn btn-success']); ?>
        <?= $this->Form->postlink('Delete',
                      ['action'=>'delete', $post->id],
                      ['class'=>'btn btn-danger'],
                      ['confirm'=>'Are you sure?']  )
        ?>
        <?php ?>
      </td>
    </tr>
  <?php endforEach;?> 
  
  </tbody>
</table>
</div>