<html>
    <link rel="stylesheet" type="text/css" href="<?php echo $cfn_stylesheet; ?>">
    <div id="cfn-body">
        <?php foreach( $this->content as $notice ) : ?>
            <p id="cfn-content"><?php echo $notice; ?></p>
        <?php endforeach ?>
    </div>
</html>