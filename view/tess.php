<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="../index.html"><span>Kid</span>Shop</a>
						<ul class="user-menu">
							<li class="dropdown pull-right">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Admin <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hồ sơ</a></li>
									<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
								</ul>
							</li>
						</ul>
					</div>
									
				</div><!-- /.container-fluid -->
			</nav>
		
			<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
				<ul class="nav menu">
					<li class="active"><a href="category.html"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
					<li><a href="product.html"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
					<li><a href="new.html"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý tin tức</a></li>
				</ul>
		
			</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Quản lý danh mục</a></li>
				<li class="active">Đồ Bộ Nam</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục: Đồ Bộ Nam</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
		<form action="index.php?act=editcategory" method="post">
            
                        
                            <div class="form-group">
                                <label>Tên danh mục:</label>
								  <td><input required type="text" name="name" id="name" class="form-control" value="<?=$category['name']?>"></td>
                        </div>
						<tr>
                            <td></td>
                            <td><input type="submit" name="capnhat" value="Cập nhật"></td>
                        </tr>
                        <input type="hidden" name="id" value="<?=$category['id']?>">
               
             
          
		</form>
	</div>	<!--/.main-->	
</body>