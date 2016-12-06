$(document).ready(function()
	{
		$('.sortable').nestedSortable(
			{
				handle: 'div',
				items: 'li',
				listType: "ul",
				toleranceElement: '> div',
				//isTree : true,
				//protectRoot : true,
				excludeRoot : false,
				update : function()
				{
					var oU = $(this).attr("data-onUpdate");
					if(oU !='')
					{
						eval(oU);
					}
				}
			});
	});