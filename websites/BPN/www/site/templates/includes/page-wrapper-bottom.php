    </div> <!-- page wrapper -->
  </div> <!-- container -->
  <nav id="nav-menu" class="outer-nav right vertical">
    <div class="bounding-container">
      <!-- Nav Logo -->
      <div class="nav-menu__logo"><a href="<?php echo $config->urls->root ?>" class="navigation-link"><img src="<?php echo $config->urls->assets?>/images/BPN-Logo.png" alt="BPN-logo"/></a></div>
      <!-- Menu Items -->
      <?php
        $root = $pages->get("/");
        $children = $root->children();
        foreach($children as $child) {
          echo "<a href='{$child->url}' class=\"icon-home navigation-link\">{$child->title}</a>";
        }
      ?>
    </div>
  </nav>
</div> <!-- perspective -->