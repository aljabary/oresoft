
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
  
.dd {
	position: relative;
	display: block;
	margin: 0;
	padding: 0;
	list-style: none;
	font-size: 13px;
	line-height: 20px;
}

.dd-list {
	display: block;
	position: relative;
	margin: 0;
	padding: 0;
	list-style: none;
}

.dd-list .dd-list {
	padding-left: 30px;
}

.dd-collapsed .dd-list {
	display: none;
}

.dd-item, .dd-empty, .dd-placeholder {
	display: block;
	position: relative;
	margin: 0;
	padding: 0;
	min-height: 20px;
	font-size: 13px;
	line-height: 20px;
}

.dd-handle {
	display: block;
	height: 34px;
	margin: 5px 0;
	padding: 6px 10px;
	color: #333;
	text-decoration: none;
	font-weight: 600;
	border: 1px solid #CCC;
	background: #F6F6F6;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
}

.dd-handle:hover {
	color: #CCC;
	background: #fff;
}

.dd-item > button {
	display: block;
	position: relative;
	cursor: pointer;
	float: left;
	width: 25px;
	height: 20px;
	margin: 7px 0;
	padding: 0;
	text-indent: 100%;
	white-space: nowrap;
	overflow: hidden;
	border: 0;
	background: transparent;
	font-size: 12px;
	line-height: 1;
	text-align: center;
	font-weight: bold;
}

.dd-item > button:before {
	content: '+';
	display: block;
	position: absolute;
	width: 100%;
	text-align: center;
	text-indent: 0;
}

.dd-item > button[data-action="collapse"]:before {
	content: '-';
}

.dd-placeholder {
	margin: 5px 0;
	padding: 0;
	min-height: 30px;
	background: white;
	border: 1px dashed #CCC;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
}

.dd-empty {
	margin: 5px 0;
	padding: 0;
	min-height: 30px;
	background: #f2fbff;
	border: 1px dashed #b6bcbf;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	border: 1px dashed #bbb;
	min-height: 100px;
	background-color: #e5e5e5;
	background-image: -webkit-linear-gradient(45deg, white 25%, transparent 25%, transparent 75%, white 75%, white), -webkit-linear-gradient(45deg, white 25%, transparent 25%, transparent 75%, white 75%, white);
	background-image: -moz-linear-gradient(45deg, white 25%, transparent 25%, transparent 75%, white 75%, white), -moz-linear-gradient(45deg, white 25%, transparent 25%, transparent 75%, white 75%, white);
	background-image: linear-gradient(45deg, white 25%, transparent 25%, transparent 75%, white 75%, white), linear-gradient(45deg, white 25%, transparent 25%, transparent 75%, white 75%, white);
	background-size: 60px 60px;
	background-position: 0 0, 30px 30px;
}

.dd-dragel {
	position: absolute;
	pointer-events: none;
	z-index: 9999;
}

.dd-dragel > .dd-item .dd-handle {
	margin-top: 0;
}

.dd-dragel .dd-handle {
	-webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, 0.1);
	box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, 0.1);
}

/* dark */
html.dark .dd-handle {
	background: #282d36;
	border-color: #21262d;
	color: #808697;
}

html.dark .dd-handle:hover {
	background: #21262d;
}


  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="row">
						<div class="col-md-12">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
										<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
									</div>

									<h2 class="panel-title">Kategori Berita</h2>
									<p class="panel-subtitle">Drag & drop untuk mengurutkan kategori.</p>
								</header>
								<div class="panel-body">
									<div class="col-md-6">
										<div class="dd" id="nestable">
											<ol class="dd-list" id="loc">	
												<li class="dd-item" data-id="{$lc.cat->id}"><div class="dd-handle">Induk</div>
												<ol class="dd-list">
														
														<li class="dd-item" data-id="{$ch.catc->id}">
															<div class="dd-handle">CHILD</div>
															
														</li>	</ol>
											</li>
											<li class="dd-item" data-id="{$lc.cat->id}"><div class="dd-handle">Induk</div>
												<ol class="dd-list">
														
														<li class="dd-item" data-id="{$ch.catc->id}">
															<div class="dd-handle">CHILD</div>
															
														</li>	</ol>
											</li>
						
											</ol>
										</div>
									</div>
									<div class="col-md-6">
										<textarea id="kw" rows="3" class="form-control" placeholder="Keyword" ></textarea>
									</div>
										<div class="col-md-6">
										<label>Kategory baru</label>
										<div class="input-group mb-md">
														<input type="text" id="nc" class="form-control">
														<span class="input-group-btn">
															<button onclick="addcat()" class="btn btn-success" type="button"><b>+</b></button>
														</span>
													</div>
									</div>
									<div class="col-md-6">
										<textarea id="nestable-output" rows="3" class="form-control" ></textarea>
									</div>
								</div>
							</section>
						</div>
					</div>
					<script src="js/jquery-nestable.js"></script>
				<!-- Analytics to Track Preview Website -->		
		<script src="js/examples.nestable.js"></script>