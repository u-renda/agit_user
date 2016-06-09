        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body" id="body_modal"></div>
					<div class="modal-footer"></div>
                </div>
            </div>
        </div>
        </section>
        
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="container">
                <div class="page-footer-inner"> <?php echo date('Y').' &copy; '.$this->config->item('title'); ?></div>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url('assets/js').'/jquery.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js').'/bootstrap.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/theme').'/js.cookie.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/theme').'/bootstrap-hover-dropdown.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/theme').'/jquery.slimscroll.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/theme').'/jquery.blockui.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/theme').'/jquery.uniform.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/theme').'/bootstrap-switch.min.js'; ?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
		<!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url('assets/js/theme').'/bootstrap-datepicker.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/theme').'/jquery.validate.min.js'; ?>" type="text/javascript"></script>
        <!--<script src="<?php echo base_url('assets/js/theme').'/additional-methods.min.js'; ?>" type="text/javascript"></script>-->
        <script src="<?php echo base_url('assets/js/theme').'/jquery.bootstrap.wizard.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/theme').'/jquery-ui.min.js'; ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/theme').'/pnotify.custom.js'; ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url('assets/js/theme').'/app.min.js'; ?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
		<!-- BEGIN PAGE LEVEL PLUGINS -->
		<!--<script src="<?php echo base_url('assets/js/theme').'/form-wizard.min.js'; ?>" type="text/javascript"></script>-->
		<!--<script src="<?php echo base_url('assets/js/theme').'/ui-modals.min.js'; ?>" type="text/javascript"></script>-->
		<!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url('assets/js/theme').'/layout.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/theme').'/demo.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/theme').'/quick-sidebar.min.js'; ?>" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
		<!-- BEGIN KENDO GRID -->
		<script src="<?php echo base_url('assets/js/kendo'); ?>/kendo.all.min.js" type="text/javascript"></script>
		<!-- END KENDO GRID -->
		<script src="<?php echo base_url('assets/js').'/app.js'; ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js').'/app-table.js'; ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js').'/app-table-btn.js'; ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js').'/app-validate.js'; ?>" type="text/javascript"></script>
	</body>
</html>