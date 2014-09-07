/**
 *
 */
;var API = new (function($){
	var self=this;

	this.callModuleMethod=function(division,module,method)
	{
		if (typeof(module)=='undefined' || typeof(method)=='undefined')
			throw {code: -1, message: "Wrong parametres set"};

		var argArray = new Array();
		for (var i=3;i<arguments.length;i++)
			argArray.push(arguments[i]);

		var request = new XmlRpcAdapter((division!=''?division+'.':'')+module+'.'+method);
		if (argArray.length!=0)
			request.addParams(argArray);

		request.sendRequest();
// console.log(request.responseText);
		return request.responseArray;
	}
	this.userLogin=function()
	{
		if (typeof($('#varUserLogin'))=='undefined')
			return null;
		else
			return $('#varUserLogin').val();
	}
})(jQuery);

//var API=new api();
