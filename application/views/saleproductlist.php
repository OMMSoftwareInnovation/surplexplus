<style type="text/css">
.ab:hover
{
    background-color: #f1f1f1 !important;
}.thumbnail
{
    min-height: 275px;
}
</style>
<style type="text/css">
        .ajax-load{
            margin-bottom: 40px;
            background: #b81d22;
            padding: 10px 0px;
            width: 100%;
            color: white;
            margin-bottom: 43px;    
        }
    </style>
<style type="text/css">
        
            .dropdown-submenu {
                position: relative;
            }

            .dropdown-submenu>.dropdown-menu {
                top: 0;
                left: 100%;
                margin-top: -6px;
                margin-left: -1px;
                -webkit-border-radius: 0 6px 6px 6px;
                -moz-border-radius: 0 6px 6px;
                border-radius: 0 6px 6px 6px;
            }

            .dropdown-submenu:hover>.dropdown-menu {
                display: block;
            }

            .dropdown-submenu>a:after {
                display: block;
                content: " ";
                float: right;
                width: 0;
                height: 0;
                border-color: transparent;
                border-style: solid;
                border-width: 5px 0 5px 5px;
                border-left-color: #ccc;
                margin-top: 5px;
                margin-right: -10px;
            }

            .dropdown-submenu:hover>a:after {
                border-left-color: #fff;
            }

            .dropdown-submenu.pull-left {
                float: none;
            }

            .dropdown-submenu.pull-left>.dropdown-menu {
                left: -100%;
                margin-left: 10px;
                -webkit-border-radius: 6px 0 6px 6px;
                -moz-border-radius: 6px 0 6px 6px;
                border-radius: 6px 0 6px 6px;
            }
              .thumbnail:hover{
   opacity: 1;
    box-shadow: 0px -1px 12px 3px #d4d4d4;
  }
  .item.list-group-item {
    float: none;
    width: 96.2%;
    background-color: #fff;
    margin-bottom: 10px;
    margin-left: 16px;
}
.item.list-group-item:nth-of-type(odd):hover, .item.list-group-item:hover {
    background: #eeeeee;
}
</style>
 <div class="main">

<div class="row">
	<div class="col-md-12">

			<div class="header_bottom_left">				
				<div class="categories">
				  <ul style="margin-top: -20px;    margin-bottom: 0px;">
				  	<h3 align="center" style="letter-spacing: 1px;">Catagories</h3>
                    <div class="dropdown open" style="width: 263px;">
                        <?php echo $this->multi_menu->render('Item-0', array('Item-3', 'Item-5')); ?>
                    </div>
               
				  </ul>
				</div>					
	       </div>

		<div class="col-md-9">
   
		<div>
			<div class="well well-sm" style="border-radius: 1px;">
			<div class="container" style=" width: 304px; float: left;">
				<div class="row">
					<div class="dropdown">
					   <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width: 160px;">
					    <span   id="mdrop" style="float: left;">Sort By</span>
					    <span class="caret" style="float: right; margin-top: 8px;"></span>
					   </button>
					   <ul class="dropdown-menu crt" aria-labelledby="dropdownMenu1" style="cursor: pointer;">
					    <li id="alphBnt" value="1"><a >Name A-Z </a></li>
                        <li id="alphBnt1" value="2"><a>Name Z-A</a></li>
					    <li id="numbtn" value="3"><a>Price LOW-HIGH</a></li>
					    <li id="numbtn1" value="4"><a >Price HIGH-LOW</a></li>
                        <li id="numbtn2" value="5"><a >On Request</a></li>
					   </ul>
					</div>
				</div>
			</div>
		        <strong>View: </strong>
		        <div class="btn-group">
		            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
		            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
		                class="glyphicon glyphicon-th"></span>Grid</a>
		        </div>
		    </div>
    
		    <div id="products" class="row list-group">
            </div>
    <div class="ajax-load text-center" style="display:none;border-radius: 2px;letter-spacing: 1px;font-family: 'ambleregular';font-size: 15px;">
    <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More Products</p>
</div>
</div>
</div>
</div>
</div>

 </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
</script>
<script type="text/javascript">
    
var page = 1;
var filtertype="0";

$(document).ready(function() 
{
    loadMoreData(page,filtertype);

    $('ul.crt #alphBnt').click(function(e) 
    {
        page=1;
        $("#mdrop").text($(this).text());
        $("#products").empty();
        filtertype=$(this).val();
        //alert(filtertype);
        loadMoreData(page,filtertype);
    });

    $('ul.crt #alphBnt1').click(function(e) 
    {
        page=1;
        $("#mdrop").text($(this).text());
        $("#products").empty();
        filtertype=$(this).val();
        //alert(filtertype);
        loadMoreData(page,filtertype);
    });

    $('ul.crt #numbtn').click(function(e) 
    {
        page=1;
        $("#mdrop").text($(this).text());
        $("#products").empty();
        filtertype=$(this).val();
        //alert(filtertype);
        loadMoreData(page,filtertype);
    });

    $('ul.crt #numbtn1').click(function(e) 
    {
        page=1;
        $("#mdrop").text($(this).text());
        $("#products").empty();
        filtertype=$(this).val();
        //alert(filtertype);
        loadMoreData(page,filtertype);
    });

    $('ul.crt #numbtn2').click(function(e) 
    {
        page=1;
        $("#mdrop").text($(this).text());
        $("#products").empty();
        filtertype=$(this).val();
        //alert(filtertype);
        loadMoreData(page,filtertype);
    });

});

$(window).scroll(function()
{
    if($(window).scrollTop() + $(window).height() >= $(document).height())
    {
        page++;
        loadMoreData(page,filtertype);
    }
});

function loadMoreData(page,filtertype)
{
    $.ajax(
    {
        url: '?page=' + page+"&filtertype="+filtertype,
        type: "get",
        beforeSend: function()
        {
            $('.ajax-load').show();
        }
    })

    .done(function(data)
    {
        if(data == " ")
        {
            $('.ajax-load').html("No More Products Found");
            return;
        }
        $('.ajax-load').hide();
        $("#products").append(data);
    })

    .fail(function(jqXHR, ajaxOptions, thrownError)
    {
        alert('server not responding...');
    });
}
</script>
