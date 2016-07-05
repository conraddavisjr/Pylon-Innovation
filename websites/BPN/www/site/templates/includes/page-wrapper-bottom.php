    </div> <!-- page wrapper -->
  </div> <!-- container -->
  <nav id="nav-menu" class="outer-nav right vertical">
    <div class="bounding-container">
      <!-- Menu Items -->
      <?php
        $root = $pages->get("/");
        $menuIcons = array(
          "Events" => "fa-users",
          "News" => "fa-newspaper-o",
          "Contact" => "fa-phone-square"
        );

        // first output the home link
        echo "<a href='{$root->url}' class=\"icon-home navigation-link\">{$root->title}</a>";
        // then output the other links
        $children = $root->children();
        foreach($children as $child) {
          echo "<a href='{$child->url}' class=\"navigation-link\"><i class=\"fa {$menuIcons[$child->title]}\"></i>{$child->title}</a>";
        }
      ?>
    </div>
  </nav>
</div> <!-- perspective -->

<!-- load in global styles -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600" rel="stylesheet">