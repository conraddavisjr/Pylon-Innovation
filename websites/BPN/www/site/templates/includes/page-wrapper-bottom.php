    </div> <!-- page wrapper -->
  </div> <!-- container -->
  <nav id="nav-menu" class="outer-nav right vertical">
    <div class="bounding-container">
      <!-- Nav Logo -->
      <div class="nav-menu__logo"><img src="<?php echo $config->urls->assets?>/images/BPN-Logo.png" alt="BPN-logo"/></div>
      <!-- Menu Items -->
      <?php
        $root = $pages->get("/");
        $children = $root->children();
        foreach($children as $child) {
          echo "<a href='{$child->url}' class=\"icon-home\">{$child->title}</a>";
        }
      ?>
    </div>
  </nav>
</div> <!-- perspective -->