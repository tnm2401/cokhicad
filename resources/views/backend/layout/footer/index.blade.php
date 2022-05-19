<footer class="main-footer">
   <div class="pull-right hidden-xs">
      <strong style="color:#3c8dbc"> AIB CMS V2.0</strong> | <i class="fa-brands fa-laravel"></i> <span style="color:#ff2c1f"><strong>Laravel </strong>{{ app()->version() }}</span> |
      Page load time <b>{{ round(microtime(true) - LARAVEL_START, 3) }}</b> s
   </div>
   <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="https://aib.vn">AIB.VN</a>.</strong> All rights reserved.
</footer>
@include('backend.layout.footer.script')
@stack('script')
</body>
</html>