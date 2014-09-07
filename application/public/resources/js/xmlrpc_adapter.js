/**
 * Класс XmlRpcAdapter
 * @class
 * @author Влазнев Дмитрий aka VlaD <dvlaznev@infrasoft.ru>
 * @author [fixes & small adds] Александр Чибрикин aka alek13 <chibrikinalex@mail.ru>
 */

/**
* Конструктор.
* @constructor
* @param moduleMethod - имя вызываемого метода в формате "moduleGuid.methodName"
*/
function XmlRpcAdapter(moduleMethod)
{
	/**
	 * Флаг. Определен ли модуль и метод
	 */
	this.moduleMethod = null;
	/**
	 * XML RPC объект
	 */
	this.xmlRpcObject = null;
	/**
	 * Текст ответа сервера
	 */
	this.responseText = '';
	/**
	 * Распарсенный ответ сервера
	 */
	this.responseArray = null;

	// Если конструктор вызван с именем метода
	if(typeof moduleMethod != 'undefined')
	{
		this.moduleMethod = moduleMethod;
		this.xmlRpcObject = new XMLRPCMessage(this.moduleMethod);
	}

	/**
	 * Установка имени вызываемого метода в формате "moduleGuid.methodName"
	 * @param {string} moduleMethod имя вызываемого метода в формате "moduleGuid.methodName"
	 * @return TRUE - если все нормально, в противном случае FALSE
	 * @type bool
	 */
 	XmlRpcAdapter.prototype.setMethod = function(moduleMethod)
	{
		if(typeof moduleMethod != 'undefined')
		{
			this.moduleMethod = moduleMethod;
			this.xmlRpcObject = new XMLRPCMessage(this.moduleMethod);
			return true;
		}

		return false;
	}

	/**
	 * Инициализация параметров вызываемого метода. На входе массив параметров произвольного размера и типа элементов
	 */
	XmlRpcAdapter.prototype.addParams = function(argArray)
	{
		if(this.moduleMethod == null)
		{return;}
		
		for(var i=0;i<argArray.length;i++)
		{
			this.xmlRpcObject.addParameter(argArray[i]);
		}
		
	}

	/**
	 * Вызов удаленного метода
	 */
	XmlRpcAdapter.prototype.sendRequest = function()
	{
		if(this.xmlRpcObject == null)
		{return;}

		var self = this;
		var params2server = "xquery="+encodeURIComponent(this.xmlRpcObject.xml());
		// console.log(params2server);
		$.ajax({
			type: "POST",
			url: "index.php",
			data: params2server,
			async: false,
			dataType: "text",
			success: function(rawxml)
			{
				//console.log(rawxml);

				// Сохраняем на всякий случай "сырой" ответ сервера
				self.responseText = rawxml;
				
				if(rawxml.toString().indexOf('<'+'?xml') != 0)
				{
					throw {code: 2, message: "response have wrong xml: "+rawxml.toString()};
					return;
				}

				var xml;
				var bversion = parseFloat($.browser.version);
				/*if($.browser.msie && bversion < 8)
				{
					xml = new ActiveXObject("Microsoft.XMLDOM");
					//IE80 security setting prevent creation of Microsoft.XMLDOM
					xml.async = false;
					xml.loadXML(rawxml);
				}
				else*/ xml = rawxml;

				self.responseArray = self.xml2array(xml);
			},
			error: function(err)
			{
				throw {code: 1, message: "Connection close"};
				return;
			}
		});
	}

	/**
	 * Парсинг ответа сервера
	 * @param {string} xml Полученный от сервера XML ответ
	 * @return Распарсенный ответ сервера в виде массива
	 * @type array
	 */
	XmlRpcAdapter.prototype.xml2array = function(xml)
	{
		var xmlDoc = new REXML(xml);

		var isFault = this.isRequestFault(xmlDoc.rootElement.childElements[0]);
		if(isFault == true)
		{// От сервера прилетело сообщение об ошибке
			var errorRequest = this.parseStructType(xmlDoc.rootElement.childElements[0].childElements[0].childElements[0]);

			//console.log('errorRequest', errorRequest);

			if(typeof errorRequest != 'object')
			{
				throw {code: -100, message: "Unrecognize server error"};
			}
			else
			{
				if(typeof errorRequest.faultCode == 'undefined' || typeof errorRequest.faultString == 'undefined')
				{
					throw {code: -100, message: "Unrecognize server error"};
				}
				else
				{
					var faultString = errorRequest.faultString;
					faultString = faultString.toString().replace(/\\/g, "\\\\");
					faultString = faultString.toString().replace(/'/g, "\\\'");
					faultString = faultString.toString().replace(/\n/g, "\\n");
					
					if (typeof errorRequest.addFaultCode == 'undefined')
						throw {code: errorRequest.faultCode, message: errorRequest.faultString};
					else
						throw {code: errorRequest.faultCode, addCode: errorRequest.addFaultCode, message: errorRequest.faultString};
				}
			}
		}

		var paramNode = this.getParamElement(xmlDoc.rootElement);
		if(paramNode.childElements[0].childElements.length != 1)
		{
			return null;
		}

		result = this.parseNode(paramNode.childElements[0].childElements[0]);
		return result;
	}

	/**
	 * Определяет, не является ли XML RPC ответ сообщением об ошибке
	 * @param {xml node} currentNode Корневой узел
	 * @return true - ошибка, false - нормальный XML RPC ответ
	 * @type boolean
	 */
	XmlRpcAdapter.prototype.isRequestFault = function(currentNode)
	{
		if(currentNode.name == 'fault')
		{return true;}
		else
		{return false;}
	}

	/**
	 * Возвращает XML элемент <param></param>
	 * @param {xml node} currentNode Узел, с которого ищем <param></param>
	 * @return Узел <param></param> в виде объекта xml dom
	 * @type xml node
	 */
	XmlRpcAdapter.prototype.getParamElement = function(currentNode)
	{
		if(currentNode.name == 'param')
		{return currentNode;}

		for (var i=0; i<currentNode.childElements.length; i++)
		{
			if(currentNode.childElements[i].type == 'element')
			{var result = this.getParamElement(currentNode.childElements[i]);}

			if(result != null)
			{return result;}
		}

		return null;
	}

	/**
	 * Парсим узел XML DOM
	 * @param {xml node} currentNode Узел, который необходимо распарсить
	 * @return Распарсенный узел в виде объекта, согласно типу узла
	 */
	XmlRpcAdapter.prototype.parseNode = function (currentNode)
	{
		var result = null;

		switch(currentNode.name)
		{
			case 'base64':
			case 'double':
			case 'int':
			case 'i4':
			case 'string':
			case 'boolean':
			case 'date/time':
							{// Простой элемент
								result = this.parseSimpleType(currentNode);
								break;
							}
			case 'array':
							{// Массив
								result = this.parseArrayType(currentNode);
								break;
							}
			case 'struct':
							{// Объект
								result = this.parseStructType(currentNode);
								break;
							}
		}

		return result;
	}

	/**
	 * Парсим узел XML DOM простого типа
	 * @param {xml node} node Узел, который необходимо распарсить
	 * @return Распарсенный узел в виде объекта, согласно типу узла
	 */
	XmlRpcAdapter.prototype.parseSimpleType = function(node)
	{
		var result = null;
		switch(node.name)
		{
			case 'double':
							{// Приводим к типу и выдаем как есть
								result = parseFloat(node.getText());
							}
			case 'int':
			case 'i4':
							{// Приводим к типу и выдаем как есть
								result = parseInt(node.getText());
							}
			case 'base64':
							{// Выдаем как есть
								result = node.getText();
							}
			case 'string':
							{// Убираем CDATA, если необходимо
								result = node.getText();
								if(result.substr(0, 9) == '<![CDATA[')
								{
									var endCut = result.length - 2;
									result = result.substring(9, endCut);
								}
							}
			case 'boolean':
							{
								result = node.getText() == 1?true:false;
							}
			case 'date/time':
							{
								result = node.getText();
							}
		}

		return result;
	}

	/**
	 * Парсим узел XML DOM типа Массив
	 * @param {xml node} node Узел, который необходимо распарсить
	 * @return Распарсенный узел в виде массива
	 * @type Array
	 */
	XmlRpcAdapter.prototype.parseArrayType = function(node)
	{
		var result = new Array();

		for (var i=0; i<node.childElements[0].childElements.length; i++)
		{
			if(node.childElements[0].childElements[i].childElements.length != 0)
			{
				result.push(this.parseNode(node.childElements[0].childElements[i].childElements[0]));
			}
		}

		return result;
	}

	/**
	 * Парсим узел XML DOM типа Структура (ассоциативный массив)
	 * @param {xml node} node Узел, который необходимо распарсить
	 * @return Распарсенный узел в виде объекта
	 * @type Object
	 */
	XmlRpcAdapter.prototype.parseStructType = function(node)
	{
		var result = new Object();

		for(var i=0; i<node.childElements.length; i++)
		{
			if(node.childElements[i].childElements.length != 2)
			{continue;}

			var name = node.childElements[i].childElements[0].getText();
			var value = '';
			if(typeof node.childElements[i].childElements[1].childElements[0] != 'undefined')
			{
				value = this.parseNode(node.childElements[i].childElements[1].childElements[0]);

				value = value.toString().replace(/\\/g, '\\\\');
				value = value.toString().replace(/"/g, '\\\"');
				value = value.toString().replace(/\n/g, '\\n');
			}
			
			if(name == '')
			{continue;}

			var evalText = 'result.'+name+' = "'+value+'"';
			eval (evalText);
		}

		return result;
	}
}
