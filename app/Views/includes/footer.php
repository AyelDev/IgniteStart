<!-- end container -->
</div>

<!-- <footer class="site-footer">
  <div class="footer-content">
    <p>&copy; 2025 Ignite Start. All rights reserved.</p>
    <ul class="footer-links">
      <li><a href="/about">About</a></li>
      <li><a href="/privacy">Privacy Policy</a></li>
      <li><a href="/contact">Contact</a></li>
    </ul>
  </div>
</footer> -->

<!-- <script src="<= base_url('global/main.js'); ?>"></script> -->
<!--<script src="<= base_url('modules/login_register/js/login_register.js'); ?>"></script> -->

<?php
// Extract a keyword from the title (e.g., "admin - dashboard" → "dashboard")
$parts = explode('-', $title ?? '');
$keyword = strtolower(trim(end($parts)));
?>


<?php if (!empty($scripts)): ?>
  <?php foreach ($scripts as $script): ?>
    <?php if (strpos($script, $keyword) !== false): ?>
      <link rel="stylesheet" href="<?= base_url($script) ?>">
    <?php endif; ?>
    <script src="<?= base_url($script) ?>"></script>
  <?php endforeach; ?>
<?php endif; ?>

</body>

</html>