    </div> <!-- page wrapper -->
  </div> <!-- container -->
  <nav id="nav-menu" class="outer-nav right vertical">
    <div class="bounding-container">
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