<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($post['Post']['title']); ?></h1>

<p><?php echo h($post['Post']['body']); ?></p>

<p>Created: <?php echo $post['Post']['created']; ?></p>