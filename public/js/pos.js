	function blockUI() {
		$.blockUI({
			message: '<span class="dashboard-spinner spinner-info spinner-xs"></span>',
			overlayCSS: {
				backgroundColor: '#1b2024',
				opacity: 0.8,
				cursor: 'wait'
			},
			css: {
				border: 0,
				color: '#fff',
				padding: 0,
				backgroundColor: 'transparent'
			},
			baseZ: 2000
		});
	}

	function unblockUI() {
		$.unblockUI();
	}

	

