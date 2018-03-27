function	layout_mgr()
{
	var self=this;

	this.__construct=function()
	{
		$('.date').prepend('<i class="icon-calendar"></i> ');
		$('.user').prepend('<i class="icon-user"></i> ');
	}
	this.onBbAMyLoginClick=function()
	{
	}
	this.onBbATestClick=function()
	{
		return false;
	}

	this.__construct();
}
