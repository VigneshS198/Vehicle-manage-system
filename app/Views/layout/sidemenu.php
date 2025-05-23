<?php $menuItems = getSidebarMenu(); ?>

<aside class="left-sidebar" style="top: 75px;">
  <div>
    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
      <ul id="sidebarnav">
        <?php foreach ($menuItems as $item): ?>
          <?php if ($item['is_parent'] == 1 && !empty($item['children'])): ?>
            <!-- Parent with Submenus -->
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)">
                <i class="<?= esc($item['icon']) ?>"></i>
                <span class="hide-menu"><?= esc($item['title']) ?></span>
              </a>
              <ul class="collapse first-level">
                <?php foreach ($item['children'] as $child): ?>
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url(trim($child['url'], '/')) ?>">
                      <i class="<?= esc($child['icon'] ?? 'ti ti-circle') ?>"></i>
                      <?= esc($child['title']) ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </li>
          <?php elseif ($item['is_parent'] == 0 && empty($item['parent_id'])): ?>
            <!-- Single Menu Item -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= base_url(trim($item['url'], '/')) ?>">
                <i class="<?= esc($item['icon']) ?>"></i>
                <span class="hide-menu"><?= esc($item['title']) ?></span>
              </a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>
</aside>
